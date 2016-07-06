<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Model {

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

  function update_user1($id, $fname, $lname, $email, $description, $user_level){
    $query = "UPDATE users SET first_name = '{$fname}', last_name = '{$lname}', email = '{$email}', description = '{$description}', user_level = '{$user_level}', created_at = NOW() WHERE id = '{$id}'";
    return $this->db->query($query);
  }

  function add_user($fname, $lname, $email, $password, $description, $user_level){
    $query = "INSERT INTO users (first_name, last_name, email, password, description, user_level, created_at) VALUES ('{$fname}', '{$lname}', '{$email}', '{$password}', '{$description}', '{$user_level}', NOW())";
    return $this->db->query($query);
  }

  function remove_user($user_id){
    $query = "DELETE FROM users where id = '{$user_id}'";
    return $this->db->query($query);
  }

  function get_all_posts_by_user_id($user_id){
    $query = "SELECT concat(users.first_name, ' ', users.last_name) AS name, posts.id, posts.post, DATE_FORMAT(posts.created_at,'%M %D %Y %T') AS posted FROM posts
              LEFT JOIN users ON posts.user_id =users.id
              WHERE posts.owner_id = '{$user_id}'
              ORDER BY posts.created_at DESC";
    return $this->db->query($query)->result_array();
  }

  function add_post($owner_id, $user_id, $message){
     $query = "INSERT INTO posts (owner_id, user_id, post, created_at) VALUES ('{$owner_id}', '{$user_id}', '{$message}', NOW())";
     return $this->db->query($query);
  }

  function get_all_comments(){
    // $query = "SELECT * FROM comments";
    $query = "SELECT users.id AS user_id, concat(users.first_name, ' ', users.last_name) AS name, comments.post_id, comments.comment AS comment, DATE_FORMAT(comments.created_at,'%M %D %Y %T') AS commented FROM comments
              LEFT JOIN users ON comments.user_id = users.id
              ORDER BY comments.created_at DESC";
    return $this->db->query($query)->result_array();
  }

  function add_comment($user_id, $post_id, $comment){
    $query = "INSERT INTO comments (user_id, post_id, comment, created_at) VALUES ('{$user_id}', '{$post_id}', '{$comment}', NOW())";
    return $this->db->query($query);
  }

  // function update_user($name, $description, $price, $user_id){
    //  $query = "INSERT INTO users (name, description, created_at) VALUES (?,?,?)";
    //  $values = array($name, $description, date("Y-m-d, H:i:s"));
    //  $query = "UPDATE users SET name = '{$name}', description = '{$description}', price = '{$price}', created_at = NOW() WHERE id = '{$user_id}'";
    //  return $this->db->query($query);
  // }

  // function delete_user($user_id){
  //   $query = "DELETE FROM users WHERE id = '{$user_id}'";
  //   return $this->db->query($query);
  // }
}
