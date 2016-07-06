<?php
  function print_lists($arr){
    echo "<ul>";
    for($i=0; $i<count($arr); $i++){
      echo "<li>" .$arr[$i] ."</li>";
    }
    echo "</ul>";
  }
  $A = array(2,3,'hello');
  $B = array(1,5,7,'KB');
  print_lists($A);
  print_lists($B);
?>
