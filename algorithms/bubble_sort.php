<?php
  function bubble_sort($arr){
    var_dump($arr);
    $end_index = count($arr)-1;
    while(!($end_index < 1)){
      for($i=0; $i<$end_index; $i++){
        if($arr[$i] > $arr[$i + 1]){
          $temp = $arr[$i];
          $arr[$i] = $arr[$i + 1];
          $arr[$i + 1] = $temp;
        }
      }
      $end_index--;
    }
    var_dump($arr);
  }

  function getRandomNumbers($min, $max, $total) {
    $arr = [];
    $i = 0;
    while($i < $total){
      $arr[] = rand($min, $max);
      $i++;
    }
    return $arr;
  }

  $arr1 = [6, 5, 3, 1, 8, 7, 2, 4];
  $arr2 = getRandomNumbers(0, 10000, 100);
  var_dump($arr2);
  // bubble_sort($arr1);
  bubble_sort($arr2);
?>
