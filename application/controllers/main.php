<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model('model_users');
		$this->load->model('model_blog');
	}



	//VIEW PAGE FUNCTIONS



	//HOME
	public function index(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', '', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', '', 'required|trim');
		$this->form_validation->set_rules('cpassword', '', 'required|trim|matches[password]');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

		$this->form_validation->set_message('is_unique', "That %s already exists.");
		$this->form_validation->set_message('matches', "The password doesn't match");
		$this->form_validation->set_message('required', "* Required");

		if($this->form_validation->run()){
			//if no errors, add user to db
			model_users::add_user();
			//send he or she to success page
			redirect('/registration_success');

		}else{
		}

		//load login header if logged in
		if ($this->session->userdata('email')){
			$data['user'] = Model_users::get_user($this->session->userdata('email'));
			$data['title'] = "Wildlife Stories";
			$data['pageTitle'] = 'Welcome Home!';
			$this->load->view("login_header", $data);
			//Move the CTA to the header.php 
			$this->load->view("logged_in_home");
			$this->load->view("login_footer");

		//otherwise load the regular home page
		}else{
			$this->header('Wildlife Stories', 'SIGNUP TO WRITE YOUR OWN STORY');
			$this->load->view("home");
			$this->footer();
		}
	}

	//REGISTRATION SUCCESS
	public function registration_success(){
		$this->header('Wildlife Stories', 'YOU HAVE SUCCESSFULLY REGISTERED');
		$this->load->view("registration_success");
		$this->footer();
	}

	// FEATURED STORIES

	public function featured_one(){
		$this->header('Wildlife Stories', 'The Crowned Crane');
		$this->load->view("featured_one");
		$this->footer();
	}

	public function featured_two(){
		$this->header('Wildlife Stories', 'The Robins');
		$this->load->view('featured_two');
		$this->footer();
	}

	public function featured_three(){
	$this->header('Wildlife Stories', 'The Rabbit');
	$this->load->view('featured_three');
	$this->footer();
	}

	//LOGIN
	public function login(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
		$this->form_validation->set_message('required', 'Required *');

		if($this->form_validation->run()){

			$this->session->set_userdata('email', $this->input->post('email'));
			redirect('/profile');

		}else{

		}

		$data['title'] = "login";
		$data['pageTitle'] = 'Login';
		$this->load->view("header", $data);
		$this->load->view("login", $data);
		$this->load->view("footer");


	}


	// ABOUT
	public function about(){

		if ($this->session->userdata('email')){
			
			$data['user'] = Model_users::get_user($this->session->userdata('email'));
			$data['title'] = "About Wildlife Stories";
			$data['pageTitle'] = 'ABOUT';
			
			$this->load->view("login_header", $data);
			$this->load->view("logged_in_about");
			$this->load->view("login_footer");

		//otherwise load the regular home page
		}else{
			$this->header('About Wildlife Stories', 'ABOUT');
			$this->load->view("about");
			$this->footer();
		}
	}
	// CONTACT
	public function contact(){
		if ($this->session->userdata('email')){
			
			$data['user'] = Model_users::get_user($this->session->userdata('email'));
			$data['title'] = "Contact Wildlife Stories";
			$data['pageTitle'] = 'CONTACT';
			
			$this->load->view("login_header_contact", $data);
			$this->load->view("contact");
			$this->load->view("login_footer");

		//otherwise load the regular home page
		}else{
			$this->header('Contact Wildlife Stories', 'CONTACT');
			$this->load->view("contact");
			$this->footer();
		}
	}


	//PROFILE
	public function profile(){
		if ($this->session->userdata('email')){

				// Get User Data
				$data['user'] = Model_users::get_user($this->session->userdata('email'));


						
				//run the form validation
				//if(!empty($_POST('submit'))){
				
					//make sure user has entered title and post before submitting
					$this->load->library('form_validation');
					$this->form_validation->set_rules('title', 'Title', 'required');
					$this->form_validation->set_rules('post', 'Post', 'required');

					if($this->form_validation->run()){
					
						//if no errors, add post to db
						// if(!empty($_POST['submit'])){
						$story_id = model_blog::add_post();
						 //redirect('/post_success/' . $story_id);
						
						//POST SUBMIT BUTTON
						
							// uploads
							$config['upload_path'] = 'uploads';
							$config['file_name'] = $story_id;
							$config['allowed_types'] = 'jpg'; //only jpg for now. We'll upload other types later.
							$config['max_size'] = '10240';

							$this->load->library('upload', $config);

							$this->upload->do_upload();

							//NO IMAGE UPLOADS ARE WORKING NOW!
							redirect('/post_success/' . $story_id);
					}
				//}

					//NO NEED FOR FORM VALIDATION HERE.

					if(!empty($_POST['upload'])){
						$config['upload_path'] = 'profile_images';
						$config['file_name'] = $data['user']['l_name'];
						$config['allowed_types'] = 'jpg'; //only jpg for now. We'll upload other types later.
						$config['max_size'] = '10240';
						$config['overwrite'] = TRUE;

						$this->load->library('upload', $config);

						$this->upload->do_upload();

					}
				

				// Data
				$data['title'] = "Profile";
				$data['pageTitle'] = "Welcome " . ucfirst($data['user']['f_name']);
				
				// Display PAge
				$this->load->view("login_header", $data);
				$this->load->view("profile", $data);
				$this->load->view("login_footer");

		} else { 
			redirect('/');
		}
	}


	public function post_success($id){
		$data['user'] = Model_users::get_user($this->session->userdata('email'));
		$data['title'] = "Congrats on Your New Wildlife Story!";
		$data['pageTitle'] = "Congrats on Your New Story!";
		$data['new_story_id'] = $id;

		$this->load->view("login_header", $data);
		$this->load->view("post_success", $data);
		$this->load->view("login_footer");
	}

	public function profile_success(){
		$data['user'] = Model_users::get_user($this->session->userdata('email'));
		$data['title'] = "Congrats on Your New Profile Image!";
		$data['pageTitle'] = "Congrats on Your New Profile Image!";

		$this->load->view("login_header", $data);
		$this->load->view("profile_success", $data);
		$this->load->view("login_footer");

	}

	public function stories(){
	if ($this->session->userdata('email')){
	
		$data['user'] = Model_users::get_user($this->session->userdata('email'));
		$data['title'] = "Wildlife Stories";
		$data['pageTitle'] = 'Stories';

			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('post', 'Post', 'required');
					
			//run the form validation
			if($this->form_validation->run()){
			
				//if no errors, add post to db
				$story_id = model_blog::add_post();


				// uploads
				$config['upload_path'] = 'uploads';
				$config['file_name'] = $story_id;
				$config['allowed_types'] = 'jpg'; //only jpg for now. We'll upload other types later.
				$config['max_size'] = '10240';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()) {

					$error = array('error' => $this->upload->display_errors());
					//$this->load->view('upload_form', $error);

					echo 'upload failed' . "<br/>";
					echo $config['upload_path'] . "<br/>";

					print_r($error);
				
				} else {

					//$data = array('upload_data' => $this->upload->data());
					//$this->load->view('upload_success', $data);
					echo 'upload successful';
				}



			}	



		//get all posts and display them in view
		$data['stories'] = Model_blog::get_all_posts();


		$this->load->view("login_header", $data);
		$this->load->view("stories", $data);
		$this->load->view("login_footer");

	}else{ redirect('/'); }
	}
	//get latest story id number if no story exists in url
	public function story($id){
	if($this->session->userdata('email')){
		
			$data['user'] = Model_users::get_user($this->session->userdata('email'));	
			$data['title'] = "Story Name";
			$data['pageTitle'] = 'Story Name';

			$data['story'] = Model_blog::get_post($id);

			$this->load->view("login_header", $data);
			$this->load->view("story", $data);
			$this->load->view("login_footer");

	}else{ redirect(); }
	}

	// REGISTRATION

	public function signup_validation(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', '', 'required|trim|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', '', 'required|trim');
			$this->form_validation->set_rules('cpassword', '', 'required|trim|matches[password]');
			$this->form_validation->set_message('is_unique', "That email address already exists");

		if($this->form_validation->run()){

			//add them to the temp_users db

		}
		
	}	

	// VALIDATE THE USER MATCHES THE DB
	public function validate_credentials(){
		$this->load->model('model_users');
		if($this->model_users->can_log_in()){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials', 'Incorrect Login *');
			return false;
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

}
