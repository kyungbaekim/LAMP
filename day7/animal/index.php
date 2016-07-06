<?php
  class Animal{
    public $name;
    public $health;

    public function __construct($str, $h){
      $this->name = $str;
      $this->health = $h;
    }

    public function walk(){
      $this->health -= 1;
      return $this;
    }

    public function run(){
      $this->health -= 5;
      return $this;
    }

    public function displayHealth(){
      echo $this->name."<br>";
      echo $this->health."<br>";
    }
  }

  $animal1 = new Animal('animal', 100);
  $animal1->walk()->walk()->walk()->run()->run()->displayHealth();
  echo "<br>";

  class Dog extends Animal{
    public function pet(){
      $this->health += 5;
      return $this;
    }
  }

  $animal2 = new Dog('test', 150);
  $animal2->walk()->walk()->walk()->run()->run()->pet()->displayHealth();
  echo "<br>";

  class Dragon extends Animal{
    public $message = '';
    public function fly(){
      $this->health -= 10;
      return $this;
    }

    public function displayHealth(){
      $this->message = "This is a dragon!<br>";
      echo $this->message;
      parent::displayHealth();
    }
  }

  $animal3 = new Dragon('dragon', 170);
  $animal3->walk()->walk()->walk()->run()->run()->fly()->fly()->displayHealth();
  echo "<br>";
?>
