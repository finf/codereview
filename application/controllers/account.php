<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
		$this->load->helper('form_helper');
		$this->load->add_package_path(APPPATH.'themes/'.$this->config->item('theme').'/');
	}
	
	/**
	 * 登录页面
	 *
	 */
	public function login()
	{
		$redirect	= $this->Account_model->is_logged_in(false, false);
		if ($redirect) {
			redirect('reviews/index/');
		}
		
		$submitted 		= $this->input->post('submitted');
		if ($submitted) {
			$email		= $this->input->post('email');
			$password	= $this->input->post('password');
			$remember   = $this->input->post('remember');
			$login		= $this->Account_model->login($email, $password, $remember);
		}
		$this->load->view('login');
	}
	
	/**
	 * 登出
	 */
	function logout()
	{
		$this->Account_model->logout();
		redirect('account/login');
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */