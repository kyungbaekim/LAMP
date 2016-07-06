<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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

  public function index(){
    if(!isset($this->session->userdata['user_id'])){
      $this->session->set_userdata('user_id', '');
    }
    $this->load->view('/index');
  }

  public function signin(){
    $this->load->view('/signin');
  }

  public function signin_process(){
    // form data validation
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
    $this->form_validation->set_rules('password', 'PASSWORD', 'required|min_length[8]');
    if($this->form_validation->run() == FALSE){
      $this->load->view('/index', array('errors' => validation_errors()));
    }
    else{
      $this->load->model('Dashboard');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->Dashboard->get_user_by_email($email);
      if($user && $user['password'] == $password){
        $this->session->set_userdata('user_id',$user['id']);
        $this->session->set_userdata('user_name', $user['first_name']." ".$user['last_name']);
        $this->session->set_userdata('user_level',$user['user_level']);
        redirect('/');
      }
      else{
        die("Fetching user data failed!");
      }
    }
  }

  public function register(){
    $this->load->model('Dashboard');
    $check_if_first_user = $this->Dashboard->get_all_users();
    // var_dump($check_if_first_user);
    // die();
    $this->load->view('/register');
  }

  public function register_process(){
    $this->load->model('Dashboard');
    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    $email = $this->input->post('email');
    $password1 = $this->input->post('password1');
    $password2 = $this->input->post('password2');
    $description = $this->input->post('description');

    // form data validation
    $this->load->library('form_validation');
    $this->form_validation->set_rules('fname', 'FIRST NAME', 'required|alpha');
    $this->form_validation->set_rules('lname', 'LAST NAME', 'required|alpha');
    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
    $this->form_validation->set_rules('password1', 'PASSWORD', 'required|min_length[8]');
    $this->form_validation->set_rules('password2', 'CONFIRM PASSWORD', 'required|matches[password1]');
    if($this->form_validation->run() == FALSE){
      // var_dump(validation_errors());
      // die();
      $this->load->view('/register', array('errors' => validation_errors()));
    }
    else{
      $check_if_first_user = $this->Dashboard->get_all_users();
      if(empty($check_if_first_user)){
        $user_level = 9;
      }
      else{
        $user_level = 0;
      }
      $add_user = $this->Dashboard->add_user($fname, $lname, $email, $password1, $description, $user_level);
      if($add_user) {
        $this->load->view('/success');
      }
      else{
        die("Problem occurred while register your information!");
      }
    }
  }

  public function add_new(){
    $this->load->view('/register');
  }

  public function dashboard(){
    $this->load->model('Dashboard');
    $users = $this->Dashboard->get_all_users();
    $this->load->view('/members', array('users' => $users));
  }

  public function edit($user_id){
    $this->load->model('Dashboard');
    $user = $this->Dashboard->get_user_by_id($user_id);
    $this->load->view('/edit', array('user' => $user));
  }

  public function edit_process1($user_id){
    $this->load->model('Dashboard');
    $user = $this->Dashboard->get_user_by_id($user_id);

    $this->load->library('form_validation');
    $this->form_validation->set_rules('fname', 'FIRST NAME', 'required|alpha');
    $this->form_validation->set_rules('lname', 'LAST NAME', 'required|alpha');
    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
    $this->form_validation->set_rules('user_level', 'USER LEVEL', 'required');

    if($this->form_validation->run() == FALSE){
      // var_dump(validation_errors());
      // die();
      $this->load->view('/edit', array('errors' => validation_errors(), 'user' => $user));
    }
    else{
      $fname = $this->input->post('fname');
      $lname = $this->input->post('lname');
      $email = $this->input->post('email');
      $description = $this->input->post('description');
      $user_level = $this->input->post('user_level');

      $user = $this->Dashboard->update_user1($user_id, $fname, $lname, $email, $description, $user_level);
      if($user){
        redirect('/dashboard');
      }
      else{
        echo "Something went wrong!";
      }
    }
  }

  public function edit_process2($user_id){
    $this->load->model('Dashboard');
    $user = $this->Dashboard->get_user_by_id($user_id);

    $this->load->library('form_validation');
    $this->form_validation->set_rules('password1', 'PASSWORD', 'required|min_length[8]');
    $this->form_validation->set_rules('password2', 'CONFIRM PASSWORD', 'required|matches[password1]');
    if($this->form_validation->run() == FALSE){
      // var_dump(validation_errors());
      // die();
      $this->load->view('/edit', array('errors' => validation_errors(), 'user' => $user));
    }
    else{
      $password = $this->input->post('password1');
      $user = $this->Dashboard->update_user2($user_id, $password);
      if($user){
        redirect('/dashboard');
      }
      else{
        echo "Something went wrong!";
      }
    }
  }

  public function remove($user_id){
    $this->load->model('Dashboard');
    $delete_user = $this->Dashboard->remove_user($user_id);
    if($delete_user){
      redirect('/dashboard');
    }
    else{
      die("Data delete failed!");
    }
  }

  // fetch all post and comment data from DB inder the user and display them
  public function show($owner_id){
    $this->load->model('Dashboard');
		$get_user = $this->Dashboard->get_user_by_id($owner_id);
		// var_dump($get_user);
		// die();
    if($get_user){
			$get_posts = $this->Dashboard->get_all_posts_by_user_id($owner_id);
			$get_comments = $this->Dashboard->get_all_comments();
			// var_dump($get_posts);
			// die();
			$this->load->view('/profile', array('user' => $get_user, 'posts' => $get_posts, 'comments' => $get_comments));
    }
    else{
      echo "Fetching user information failed!";
    }
  }

	public function add_post($owner_id){
		$this->load->model('Dashboard');
		$user_id = $this->session->userdata['user_id'];
		// $owner_id = $this->session->userdata['owner_id'];
		$message = $this->input->post('message');
		$add_post = $this->Dashboard->add_post($owner_id, $user_id, $message);
		if($add_post){
			$get_user = $this->Dashboard->get_user_by_id($owner_id);
	    if($get_user){
				$get_posts = $this->Dashboard->get_all_posts_by_user_id($owner_id);
				$get_comments = $this->Dashboard->get_all_comments();
				$this->load->view('/profile', array('user' => $get_user, 'posts' => $get_posts, 'comments' => $get_comments));
	    }
	    else{
	      echo "Fetching user information failed!";
	    }
		}
		else{
			die("Data upload failed!");
		}
	}

  public function add_comment($user_id, $post_id){
    $this->load->model('Dashboard');
		$owner_id = $this->input->post('owner_id');
    $comment = $this->input->post('comment');
    $add_comment = $this->Dashboard->add_comment($user_id, $post_id, $comment);
    if($add_comment){
			$get_user = $this->Dashboard->get_user_by_id($owner_id);
	    if($get_user){
				$get_posts = $this->Dashboard->get_all_posts_by_user_id($owner_id);
				$get_comments = $this->Dashboard->get_all_comments();
				$this->load->view('/profile', array('user' => $get_user, 'posts' => $get_posts, 'comments' => $get_comments));
	    }
	    else{
	      echo "Fetching user information failed!";
	    }
    }
    else{
      die("Data upload failed!");
    }
  }

  public function reset_session(){
    $this->session->sess_destroy();
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
