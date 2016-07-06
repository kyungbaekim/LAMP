<?php
  function draw_stars($arr){
    for($i=0; $i<count($arr); $i++){
      if(is_numeric($arr[$i])){
        for($j=0; $j<$arr[$i]; $j++){
          echo "*";
        }
        echo "<br>";
      }
      else{
        // echo "Not number<br>";
        $firstCharacter = substr(strtolower($arr[$i]), 0, 1);
        for($j=0; $j<strlen($arr[$i]); $j++){
          echo $firstCharacter;
        }
        echo "<br>";
      }
    }
  }
  echo "<h2>Part 1</h2>";
  $x = array(4, 6, 1, 3, 5, 7, 25);
  draw_stars($x);
  echo "<br>";

  echo "<h2>Part 2</h2>";
  $x = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
  draw_stars($x);
 ?>
