<?php
Class Account_model extends CI_Model
{
	var $CI;
	
	//this is the expiration for a non-remember session
	var $session_expire	= 7200;
	
	function __construct()
	{
		parent::__construct();
		
		$this->CI = & get_instance();
		
		$account_session_config = array(
				'sess_cookie_name' => 'account_session_config',
				'sess_expiration' => 0
		);
		$this->CI->load->library('session', $account_session_config, 'account_session');
	}
	
	/**
	 * 登录
	 * @param string $email
	 * @param string $password
	 * @param boolean $remember
	 * @return boolean
	 */
	function login($email, $password, $remember = false)
	{
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', sha1($password));
		$this->db->limit(1);
		$result = $this->db->get('account');
		$result	= $result->row_array();

		if (count($result) > 0) {
			$account = array();
			$account['account']['id']		= $result['id'];
			$account['account']['name']		= $result['name'];
			$account['account']['email']	= $result['email'];
			
			if (!$remember) {
				$account['account']['expire'] = time() + $this->session_expire;
			} else {
				$account['account']['expire'] = false;
			}
			
			$this->CI->account_session->set_userdata($account);
			
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 登出
	 */
	function logout()
	{
		$this->CI->account_session->unset_userdata('account');
		$this->CI->account_session->sess_destroy();
	}
	
	/**
	 * 检查登录状态
	 * @param string $redirect
	 * @param boolean $default_redirect
	 */
	function is_logged_in($redirect = false, $default_redirect = true)
	{	
		$account = $this->CI->account_session->userdata('account');
		
		if (!$account) {
			if ($redirect) {
				$this->CI->account_session->set_flashdata('redirect', $redirect);
			}
		
			if ($default_redirect) {
				redirect('account/login');
			}	
			return false;
		} else {
			if ($account['expire'] && $account['expire'] < time()) {
				$this->logout();
				if ($redirect) {
					$this->CI->account_session->set_flashdata('redirect', $redirect);
				}
		
				if($default_redirect) {
					redirect('account/login');
				}
		
				return false;
			} else {
				if ($account['expire']) {
					$account['expire'] = time() + $this->session_expire;
					$this->CI->account_session->set_userdata(array('account'=>$account));
				}
			}
			return true;
		}
	}
}