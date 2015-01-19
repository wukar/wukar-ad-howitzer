<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Developer extends CI_Model {

	public function get_users($id = false){
		
		if($id === false){
			$this->db->join('profiles', 'users.id = profiles.user_id','LEFT');	
			$res = $this->db->get('users');
			return $res->num_rows() >= 1 ? $res->result() : false;
		}else{
			 $this->db->join('profiles', 'users.id = profiles.user_id','LEFT');	
			 $this->db->where('users.id',$id);	
			$res = $this->db->get('users');
			return $res->num_rows() >= 1 ? $res->result() : false;
		}
	}

	public function set_users($data= array()){
		
		$prof = $data['profile'];
		$user = $data['user'];

		$user_insert['username'] = $user['uname'];
		$user_insert['password'] = $user['pass'];
		$user_insert['email'] = $user['email'];
		$user_insert['role'] = $user['role'];

		$this->db->insert('users', $user_insert);
		
		if($this->db->affected_rows() > 0){
			$id = $this->db->insert_id();

			$profile_insert['firstname'] = $prof['fname'];
			$profile_insert['lastname'] = $prof['lname'];
			$profile_insert['user_id'] = $id;

			$this->db->insert('profiles', $profile_insert);
			
			if($this->db->affected_rows() >= 1){
				$return = array('status'=>true,'Successfully created new user');;
			}else{
				$return = array('status'=>false,'message'=>'Unable to insert in profiles table');
			}

		}else{

			$return = array('status'=>false,'message'=>'Unable to insert in Users Table');
		}

		return (object)$return;

	}

}

/* End of file developers.php */
/* Location: ./application/models/developers.php */