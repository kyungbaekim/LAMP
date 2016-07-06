<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

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
    $this->load->model('Product');
    $products = $this->Product->get_all_products();
    // var_dump($courses);
    $this->load->view('/index', array('products' => $products));
  }

  public function new_item(){
    $this->load->view('/new');
  }

  public function create(){
    $this->load->model('Product');
    $name = $this->input->post('name');
    $description = $this->input->post('description');
    $price = $this->input->post('price');

    $this->load->library("form_validation");

    // $this->form_validation->set_rules('name', 'NAME', 'required');
    // $this->form_validation->set_rules('description', 'DESCRIPTON', 'required');
    $this->form_validation->set_rules('price', 'PRICE', 'required|numeric|decimal');
    if($this->form_validation->run() == FALSE){
      $this->load->view('/new', array('errors' => validation_errors()));
      // var_dump(validation_errors());
    }
    else{
      $add_product = $this->Product->add_product($name, $description, $price);
      if($add_product) {
          redirect('/');
      }
      else{
        die("Product is not added!");
      }
    }
  }

  public function show($id){
    $this->load->model('Product');
    $product = $this->Product->get_product_by_id($id);
    if($product){
      $this->load->view('/show', array('product' => $product));
    }
    else{
      die("Fetching data failed!");
    }
  }

  public function edit($id){
    $this->load->model('Product');
    $product = $this->Product->get_product_by_id($id);
    if($product){
      $this->load->view('/edit', array('product' => $product));
    }
    else{
      die("Fetching data failed!");
    }
  }

  public function update($id){
    $this->load->model('Product');
    $name = $this->input->post('name');
    $description = $this->input->post('description');
    $price = $this->input->post('price');
    // var_dump($this->input->post());
    $edit_product = $this->Product->update_product($name, $description, $price, $id);
    if($edit_product){
      redirect('/');
    }
    else{
      die("Update data failed!");
    }
  }

  public function destory($id){
    $this->load->model('Product');
    $delete_product = $this->Product->delete_product($id);
    if($delete_product){
      redirect('/');
    }
    else{
      die("Update data failed!");
    }
  }

  public function reset_session(){
    $this->session->sess_destroy();
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
