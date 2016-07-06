<?php
  function randScore(){
    $score = rand(50,100);
    return $score;
  }

  for($i=0; $i<100; $i++){
    $score = randScore();
    echo "<h1>" .$score. "/100</h1>";
    echo "<h2>Your grade is ";
    if($score < 70){
      echo "D";
    }
    else if($score >= 70 && $score < 80){
      echo "C";
    }
    else if($score >= 80 && $score < 90){
      echo "B";
    }
    else {
      echo "A";
    }
    echo "</h2>";
  }
?>
