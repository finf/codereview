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
	function login()
	{
		$redirect	= $this->Account_model->is_logged_in(false, false);
		if ($redirect) {
			redirect('');
		}
		
		$data['redirect']	= $this->account_session->flashdata('redirect');
		
		$submitted 		= $this->input->post('submitted');
		if ($submitted) {
			$email		= $this->input->post('email');
			$password	= $this->input->post('password');
			$remember   = $this->input->post('remember');
			$redirect	= $this->input->post('redirect');
			$login		= $this->Account_model->login($email, $password, $remember);
			if ($login) {
				redirect($redirect);
			} else {
				$this->account_session->set_flashdata('redirect', $redirect);
				redirect('account/login');
			}
		}
		$this->load->view('login', $data);
	}
	
	/**
	 * 登出
	 */
	function logout()
	{
		$this->Account_model->logout();
		redirect('account/login');
	}
	
	function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div>', '</div>');
		$data['redirect']	= $this->session->flashdata('redirect');
		
		$data['name']	= '';
		$data['email']	= '';
		
		$this->form_validation->set_rules('name', '姓名', 'trim|required|max_length[32]');
		$this->form_validation->set_rules('email', '邮箱', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('password', '密码', 'required|min_length[6]|sha1');
		$this->form_validation->set_rules('confirm', '重复密码', 'required|matches[password]');
		
		if ($this->form_validation->run() == FALSE) {
			if ($this->input->post('submitted')) {
				$data['redirect']	= $this->input->post('redirect');
			}
	
			$data['error'] = validation_errors();
				
			$this->load->view('register', $data);
		} else {
			$save['name']			= $this->input->post('name');
			$save['email']			= $this->input->post('email');
			$save['password']		= $this->input->post('password');
			$redirect				= $this->input->post('redirect');
			
			$id = $this->Account_model->save($save);
			$this->Account_model->login($save['email'], $this->input->post('confirm'));
				
			redirect($redirect);
		}
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */