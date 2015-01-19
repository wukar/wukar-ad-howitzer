<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends WUKAR_Developer {

	public function __construct(){
		parent::__construct();

		$this->_WUKAR_JS_BOT_ = array('vendors/growl/jquery.growl.js');
		$this->_WUKAR_CSS_ = array('vendors/growl/jquery.growl.css');

		$this->load->database();
		$this->load->model('developer');
	}

	public function index()
	{

	}

	public function database_migrations(){
		$this->load->helper('file');
 		$this->load->library('migration');

		if($this->input->post('process_migrations') ){		 
			$data = array();
			 $this->load->library('migration');
			 $post= $this->input->post();

			 if(isset($post['process_migrations_form'])){
			 	//use version number supplied
			 	if($this->migration->version($this->input->post('versions')) === false ){
			 		$data['status'] = 'error';
			 	}else{
			 		$data['status'] = 'success';
			 	}

			 }elseif(isset($post['process_migrations_to_latest'])){
			 	//use the latest
			 	if($this->migration->latest() === false ){
			 		$data['status'] = 'error';
			 	}else{
			 		$data['status'] = 'success';
			 	}

			 }
		}

		if($this->input->is_ajax_request()){
			 $data = array();
			 $post= $this->input->post();

			 if(isset($post['process_migrations_form'])){
			 	//use version number supplied
			 	if($this->migration->version($this->input->post('versions')) === false ){
			 		$data['status'] = 'error';
			 	}else{
			 		$data['status'] = 'success';
			 	}

			 }elseif(isset($post['process_migrations_to_latest'])){
			 	//use the latest
			 	if($this->migration->latest() === false ){
			 		$data['status'] = 'error';
			 	}else{
			 		$data['status'] = 'success';
			 	}

			 }


			header('Content-Type: application/json');
			echo json_encode($data);
			die();
		}

		$this->view_data['current_migration_version'] = $this->db->get('migrations', 1)->row()->version;

		$filenames = get_filenames(APPPATH.'/migrations');
		if($filenames){
			$newFilenames = array();
			foreach($filenames as $filename){
				$fn = explode('_',$filename);

				$newFilenames[$fn[0]] = $filename;
			}

			$this->view_data['path'] = $newFilenames;
		}else{
			$this->view_data['path'] = false;	
		}
		
	}


	public function userdatabase(){

		$this->load->helper('form');

		$this->view_data['users'] = $this->developer->get_users();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('user[uname]', 'Username', 'required');
        $this->form_validation->set_rules('user[pass]', 'Password', 'required|matches[user[cpass]]',
     		array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('user[cpass]', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('user[email]', 'Email', 'required');


        if ($this->form_validation->run() == FALSE){
             $this->view_data['errors'] = validation_errors('<span class="form_error">','</span>');
        }
        else{
            $result = $this->developer->set_users($this->input->post());
        }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */