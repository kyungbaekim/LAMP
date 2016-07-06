<?php
  function sortedArray($arr){
    for($i=0; $i<count($arr)-1; $i++){
      $minIndex = $i;
      for($j=$i+1; $j<count($arr); $j++){
        if($arr[$j] < $arr[$minIndex]){
          $minIndex = $j;
        }
      }
      if($minIndex != $i){
        $temp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
      }
    }
    // for($k=0; $k<count($arr); $k++){
    //   echo $arr[$k]."<br>";
    // }
    return $arr;
  }

  // $x = [33, 11, 8, 2, 7, 0, 52, 99, 5];
  // $y = [33, 11, 8, 2, 7];
  // $z = [33, 11, 8, 2, 0, 77, 52];
  // echo sortedArray($x)."<br><br>";
  // echo sortedArray($y)."<br><br>";
  // echo sortedArray($z);

  function randArray(){
    $x = array();
    for($i=0; $i<10000; $i++){
      // $rand = rand(0, 10000);
      array_push($x, rand(0, 100000));
    }
    return $x;
  }

  $x = randArray();
  // var_dump($x);

  $start = microtime(true);
  echo sortedArray($x);
  // var_dump(sortedArray($x));
  $end = microtime(true);
  $time = $end - $start;
  echo $time;
?>
