<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Model {

  function get_all_notes(){
    $query = "SELECT * FROM notes";
    return $this->db->query($query)->result_array();
  }

  function add_note($new_note){
    $query = "INSERT INTO notes (title, created_at, updated_at) VALUES ('{$new_note['title']}', NOW(), NOW())";
    return $this->db->query($query);
  }

  function remove_note($note_id){
    $query = "DELETE FROM notes WHERE id = '{$note_id}'";
    return $this->db->query($query);
  }

  function update_note($note_id, $description){
    $query = "UPDATE notes SET description = '{$description}', updated_at = NOW() WHERE id = '{$note_id}'";
    return $this->db->query($query);
  }
}
