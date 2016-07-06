<?php
  function get_max_and_min($arr){
    $min = $arr[0];
    $max = $arr[0];
    for($i=0; $i<count($arr); $i++){
      if($arr[$i] < $min){
        $min = $arr[$i];
      }
      else if($arr[$i] > $max){
        $max = $arr[$i];
      }
    }
    $result = array("max" => $max, "min" => $min);
    return $result;
  }
  $sample = array( 135, 2.4, 2.67, 1.23, 332, 2, 1.02);
  $output = get_max_and_min($sample);
  var_dump($output);
?>
