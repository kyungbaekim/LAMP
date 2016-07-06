<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Model {

  function get_all_users(){
    $query = "SELECT * FROM users";
    return $this->db->query($query)->result_array();
  }

  function get_user_by_email($email){
    $query = "SELECT * FROM users WHERE email = '{$email}'";
    return $this->db->query($query)->row_array();
  }

  function get_user_by_id($id){
    $query = "SELECT * FROM users WHERE id = '{$id}'";
    return $this->db->query($query)->row_array();
  }

  function add_user($name, $alias, $email, $password){
    $query = "INSERT INTO users (name, alias, email, password) VALUES ('{$name}', '{$alias}', '{$email}', '{$password}')";
    return $this->db->query($query);
  }

  function get_all_books(){
    $query = "SELECT * FROM books";
    return $this->db->query($query)->result_array();
  }

  function add_book($title, $author){
     $query = "INSERT INTO books (title, author) VALUES ('{$title}', '{$author}')";
     return $this->db->query($query);
  }

  function get_book_by_id($id){
    $query = "SELECT * FROM books WHERE id = '{$id}'";
    return $this->db->query($query)->row_array();
  }

  function get_book_by_title($title){
    $query = "SELECT * FROM books WHERE title = '{$title}'";
    return $this->db->query($query)->row_array();
  }

  function get_books_by_review_order(){
    $query = "SELECT books.id AS book_id, reviews.id AS review_id, books.title FROM books
              LEFT JOIN reviews ON books.id = reviews.book_id
              -- GROUP by books.title
              ORDER BY reviews.created_at DESC";
    return $this->db->query($query)->result_array();
  }

  function add_review($book_id, $user_id, $review, $rating){
     $query = "INSERT INTO reviews (book_id, user_id, review, rating, created_at) VALUES ('{$book_id}', '{$user_id}', '{$review}', '{$rating}', NOW())";
     return $this->db->query($query);
  }

  function get_all_reviews(){
    $query = "SELECT users.id AS user_id, users.name, reviews.id AS review_id, reviews.book_id, books.title, reviews.review, reviews.rating, DATE_FORMAT(reviews.created_at,'%M %D %Y %T') AS reviewed FROM users
              LEFT JOIN reviews ON users.id = reviews.user_id
              LEFT JOIN books ON reviews.book_id = books.id
              ORDER BY reviews.created_at DESC";
    return $this->db->query($query)->result_array();
  }

  function get_all_books_by_reviews(){
    $query = "SELECT users.id AS user_id, users.name, reviews.id AS review_id, reviews.book_id, books.title, reviews.review, reviews.rating, DATE_FORMAT(reviews.created_at,'%M %D %Y %T') AS reviewed FROM users
              LEFT JOIN reviews ON users.id = reviews.user_id
              LEFT JOIN books ON reviews.book_id = books.id
              GROUP by books.title
              ORDER BY reviews.created_at DESC";
    return $this->db->query($query)->result_array();
  }

  function delete_review($id){
    $query = "DELETE FROM reviews WHERE id = '{$id}'";
    return $this->db->query($query);
  }

  // function update_user($name, $description, $price, $user_id){
    //  $query = "INSERT INTO users (name, description, created_at) VALUES (?,?,?)";
    //  $values = array($name, $description, date("Y-m-d, H:i:s"));
    //  $query = "UPDATE users SET name = '{$name}', description = '{$description}', price = '{$price}', created_at = NOW() WHERE id = '{$user_id}'";
    //  return $this->db->query($query);
  // }
}
