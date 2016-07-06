<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wall extends CI_Model {

  function get_all_users(){
    $query = "SELECT * FROM users";
    return $this->db->query($query)->result_array();
  }

  function get_user_by_email($email){
    $query = "SELECT * FROM users WHERE email = '{$email}'";
    return $this->db->query($query)->row_array();
  }

  function add_user($fname, $lname, $email, $password){
    $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES ('{$fname}', '{$lname}', '{$email}', '{$password}', NOW(), NOW())";
    return $this->db->query($query);
  }

  function get_all_posts(){
    $query = "SELECT users.id AS user_id, concat(users.first_name, ' ', users.last_name) AS name, messages.id, messages.message, DATE_FORMAT(messages.created_at,'%M %D %Y %T') AS posted FROM messages
              LEFT JOIN users ON messages.users_id =users.id
              ORDER BY messages.created_at DESC";
    return $this->db->query($query)->result_array();
  }

  function add_post($user_id, $message){
     $query = "INSERT INTO messages (users_id, message, created_at, updated_at) VALUES ('{$user_id}', '{$message}', NOW(), NOW())";
     return $this->db->query($query);
  }

  function get_all_comments(){
    // $query = "SELECT * FROM comments";
    $query = "SELECT users.id AS user_id, concat(users.first_name, ' ', users.last_name) AS name, messages.id AS message_id, comments.comment AS comment, DATE_FORMAT(comments.created_at,'%M %D %Y %T') AS commented FROM messages
              LEFT JOIN comments ON messages.id = comments.messages_id
              LEFT JOIN users ON comments.users_id = users.id
              ORDER BY comments.created_at ASC";
    return $this->db->query($query)->result_array();
  }

  function add_comment($user_id, $post_id, $comment){
    $query = "INSERT INTO comments (users_id, messages_id, comment, created_at, updated_at) VALUES ('{$user_id}', '{$post_id}', '{$comment}', NOW(), NOW())";
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
