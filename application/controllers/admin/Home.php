<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		
	}

	public function users(){

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

/* End of file home.php */
/* Location: ./application/controllers/home.php */