<?php
  ini_set('auto_detect_line_endings', true);
  $myfile = fopen("us-500.csv", "r") or die("Unable to open file!");
  $keys = fgetcsv($myfile);
  // print_r($keys);
  $i = 1;
  while(!feof($myfile)) {
    $record = fgetcsv($myfile);
    if(!empty($record)) {
      echo "<h1>Record ".$i."</h1>";
      echo "<ul>";
      for($j=0; $j<count($keys); $j++){
        echo "<li>".$keys[$j].": ".$record[$j]."</li>";
      }
      echo "</ul>";
    }
    else{
      continue;
    }
    $i++;
  }
  fclose($myfile);
?>
