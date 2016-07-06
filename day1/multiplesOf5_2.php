<?php
  function multiply($arr, $factor){
    for($i=0; $i<count($arr); $i++){
      $arr[$i] *= $factor;
      echo $arr[$i];
    }
    return $arr;
  }

  $A = array(2, 4, 10, 16);
  $B = multiply($A, 10);
  $C = multiply($A, 2);
  var_dump($B);
  var_dump($C);
?>
