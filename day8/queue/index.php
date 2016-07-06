<?php
  class Node{
    public $value;
    public $next;
    public function __construct($val){
    $this->value = $val;
    $this->next = null;
    }
  }

  class Queue{
    private $front; // the front of our Queue
    private $rear; // the rear of our Queue
    public $maxSize; // how many elements can be in our queue

    public function __construct($val){
      $this->front = null;
      $this->rear = null;
      $this->maxSize = $val;
    }
    public function enqueue($val){ // it will add an element to the end of the Queue
      if($this->front == null){
        $this->front = new Node($val);
        $this->rear = $this->front;
        return $this;
      }
      else{
        if(!$this->isFull()){
          $current = $this->front;
          while($current->next){
            $current = $current->next;
          }
          $current->next = new Node($val);
          $this->rear = $current->next;
          return $this;
        }
        else{
          echo "Your queue is full so cannot add any more!";
          return $this;
        }
      }
    }
    public function dequeue(){ // it will remove an element from the front of the Queue
      if($this->front == null){
        echo "Current queue is empty. Nothing to dequeue!";
        return null;
      }
      else{
        $current = $this->front;
        echo $current->value;
        $this->front = $current->next;
        return $this;
      }
    }
    public function front(){ // returns the element in the front of your Queue
      echo $this->front->value;
    }
    public function rear(){ // returns the element in the rear of your Queue
      echo $this->rear->value;
    }
    public function isEmpty(){ // returns true if the Queue is empty
      if($this->front == null){
        echo "Queue is empty!<br>";
        return true;
      }
      else{
        echo "Queue is not empty!<br>";
        return false;
      }
    }
    public function isFull(){ // returns true if the Queue is full
      $current = $this->front;
      $i = 0;
      while($current){
        $current = $current->next;
        $i++;
      }
      if($i == $this->maxSize){
        echo "Queue is full!<br>";
        return true;
      }
      else{
        echo "Queue is not full. The size of queue is: ".$i."<br>";
        return false;
      }
    }
  }
  $q = new Queue(5); // instantiates the Queue class with a maxSize attribute of 5
  $q->isEmpty(); // returns true
  $q->enqueue(10000); // Queue: 100
  $q->enqueue(1000); // Queue: 10
  $q->enqueue(100); // Queue: 1
  $q->isEmpty(); // returns false

  // echo '<pre>';
  // print_r($q);
  // echo '</pre>';
  // echo "the value of rear: ";
  // echo $q->rear()."<br>";
  // echo "the value of front: ";
  // echo $q->front()."<br>";
  // $q->isFull(); // returns false
  // $q->enqueue(10); // Queue: 10
  // $q->enqueue(1); // Queue: 1
  // echo '<pre>';
  // print_r($q);
  // echo '</pre>';
  // $q->isFull(); // returns true
  // $q->enqueue(0); // Queue: 1

  $q1 = new Queue(5); // instantiates the Queue class with a maxSize attribute of 5
  $q1->isEmpty(); // returns true
  $q1->enqueue(100); // Queue: 100
  $q1->rear(); // returns 100
  echo "<br>";
  $q1->front(); // returns 100
  echo "<br>";
  $q1->enqueue(20); // Queue: 100, 20
  $q1->enqueue(2); // Queue: 100, 20, 2
  $q1->dequeue(); // Queue: 20, 2
  echo "<br>";
  $q1->enqueue(500); // Queue: 20, 2, 500
  $q1->enqueue(12); // Queue: 20, 2, 500, 12
  $q1->enqueue(30); // Queue: 20, 2, 500, 12, 30
  $q1->isFull(); // returns true
  echo '<pre>';
  print_r($q1);
  echo '</pre>';
?>
