<?php
  function head_tail(){
    $head_tail = rand(1,2);
    return $head_tail;
  }

  // echo head_tail();
  $head_count = 0;
  $tail_count = 0;
  echo "Starting the program<br>";
  for($i=1; $i<=5000; $i++){
    echo "Attempt #$i: Throwing a coin... It's a ";
    if (head_tail() == 1){
      echo "head! ";
      $head_count++;
      echo "... Got $head_count head(s) so far and $tail_count tail(s) so far<br>";
    }
    else {
      echo "tail! ";
      $tail_count++;
      echo "... Got $head_count head(s) so far and $tail_count tail(s) so far<br>";
    }
  }
  echo "Ending thet program - thank you!";
?>
