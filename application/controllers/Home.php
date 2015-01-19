<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends WUKAR_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->_WUKAR_CSS_ = array('assets/css/test.css','assets/css/test2.css');
		$this->_WUKAR_JS_TOP_ = array('assets/js/test.js','assets/js/test2.js');
		$this->_WUKAR_JS_BOT_ = array('assets/js/test.js','assets/js/test2.js');
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */