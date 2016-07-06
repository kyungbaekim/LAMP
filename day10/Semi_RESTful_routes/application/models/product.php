<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

  function get_all_products(){
    $query = "SELECT * FROM products";
    return $this->db->query($query)->result_array();
  }

  function get_product_by_id($product_id){
    $query = "SELECT * FROM products WHERE id = '{$product_id}'";
    return $this->db->query($query)->row_array();
  }

  function add_product($name, $description, $price){
    //  $query = "INSERT INTO products (name, description, created_at) VALUES (?,?,?)";
    //  $values = array($name, $description, date("Y-m-d, H:i:s"));
     $query = "INSERT INTO products (name, description, price, created_at) VALUES ('{$name}', '{$description}', '{$price}', NOW())";
     return $this->db->query($query);
  }

  function update_product($name, $description, $price, $product_id){
    //  $query = "INSERT INTO products (name, description, created_at) VALUES (?,?,?)";
    //  $values = array($name, $description, date("Y-m-d, H:i:s"));
     $query = "UPDATE products SET name = '{$name}', description = '{$description}', price = '{$price}', created_at = NOW() WHERE id = '{$product_id}'";
     return $this->db->query($query);
  }

  function delete_product($product_id){
    $query = "DELETE FROM products WHERE id = '{$product_id}'";
    return $this->db->query($query);
  }
}
