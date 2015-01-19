<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WUKAR_Developer extends WUKAR_Template {

	private $username = 'admin-1';
	private $password = 'pass-1';


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');

		if($this->session->userdata('developer_logged_in') === null){
			if(current_url() !== site_url('developer/home/login'))
				redirect('developer/home/login');
		}

		$this->view_template = '_developer/templates/default';
		$this->view_directory = '_developer';
	}

	public function login(){
		$this->view_template = '_developer/templates/login';

		if($this->input->post()){
			$post = $this->input->post();
			if($post['username'] == $this->username AND $post['password'] == $this->password){
				$this->session->set_userdata(array('developer_logged_in' => true));
				redirect('developer/');
			}
		}

	}

	public function index()
	{
		
	}

}

/* End of file wUKAR_Developer.php */
/* Location: ./application/controllers/wUKAR_Developer.php */