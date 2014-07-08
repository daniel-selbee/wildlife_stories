<?php
class Model_blog extends CI_Model {


	public $id;
	public $title;		// 
	public $post;
	public $user;		// user email
	public $date;		//



	/* -- CONTSTRUCT -- */
	/* ---------------------------------------- */
	public function __construct($data = array()) {
		unset($this);

		foreach ($data as $key => $value) {
			$this->$key = $value;
		}
	}

	//needed to add the current user as an author to a post


	public function get_all_posts(){
		//SELECT * FROM stories
		$this->db->select('id, title, post, user, date');
		$this->db->from('stories');
		$stories = $this->db->get();

		// $this->load->model('model_users');
		//keep in mind only the title and author will be displayed on the stories page
		if ($stories->num_rows() > 0){
			return $stories->result_array();
		}else{
		//return every title and author from db 
		return false;
		}

	}


	public function get_post($id){

		//SELECT story_id FROM stories and give it a url
		$this->db->select('id, title, post, user, date');
		$this->db->from('stories');
		$this->db->where('id', $id);
		$this->db->limit(1);
		$post = $this->db->get();

		if ($post->num_rows() > 0){

			return new Model_blog($post->row_array());

		}else{
			return false;
		}

	}


	public function get_author(){
		
		$this->load->model('model_users');
		$username = Model_users::get_user($this->user);
		$name = ucfirst($username['f_name']) . " " . ucfirst($username['l_name']);

		return $name;
	}

	
	public function add_post(){
		$this->load->model('model_users');
		$data = array(

			//add title and post to database
			'title' => $this->input->post('title'),
			'post' => $this->input->post('post'),

			//get the current user and add to database.
			'user' => $this->session->userdata('email')

			//The date is automatically stored in the db when a post is created
		);
		//echo "<p>" . "Your story has been published." . "</p>";
		$this->db->insert('stories', $data);

		return $this->db->insert_id();

	}

	public function getLastInserted() {
		return $this->db->insert_id();
       }



// End Class
}
?>