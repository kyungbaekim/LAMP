<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Model {

  function get_all_courses(){
    $query = "SELECT * FROM courses ORDER by id DESC";
    return $this->db->query($query)->result_array();
  }

  function get_course_by_id($course_id){
    $query = "SELECT * FROM courses WHERE id = '{$course_id}'";
    return $this->db->query($query)->row_array();
  }

  function add_course($name, $description){
    //  $query = "INSERT INTO Courses (name, description, created_at) VALUES (?,?,?)";
    //  $values = array($name, $description, date("Y-m-d, H:i:s"));
     $query = "INSERT INTO Courses (name, description, created_at) VALUES ('{$name}', '{$description}', NOW())";
     return $this->db->query($query, $values);
  }

  function delete_course($course_id){
    $query = "DELETE FROM courses WHERE id = '{$course_id}'";
    return $this->db->query($query);
  }
}
