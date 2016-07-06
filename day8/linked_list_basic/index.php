<?php
Class Node{
  public function __construct($value){
    $this->value= $value;
    $this->next = null;
  }
}

Class SinglyLinkedList{
  public function __construct(){
    $this->head = null;
  }

  public function add($val){
    if($this->head == null){
      $this->head = new Node($val);
      return $this;
    }
    else{
      $current = $this->head;
      while($current->next){
        $current = $current->next;
      }
      $current->next = new Node($val);
      return $this;
    }
  }

  public function remove($val){
    if($this->head->value == $val){
      $this->head = $this->head->next;
      return $this;
    }
    else{
      $current = $this->head;
      while($current->next != null){
        if($current->next->value == $val){
          $temp = $current->next->next;
          $current->next = $temp;
          return $this;
        }
        else {
          $current = $current->next;
        }
      }
      echo "<br>The given value: ".$val." is not found in the list!<br>";
      return $this;
    }
  }

  public function removeDups($val){
    $current = $this->head;
    while($current != null && $current->value != $val){
        $current = $current->next;
    }
    while($current->next != null){
      if($current->next->value == $val){
        $temp = $current->next->next;
        $current->next = $temp;
      }
      else {
        $current = $current->next;
      }
    }
    return $this;
  }

  public function find($val){
    $current = $this->head;
    while($current != null){
      if($current->value == $val){
          return $current;
      }
      $current = $current->next;
    }
    return false;
  }

  public function insert($valAfter, $newVal){
    $current = $this->head;
    while($current != null){
      if($current->value == $valAfter){
        $temp = $current->next;
        $current->next = new Node($newVal);
        $current->next->next = $temp;
        return $this;
      }
      $current = $current->next;
    }
    $current = new Node($newVal);
    return $this;
  }

  public function isEmpty(){
    if($this->head == null){
      return true;
    }
    else{
      return false;
    }
  }

  public function printValues(){
    $listData = array();
    $current = $this->head;
    while($current){
      array_push($listData, $current->value);
      $current = $current->next;
    }
    echo "array = ";
    foreach($listData as $v){
      echo $v." ";
    }
    echo "<br>";
    print_r($listData);
  }

  // public function reverse(){
  //   $previous = null;
  //   $current = $this->head;
  //   $next = null;
  //   while($current){
  //     $next = $current->next;
  //     $current->next = $previous;
  //     $previous = $current;
  //     $current = $next;
  //   }
  //   $this->head = $previous;
  //   return $this;
  // }

  public function recursiveReverse1($current, $previous){
    if($current == null){
      return $this;
    }
    if($current->next == null){
      $this->head = $current;
      $current->next = $previous;
      return $this;
    }
    $next1 = $current->next;
    $current->next = $previous;
    $this->recursiveReverse1($next1, $current);
    return $this;
  }

  public function recursiveReverse2($current){
    if($current == null){
      return $current;
    }
    if($current->next == null){
      return $current;
    }
    $tail = $current;
    $attachTo = $current->next;
    $current = $this->recursiveReverse2($current->next);
    $attachTo->next = $tail;
    $tail->next = null;
    return $current;
  }
}

$newList = new SinglyLinkedList();
echo "<h3>Create a singly linked list and add some numbers to it</h3>";
$newList->add(1)->add(2)->add(3)->add(4)->add(5)->printValues();
var_dump($newList);

// echo "<br><h3>Remove some elements stored in linked list</h3>";
// $newList->remove(1)->remove(3)->remove(5)->printValues();
// var_dump($newList);

echo "<br><h3>reverse1 linked list</h3>";
// $newList->reverse()->printValues();
$newList->recursiveReverse1($newList->head, null)->printValues();
var_dump($newList);

echo "<br><h3>reverse2 linked list</h3>";
$newList->recursiveReverse2($newList->head);
$newList->printValues();
var_dump($newList);
// echo "<br>Try to remove a value that is not stored in the linked list";
// $newList->remove(15)->printValues();
// var_dump($newList->remove(2));
// var_dump($newList->remove(15));

// echo "<br><h3>Add more elements to the linked list</h3>";
// $newList->add(6)->add(7)->add(8)->printValues();
// $newList->find(4);
// var_dump($newList->find(4));
// var_dump($newList->find(7));
// var_dump($newList->find(10));

// echo "<br><h3>Test for insert()</h3>";
// echo "Insert 10 after value 6 and 8<br>";
// $newList->insert(6, 10)->insert(8, 10)->printValues();
//
// echo "<br><h3>Test for isEmpty()</h3>";
// var_dump($newList->isEmpty());
// $newList2 = new SinglyLinkedList();
// var_dump($newList2->isEmpty());
//
// echo "<br><h3>Test for removeDups()</h3>";
// echo "After adding some values to \$newList---";
// $newList->add(6)->add(7)->add(8)->add(8)->add(8)->printValues();
// echo "After removing duplicated values of 8 from \$newList---";
// $newList->removeDups(8)->printValues();
// echo "After adding five 2s to \$newList2---";
// $newList2->add(2)->add(2)->add(2)->add(2)->add(2)->printValues();
// echo "After removing duplicated values of 2 from \$newList2---";
// $newList2->removeDups(2)->printValues();
?>
