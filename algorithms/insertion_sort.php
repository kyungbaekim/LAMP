<?php
  function insertion_sort($arr){
    var_dump($arr);
    for($i=0; $i<count($arr); $i++){
      $j = 0;
      $sorted = true;
      while($j < $i){
        if($arr[$j] > $arr[$i]){
          $sorted = false;
          break;
        }
        else{
          $j++;
        }
      }
      // echo $arr[$i]."=> i:".$i.", j:".$j;
      // echo "<br>";
      if($sorted == false && $j !== $i){
        for($k=$i; $k>$j; $k--){
          $temp = $arr[$k];
          $arr[$k] = $arr[$k - 1];
          $arr[$k - 1] = $temp;
        }
        // var_dump($arr);
      }
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
  // var_dump($arr2);
  // insertion_sort($arr1);
  insertion_sort($arr2);
?>
