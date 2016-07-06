<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxs extends CI_Controller {

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

	public function index_json()
  {
    $data["posts"] = $this->Ajax->get_all_posts();
    echo json_encode($data);
  }

	public function index_html(){
		$this->load->model("Ajax");
		$data['posts'] = $this->Ajax->get_all_posts();
		$this->load->view('display', $data);
	}

	public function create(){
		$this->load->model("Ajax");
		$new_post = $this->input->post();
		$this->Ajax->add_post($new_post);
		$data['posts'] = $this->Ajax->get_all_posts();
		$this->load->view('display', $data);
	}

	public function index(){
    $this->load->view('/index');
  }

  public function reset_session(){
    $this->session->sess_destroy();
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
