<?php

class Model_users extends CI_Model{

	public function can_log_in(){

		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));

			$query = $this->db->get('users');

			if($query->num_rows() == 1){
				return true;
			}else{
				return false;
			}

	}

	public function add_user(){
		$data = array(
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'f_animal' => $this->input->post('f_animal')
			);

		$this->db->insert('users', $data);

	}


	public function get_user($email){

		$this->db->select('f_name, l_name, f_animal, number_posts');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->limit(1);
		$user = $this->db->get();

		if ($user->num_rows() > 0) {

			//Return User
			return $user->row_array();

		} else {

			return false;

		}
	}



}