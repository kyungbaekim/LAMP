<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Model {

  function get_all_posts(){
    $query = "SELECT * FROM posts";
    return $this->db->query($query)->result_array();
  }

  function add_post($new_post){
    $query = "INSERT INTO posts (description, created_at) VALUES ('{$new_post['message']}', NOW())";
    return $this->db->query($query);
  }
}
