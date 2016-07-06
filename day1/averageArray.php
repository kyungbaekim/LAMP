<?php
  $arr = array(1, 2, 5, 10, 255, 3);
  $ave = 0;
  for($i=0; $i<count($arr); $i++){
    $ave += $arr[$i];
  }
  echo $ave/count($arr);
?>
