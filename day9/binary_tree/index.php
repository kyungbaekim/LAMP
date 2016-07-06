<?php
Class Node {
  public function __construct($val){
  $this->value = $val;
  $this->left = null;
  $this->right = null;
  }
}

Class BST {
  public function __construct(){
  $this->root= null;
  }

  public function add($val){
  //return true if added correctly
    if($this->root == null){
      $this->root = new Node($val);
      return true;
    }
    // $current = $this->root;
    // var_dump($current->value > $val);
    else{
      $current = $this->root;
      while(true){
        if($val < $current->value){
          if($current->left){
            $current = $current->left;
          }
          else{
            $current->left = new Node($val);
            return true;
          }
        }
        elseif($val > $current->value){
          if($current->right){
            $current = $current->right;
          }
          else{
            $current->right = new Node($val);
            return true;
          }
        }
        else{
          return false;
        }
      }
    }
  }

  public function remove($val){
  //return true if correctly removed
  //return false if value was never found
    if($this->root == null){
      echo "Your BST is empty!";
      return false;
    }
    else{
      $current = $this->root;
      
      // while($current->value != $val){
      //   if($val < $current->value){
      //     if($current->left){
      //       $current = $current->left;
      //     }
      //     else{
      //       $current->left = new Node($val);
      //       return true;
      //     }
      //   }
      //   elseif($val > $current->value){
      //     if($current->right){
      //       $current = $current->right;
      //     }
      //     else{
      //       $current->right = new Node($val);
      //       return true;
      //     }
      //   }
      //   else{
      //     return false;
      //   }
      // }
    }
  }

  public function print_BST(){
  // echo all values in the linked list
  }

  public function find($val){
  //return node if value is found
  //return false if not found
    if($this->root == null){
      return false;
    }
    // $current = $this->root;
    // var_dump($current->value > $val);
    else{
      $current = $this->root;
      while($current->value != $val){
        if($val < $current->value){
          $current = $current->left;
        }
        elseif($val > $current->value){
          $current = $current->right;
        }
        else{
          return false;
        }
      }
      return $current;
    }
  }

  public function isEmpty(){
    if($this->root == null){
      return true;
    }
    else{
      return false;
    }
  }

  public function min(){
  //return the Min value
    if($this->root == null){
      return null;
    }
    else{
      $current = $this->root;
      while($current->left){
        $current = $current->left;
      }
      return $current->value;
    }
  }

  public function max(){
  //return the Max value
    if($this->root == null){
      return null;
    }
    else{
      $current = $this->root;
      while($current->right){
        $current = $current->right;
      }
      return $current->value;
    }
  }
}

$obj = new BST();
var_dump($obj->isEmpty());
$obj->add(100);
$obj->add(90);
$obj->add(110);
$obj->add(101);
$obj->add(91);

echo '<pre>';
print_r($obj);
echo '</pre>';
echo "The min value in BST is: ".$obj->min()."<br>";
echo "The max value in BST is: ".$obj->max()."<br>";

var_dump($obj->find(110));
// function display($root){
//   show($root);
// }
// function show($node){
//   if($node){
//     echo $node;
//     show($node->left);
//     show($node->right);
//   }
// }
?>
