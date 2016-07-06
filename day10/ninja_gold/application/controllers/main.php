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
    if(!isset($this->session->userdata['gold'])){
      $this->session->set_userdata('gold', 0);
    }

    if(!isset($this->session->userdata['activity'])){
      $this->session->set_userdata('activity', array());
    }
    $this->load->view('/index');
  }

  public function process_money(){
    date_default_timezone_set('America/Los_Angeles');

    $display = '';
    if($this->input->post('action') == 'farm'){
      $earned = rand(10, 20);
      $display = 'You entered a farm and earned '.$earned.' gold.  '.date("F j Y, g:i a");
    }
    else if($this->input->post('action') == 'cave'){
      $earned = rand(5, 10);
      $display = 'You entered a cave and earned '.$earned.' gold.  '.date("F j Y, g:i a");
    }
    else if($this->input->post('action') == 'house'){
      $earned = rand(2, 5);
      $display = 'You entered a house and earned '.$earned.' gold.  '.date("F j Y, g:i a");
    }
    else if($this->input->post('action') == 'casino'){
      $earn_lose = rand(1, 10);
      $earned = rand(0, 50);
      // Earning chance at Casino is 70%
      // Earn gold if $earn_lose < 8
      // Lose gold if $earn_lose > 7
      if($earn_lose > 7){
        $earned = $earned * -1;
        $display = 'You entered a casino and lost '.($earned * -1).' gold.  '.date("F j Y, g:i a");
      }
      else {
        $display = 'You entered a casino and earned '.$earned.' gold.  '.date("F j Y, g:i a");
      }
    }
    $this->session->set_userdata('gold', $this->session->userdata('gold') + $earned);
    $old_session = $this->session->userdata('activity');
    array_push($old_session, $display);
    $this->session->set_userdata('activity', $old_session);

    redirect('/');
  }

  public function destroy(){
    $this->session->unset_userdata('gold');
    $this->session->unset_userdata('activity');
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
