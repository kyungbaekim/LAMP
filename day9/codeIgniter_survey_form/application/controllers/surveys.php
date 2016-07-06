<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surveys extends CI_Controller {

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
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }
  //
	// public function __construct(){
	// 	parent::__construct();
	// 	$this->output->enable_profiler();
	// }

  public function index(){
    $this->load->view('/survey_form/index');
  }

  public function process_form(){
    $this->session->set_userdata('name', $this->input->post('full_name'));
    $this->session->set_userdata('location', $this->input->post('location'));
    $this->session->set_userdata('language', $this->input->post('language'));
    $this->session->set_userdata('comment', $this->input->post('comment'));
    if(!isset($this->session->userdata['counter'])){
      $this->session->set_userdata('counter', 0);
    }
    $this->session->set_userdata('counter', $this->session->userdata('counter') + 1);
    // var_dump($this->session->all_userdata());
    // die();
    redirect('/result');
    // $this->load->view('/survey_form/result');
  }

  public function showResult(){
    $this->load->view('/survey_form/result');
  }

  public function destroy(){
    $this->session->unset_userdata('counter');
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
