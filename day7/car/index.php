<?php
  class Car{
    public $price;
    public $speed;
    public $fuel;
    public $mileage;
    public $tax;

    public function __construct($p, $s, $f, $m){
      $this->price = $p;
      $this->speed = $s;
      $this->fuel = $f;
      $this->mileage = $m;
      if($p < 10000){
        $this->tax = 0.12;
      }
      else{
        $this->tax = 0.15;
      }
      echo $this->Display_all();
    }

    public function Display_all(){
      echo "Price: $".$this->price."<br>";
      echo "Speed: ".$this->speed."mph<br>";
      echo "Fuel: ".$this->fuel."<br>";
      echo "Mileage: ".$this->mileage."mpg<br>";
      echo "Tax: ".$this->tax."<br>";
    }
  }

  $obj1 = new Car(2000, 35, 'Full', 15);
  echo "<br>";

  $obj2 = new Car(2000, 5, 'Not Full', 105);
  echo "<br>";

  $obj3 = new Car(2000, 15, 'King of Full', 95);
  echo "<br>";

  $obj4 = new Car(2000, 25, 'Full', 25);
  echo "<br>";

  $obj5 = new Car(2000, 45, 'Empty', 25);
  echo "<br>";

  $obj6 = new Car(20000000, 35, 'Empty', 15);
?>
