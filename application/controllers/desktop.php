<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desktop extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	
		$this->load->add_package_path(APPPATH.'themes/'.$this->config->item('theme').'/');
	}
	
	/**
	 * 首页
	 *
	 */
	public function index()
	{
		echo '首页';
	}
}

/* End of file desktop.php */
/* Location: ./application/controllers/desktop.php */