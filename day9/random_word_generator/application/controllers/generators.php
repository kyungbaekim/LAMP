<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generators extends CI_Controller {

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
    if(!isset($this->session->userdata['counter'])){
      $this->session->set_userdata('counter', 1);
    }

    if(!isset($this->session->userdata['word'])){
      $this->session->set_userdata('word', '');
    }
    $this->load->view('/word_generator/index');
  }

  public function create_word(){
    $this->session->set_userdata('counter', $this->session->userdata('counter') + 1);

    // create a random word from array by using rand()
    $array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    $word = '';
    $word_length = 14;

    for($i=0; $i<$word_length; $i++){
      $word = $word.$array[rand(0, count($array) - 1)];
      // var_dump($word);
    }

    $this->session->set_userdata('word', $word);
    redirect('/');
    // $this->load->view('/survey_form/result');
  }

  public function destroy(){
    $this->session->unset_userdata('counter');
    $this->session->unset_userdata('word');
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
