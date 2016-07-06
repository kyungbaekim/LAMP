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
	 public function __construct()
	 	{
	 		parent::__construct();
	 		$this->load->model('Ajax');
	 	}

	public function index_json()
  {
    $data["notes"] = $this->Ajax->get_all_notes();
    echo json_encode($data);
  }

	public function index_html(){
		$data['notes'] = $this->Ajax->get_all_notes();
		$this->load->view('display', $data);
	}

	public function create(){
		$new_note = $this->Ajax->add_note($this->input->post());
		if($new_note){
			$this->index_html();
		}
		else{
			echo "Data upload failed!";
		}
	}

	public function index(){
    $this->load->view('/index');
  }

	public function delete($note_id){
		$delete_note = $this->Ajax->remove_note($note_id);
		if($delete_note){
			redirect('/');
		}
		else{
			echo "Deleting data failed!";
		}
	}

	public function update(){
		// var_dump($this->input->post());
		// die();
		$description = $this->input->post('description');
		$update_note = $this->Ajax->update_note($this->input->post('id'), $description);
		if($update_note){
			redirect('/');
		}
		else{
			echo "Update failed!";
		}
	}

  public function reset_session(){
    $this->session->sess_destroy();
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
