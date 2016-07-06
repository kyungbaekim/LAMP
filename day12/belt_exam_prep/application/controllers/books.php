<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

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
    if(isset($this->session->userdata['user_id']) && $this->session->userdata['user_id']){
			redirect('/books_main');
		}
		else{
    $this->load->view('/index');
		}
  }

  public function register(){
    $this->load->model('Book');
    $name = $this->input->post('name');
    $alias = $this->input->post('alias');
    $email = $this->input->post('email');
    $password1 = $this->input->post('password1');
    $password2 = $this->input->post('password2');

    // form data validation
    $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('name', 'NAME', 'required');
    $this->form_validation->set_rules('alias', 'ALIAS', 'required');
    $this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email');
    $this->form_validation->set_rules('password1', 'PASSWORD', 'required|min_length[8]');
    $this->form_validation->set_rules('password2', 'CONFIRM PASSWORD', 'required|matches[password1]');
    if($this->form_validation->run() == FALSE){
      // var_dump(validation_errors());
      // die();
      $this->load->view('/index', array('register_errors' => validation_errors()));
    }
    else{
      $add_user = $this->Book->add_user($name, $alias, $email, $password1);
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
      $this->load->model('Book');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->Book->get_user_by_email($email);
      if($user && $user['password'] == $password){
        $this->session->set_userdata('user_id',$user['id']);
        $this->session->set_userdata('user_alias', $user['alias']);
        // $this->load->view('/home', array('user' => $user));
				redirect('/books_main');
      }
      else{
        die("Fetching user data failed!");
      }
    }
  }

	public function books_main(){
		$this->load->model('Book');
		$get_books = $this->Book->get_all_books();
		$get_reviews = $this->Book->get_all_reviews();
		$get_other_books = $this->Book->get_books_by_review_order();
		$this->load->view('/home', array('books' => $get_books, 'reviews' => $get_reviews, 'others' => $get_other_books));
	}

	public function add(){
		$this->load->model('Book');
		$books = $this->Book->get_all_books();
		$this->load->view('/add_book', array('books' => $books));
	}

  public function add_book_review(){
		// $this->load->library('form_validation');
		// $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    // $this->form_validation->set_rules('title', 'BOOK TITLE', 'required');
    // $this->form_validation->set_rules('review', 'REVIEW', 'required');
    // $this->form_validation->set_rules('rating', 'RATING', 'required');
    // if($this->form_validation->run() == FALSE){
    //   $this->load->view('/index', array('register_errors' => validation_errors()));
    // }
    $this->load->model('Book');
    $title = $this->input->post('title');
		if($this->input->post('author1') != '' && $this->input->post('author2') != ''){
			$author = $this->input->post('author2');
		}
		elseif($this->input->post('author1') != '' && $this->input->post('author2') == ''){
			$author = $this->input->post('author1');
		}
		else{
			$author = $this->input->post('author2');
		}
		$review = $this->input->post('review');
		$rating = $this->input->post('rating');
    $add_book = $this->Book->add_book($title, $author);
    if($add_book){
			$get_book = $this->Book->get_book_by_title($title);
			if($get_book){
				$add_review = $this->Book->add_review($get_book['id'], $this->session->userdata['user_id'], $review, $rating);
				$this->session->set_userdata('book_id', $get_book['id']);
				// var_dump($get_book['id']);
				// var_dump($this->session->userdata('book_id'));
				// die();
				redirect('/display');
			}
			else{
				echo "Data fetch from DB(books table) by book title failed!";
			}
    }
    else{
      echo "Data upload failed!";
    }
  }

	public function detail($book_id){
		$this->session->set_userdata('book_id', $book_id);
		redirect('/display');
	}

  // fetch all reviews and users who wrote the reviews from DB and display
  public function display(){
    $this->load->model('Book');
		$get_book = $this->Book->get_book_by_id($this->session->userdata('book_id'));
		// var_dump($get_book);
		// var_dump($get_reviews);
		// die();
    if($get_book){
			$get_reviews = $this->Book->get_all_reviews();
			if($get_reviews){
				$this->load->view('/detail', array('book' => $get_book, 'reviews' => $get_reviews));
			}
			else{
				echo "Fetching review data failed!";
			}
    }
    else{
      echo "Fetching book data failed!";
    }
  }

	public function user_detail($user_id){
		$this->load->model('Book');
		$user = $this->Book->get_user_by_id($user_id);
		if($user){
			$books_title = $this->Book->get_all_books_by_reviews();
			if($books_title){
				$this->load->view('/user_detail', array('user' => $user, 'books' => $books_title));
			}
			else{
				echo "Data fetch for reviewed books failed!";
			}
		}
		else{
			echo "User information data fetch failed!";
		}
	}

  public function add_review(){
    $this->load->model('Book');
		$book_id = $this->session->userdata['book_id'];
		$user_id = $this->session->userdata['user_id'];
    $review = $this->input->post('review');
		$rating = $this->input->post('rating');
    $add_review = $this->Book->add_review($book_id, $user_id, $review, $rating);
    if($add_review){
      redirect('/display');
    }
    else{
      echo "Data upload failed!";
    }
  }

	public function remove($id){
		$this->load->model('Book');
		$delete_review = $this->Book->delete_review($id);
		if($delete_review){
			redirect('/display');
		}
		else{
			echo "Deleting review data failed!";
		}
	}

  public function reset_session(){
    $this->session->sess_destroy();
    redirect('/');
  }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
