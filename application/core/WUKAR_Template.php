<?php 
/*
	THIS FILE IS JUST TO AUTOMATE THE VIEWS OF THE SYSTEM
	TAKES THE CURRENT URL METHOD AND FUNCTION AND FINDS IT IN THE VIEWS DIRECTORY
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WUKAR_Template extends CI_Controller {

	protected $view_template = 'templates/default'; //default template to be used
    protected $view_path = ''; //the property that will hold the url class and method
    protected $view_data = array(); //the property that will hold all views data
    protected $view_directory = ''; // the views folder 

    protected $_WUKAR_CSS_ = array(); //the property that will hold a user assigned css path
    protected $_WUKAR_JS_TOP_ = array(); //the property that will hold a user assigned js top path
    protected $_WUKAR_JS_BOT_ = array(); //the property that will hold  a user assigned js bot path

    protected $_WUKAR_PAGE_TITLE_ = ''; //page title


	public function __construct(){
		parent::__construct();
		$this->_WUKAR_PAGE_TITLE_ = $this->_WUKAR_PAGE_TITLE_ == '' ? $this->router->method : $this->_WUKAR_PAGE_TITLE_;
	}

	/* Change CI OUTPUT to output our self made template */
	public function _output($output)
    {
        if($this->view_path !== FALSE && empty($this->view_path)){
        	$this->view_path = $this->view_directory.'/'.$this->router->class . '/' . $this->router->method;
        }
        
        $yield = file_exists(APPPATH . 'views/' . $this->view_path . '.PHP') ? $this->load->view($this->view_path, $this->view_data, TRUE) : FALSE ;
        
        if($this->view_template){
            $_final_data['_WUKAR_HTML_TEMPLATE_'] = $yield;
            $_final_data['_WUKAR_PAGE_TITLE_'] = $this->_WUKAR_PAGE_TITLE_;
            $_final_data['_WUKAR_CSS_'] = $this->_process_assets('css',$this->_WUKAR_CSS_);
            $_final_data['_WUKAR_JS_TOP_'] = $this->_process_assets('js',$this->_WUKAR_JS_TOP_);
            $_final_data['_WUKAR_JS_BOT_'] = $this->_process_assets('js',$this->_WUKAR_JS_BOT_);


            echo $this->load->view( $this->view_template, $_final_data , TRUE);
        }else{
            echo $yield;
			echo $output;
		}
    }

    private function _process_assets($type = '',$config = array()){

        $this->load->helper('url');
        $type = strtolower($type);

        if($type == '' OR !in_array($type, array('js','css') )){
            return '';
        }

        if(count($config) == 0){
            return '';
        }

        $css_template = '<link rel="stylesheet" type="text/css" href="{{link}}">';
        $js_template = '<script type="text/javascript" src="{{link}}" ></script>';
        $output = '';

        if(strtolower($type) == 'css'){
            $template = $css_template;
        }elseif (strtolower($type) == 'js') {
            $template = $js_template;
        }


        foreach($config as $path){
            $path = asset_url($path);
            $output .= str_replace('{{link}}', $path, $template);
        }

        return $output;

    }
    /**
    * function for formatting and redirecting message, using flashmessage
    * @param string $type e,s,n,p 
    * @param string $message the message you want to be sent 
    * @param string $redirect the url segment i.e controller/method 
    * @param string $var_name uses a different name for flashdata 
    * @return string formatted string with css and html
    */
    public function _msg($type = FALSE,$message = FALSE,$redirect = FALSE,$var_name = 'system_message')
    {
        $type = strtolower($type);
        switch($type)
        {
            case $type === 'e':
                $template = "<div data-alert class='alert-box alert'><i class='icon-exclamation-sign'></i> ".$message."</div>";
            break;
            case $type === 's':
                $template = "<div data-alert class='alert-box success'><i class='icon-ok'></i> ".$message."</div>";
            break;
            case $type === 'n':
                $template = "<div class='alert-box'><i class='icon-info-sign'></i> ".$message."</div>";
            break;
            case $type === 'p':
                $template = $message;
            break;
            case $type === FALSE;
                $template = $message;
            break;
        }
        
        if($type AND $message AND $redirect)
        {
            $this->session->set_flashdata($var_name,$template);
            redirect($redirect);
        }elseif($type AND $message AND $redirect == FALSE){
            return $template;
        }
        
        if($redirect == FALSE AND $message == FALSE AND $redirect == FALSE)
        {
            return $this->session->flashdata($var_name);
        }
    }
}
/* End of file wukar_Template.php */
/* Location: ./application/controllers/wukar_Template.php */