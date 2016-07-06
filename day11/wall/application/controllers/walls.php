<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Walls extends CI_Controller {

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
    // $this->load->model('Product');
    // $products = $this->Product->get_all_products();
    // var_dump($courses);
    // $this->load->view('/index', array('products' => $products));
    $this->load->view('/index');
  }

  public function register(){
    $this->load->model('Wall');
    $fname = $this->input->post('first_name');
    $lname = $this->input->post('last_name');
    $email = $this->input->post('email');
    $password1 = $this->input->post('password1');
    $password2 = $this->input->post('password2');

    // form data validation
    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', 'FIRST NAME', 'required|alpha');
    $this->form_validation->set_rules('last_name', 'LAST NAME', 'required|a;pha');
    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
    $this->form_validation->set_rules('password1', 'PASSWORD', 'required|min_length[8]');
    $this->form_validation->set_rules('password2', 'CONFIRM PASSWORD', 'required|matches[password1]');
    if($this->form_validation->run() == FALSE){
      // var_dump(validation_errors());
      // die();
      $this->load->view('/index', array('errors' => validation_errors()));
    }
    else{
      $add_user = $this->Wall->add_user($fname, $lname, $email, $password1);
      if($add_user) {
        $this->load->view('/success');
      }
      else{
        die("Problem occurred while register your information!");
      }
    }
  }

  public function login(){
    // form data validation
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
    $this->form_validation->set_rules('password', 'PASSWORD', 'required|min_length[8]');
    if($this->form_validation->run() == FALSE){
      $this->load->view('/index', array('errors' => validation_errors()));
    }
    else{
      $this->load->model('Wall');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->Wall->get_user_by_email($email);
      if($user && $user['password'] == $password){
        $this->session->set_userdata('user_id',$user['id']);
        $this->session->set_userdata('user_name', $user['first_name']." ".$user['last_name']);
        redirect('/walls/display');
      }
      else{
        die("Fetching user data failed!");
      }
    }
  }

  public function add_post($user_id){
    $this->load->model('Wall');
    $message = $this->input->post('message');
    $add_post = $this->Wall->add_post($user_id, $message);
    if($add_post){
      redirect('/walls/display');
    }
    else{
      die("Data upload failed!");
    }
  }

  // fetch all posts and comments data from DB and display them on main.php
  public function display(){
    $this->load->model('Wall');
    $get_posts = $this->Wall->get_all_posts();
    $comments = $this->Wall->get_all_comments();
    $users = $this->Wall->get_all_users();
    if($get_posts){
      $this->load->view('/main', array('users' => $users, 'posts' => $get_posts, 'comments' => $comments));

    }
    else{
      die("Fetching data failed!");
    }
  }

  public function add_comment($user_id, $post_id){
    $this->load->model('Wall');
    $comment = $this->input->post('comment');
    $add_comment = $this->Wall->add_comment($user_id, $post_id, $comment);
    if($add_comment){
      redirect('/walls/display');
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
