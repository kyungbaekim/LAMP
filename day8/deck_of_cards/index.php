<?php
  class Deck{
    public $deck = array();
    public $card;

    public function __construct(){
      $cards = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'j', 'q', 'k');
      $suits = array('c', 'd', 'h', 's');
      for($i=0; $i<count($suits); $i++){
        for($j=0; $j<count($cards); $j++){
          $this->deck[] = $suits[$i].$cards[$j];
        }
      }
    }

    // shuffle the deck created by the constructor
    public function shuffle(){
      shuffle($this->deck);
      return $this;
    }

    // reset the deck
    public function reset(){
      $this->deck = array();
      $this->__construct();
      return $this;
    }

    // draw a card from back of the deck
    public function deal_card(){
      $this->card = array_pop($this->deck);
      // var_dump($this->card);
      // return $this;
      return $this;
    }
  }

  // Class for player
  class Player{
    public $name;
    public $hand = array();

    public function __construct($name){
      $this->name = $name;
    }

    public function draw($deck){
      $temp = $deck->deal_card();
      // var_dump($deck);
      $this->hand[] = $temp->card;
      echo "<br>Your card(s) in hand!!!<br>";
      for($i=0; $i<count($this->hand); $i++){
        echo "<img src='cards-png/".$this->hand[$i].".png' width='71' height='96' hspace='5' vspace='5'>";
      }
      echo "<br>";
      return $this;
    }

    public function discard(){
      $this->hand = array();
      return $this;
    }
  }

  // Create a deck and suffle it
  $obj = new Deck();
  // var_dump($obj);
  $obj->shuffle();
  var_dump($obj);
  // $obj->deal_card();
  // var_dump($obj);
  // $obj->reset();
  // var_dump($obj);

  // Create a player and draw some cards
  echo "<br>This is for the player's infomation!!!<br>";
  $player1 = new Player('KB');
  // $player1->draw($obj);
  // var_dump($player1);
  // $player1->discard();
  var_dump($player1);
  // $player1->draw($obj)->discard()->draw($obj)->discard()->draw($obj);
  $player1->draw($obj)->draw($obj)->draw($obj);
  var_dump($obj);
  var_dump($player1);
  $player1->discard();
  var_dump($player1);
?>
