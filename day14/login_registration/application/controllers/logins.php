<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {

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
    $this->load->view('/index');
  }

  public function register(){
    $this->load->model('Login');
    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    $email = $this->input->post('email');
    $password1 = $this->input->post('password1');
    $password2 = $this->input->post('password2');

    // form data validation
    $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('fname', 'FIRST NAME', 'required|alpha');
    $this->form_validation->set_rules('lname', 'LAST NAME', 'required|alpha');
    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
    $this->form_validation->set_rules('password1', 'PASSWORD', 'required|min_length[8]');
    $this->form_validation->set_rules('password2', 'CONFIRM PASSWORD', 'required|matches[password1]');
    if($this->form_validation->run() == FALSE){
      // var_dump(validation_errors());
      // die();
      $this->load->view('/index', array('register_errors' => validation_errors()));
    }
    else{
			$check_email = $this->Login->get_user_by_email($email);
			if(!empty($check_email)){
				$this->session->set_flashdata('duplicate', true);
				redirect('/');
			}
			else{
				$add_user = $this->Login->add_user($fname, $lname, $email, $password1);
	      if($add_user) {
					$this->session->set_flashdata('registered', true);
	        // $this->load->view('/index');
					redirect('/');
	      }
	      else{
	        die("Problem occurred while register your information!");
	      }
			}
    }
  }

  public function login(){
    // form data validation
    $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
    $this->form_validation->set_rules('password', 'PASSWORD', 'required|min_length[8]');
    if($this->form_validation->run() == FALSE){
      $this->load->view('/index', array('login_errors' => validation_errors()));
    }
    else{
      $this->load->model('Login');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->Login->get_user_by_email($email);
      if($user && $user['password'] == $password){
        $this->session->set_userdata('user_id',$user['id']);
				redirect('/welcome');
      }
      else{
        die("Fetching user data failed!");
      }
    }
  }

	public function welcome(){
		$this->load->model('Login');
		$user_info = $this->Login->get_user_by_id($this->session->userdata['user_id']);
		$this->load->view('/welcome', array('user' => $user_info));
	}

  public function reset_session(){
    $this->session->sess_destroy();
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
