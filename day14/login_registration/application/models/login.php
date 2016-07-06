<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Model {

  function get_user_by_email($email){
    $query = "SELECT * FROM users WHERE email = '{$email}'";
    return $this->db->query($query)->row_array();
  }

  function get_user_by_id($id){
    $query = "SELECT * FROM users WHERE id = '{$id}'";
    return $this->db->query($query)->row_array();
  }

  function add_user($first_name, $last_name, $email, $password){
    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$password}')";
    return $this->db->query($query);
  }
}
