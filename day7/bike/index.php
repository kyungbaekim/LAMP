<?php
  class Bike{
    public $price;
    public $max_speed;
    public $miles;

    public function __construct($p, $s){
      $this->price = $p;
      $this->max_speed = $s;
      $this->miles = 0;
    }

    public function displayInfo(){
      echo "The price of bike is $".$this->price.".<br>";
      echo "The maximum speed is ".$this->max_speed." mph.<br>";
      echo "The total miles driven on the bike is ".$this->miles." mile(s)<br>";
    }

    public function drive(){
      echo "Driving<br>";
      $this->miles += 10;
    }

    public function reverse(){
      echo "Reversing<br>";
      $this->miles -= 5;
    }
  }

  $obj = new Bike(1000, 10);
  $obj->drive();
  $obj->drive();
  $obj->drive();
  $obj->reverse();
  echo $obj->displayInfo();

  $obj2 = new Bike(10, 10);
  $obj2->drive();
  $obj2->drive();
  $obj2->reverse();
  $obj2->reverse();
  echo $obj2->displayInfo();

  $obj3 = new Bike(100, 100);
  $obj3->reverse();
  $obj3->reverse();
  $obj3->reverse();
  echo $obj3->displayInfo();
?>
