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

  public function survey_register(){
    $this->session->set_userdata('name', $this->input->post('full_name'));
    $this->session->set_userdata('location', $this->input->post('location'));
    $this->session->set_userdata('language', $this->input->post('language'));
    $this->session->set_userdata('comment', $this->input->post('comment'));
    // var_dump($this->session->all_userdata());
    // die();
    // redirect('result');
    $this->load->view('/survey_form/result');
  }

  public function time_display(){
    date_default_timezone_set('America/Los_Angeles');
    $this->session->set_userdata('time', date('F d Y<\b\r/>g:ia'));
    $this->load->view('/time_display/index');
  }

  public function great_number_game(){
    if(!isset($this->session->userdata['number'])){
      $this->session->set_userdata('number', rand(1, 100));
    }
    $this->load->view('/great_number_game/index');
  }

  public function checkSession(){
    if($this->input->post('guess') < $this->session->userdata('number')){
      $this->session->set_flashdata('result', 'Your guess is too low!');
    }
    elseif($this->input->post('guess') > $this->session->userdata('number')){
      $this->session->set_flashdata('result', 'Your guess is too high!');
    }
    else{
      $this->session->set_flashdata('correct', 'Your guess is correct!');
    }
    redirect('guess');
  }

  public function destroy(){
		$this->session->unset_userdata('number');
		redirect('guess');
	}

	public function counter()
	{
		// if session data 'counter' exists, increase the counter by 1
		if($this->session->userdata('counter')){
			$counter = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $counter + 1);
		}
		// if session data 'counter' doesn't exist, create and set it as 1
		else{
			$this->session->set_userdata('counter', 1);
		}
		// echo $this->session->userdata('counter');
		$this->load->view('/counter/index', array("counter" => $this->session->userdata('counter')));
	}

	public function reset(){
		$this->session->set_userdata('counter', 0);
		redirect('counter');
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
