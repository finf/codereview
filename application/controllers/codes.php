<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Codes extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
		$this->load->model(array('Codes_model'));
		$this->load->helper('form_helper');
		$this->load->add_package_path(APPPATH.'themes/'.$this->config->item('theme').'/');
	}
	
	/**
	 * 添加code案例
	 *
	 */
	function add()
	{
		$data['login']	= $this->Account_model->is_logged_in('codes/add');
		$data['title']	= '添加案例';
		$data['account'] = $this->account_session->userdata('account');
		
		$data['code_title'] = '';
		$data['content'] = '';
		$data['tag'] = '';
		
		$submitted 		= $this->input->post('submitted');
		if ($submitted) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', '标题', 'trim|required|max_length[128]');
			$this->form_validation->set_rules('content', '内容', 'required');
			$this->form_validation->set_rules('tag', '标签', 'trim|required');
			$title		= $this->input->post('title');
			$content	= $this->input->post('content');
			$tag   		= $this->input->post('tag');
			
			if ($this->form_validation->run() == FALSE) {
				$data['error'] = validation_errors();
				$data['code_title'] = $title;
				$data['content'] = $content;
				$data['tag'] = $tag;
			} else {
				$result		= $this->Codes_model->save($title, $content, $tag);
				if ($result) {
					redirect('codes/'. $result . '/' . $title);
				}
			}
		}
		
		$this->load->view('add_code', $data);
	}
	
	/**
	 * 案例显示页面
	 * @param unknown_type $codeId
	 */
	function view($codeId)
	{
		$data['login']	= $this->Account_model->is_logged_in('codes/add');
		$data['account'] = $this->account_session->userdata('account');
		$data['code'] = $this->Codes_model->get_code($codeId);
		if (!$data['code']) {
			show_404();
		}
		$data['title']	= $data['code']['title'];
		$this->load->view('view_code', $data);
	}
}

/* End of file codes.php */
/* Location: ./application/controllers/codes.php */