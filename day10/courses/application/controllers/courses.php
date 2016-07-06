<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

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
    $this->load->model('Course');
    $courses = $this->Course->get_all_courses();
    // var_dump($courses);
    $this->load->view('/index', array('courses' => $courses));
  }

  public function add(){
    // var_dump($this->input->post());
    // die();
    $this->load->model("Course");
    $name = $this->input->post('name');
    $description = $this->input->post('description');
    $add_course = $this->Course->add_course($name, $description);
    if($add_course == TRUE) {
        redirect('/');
    }
    else{
      die("Course is not added!");
    }
  }

  public function destory($id){
    $this->load->model("Course");
    $course = $this->Course->get_course_by_id($id);
    // var_dump($course);
    $this->load->view('/destroy', array('course' => $course));
  }

  public function remove($id){
    $this->load->model("Course");
    if($this->Course->delete_course($id)){
      redirect('/');
    }
    else{
      die("Course was not deleted!");
    }
  }

  public function reset_session(){
    $this->session->sess_destroy();
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
