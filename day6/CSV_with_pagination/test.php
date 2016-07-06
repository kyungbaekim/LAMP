<?php
  ini_set('auto_detect_line_endings', true);
  $myfile = fopen("US-500.csv", "r") or die("Unable to open file!");
  while(!feof($myfile)) {
    $name = fgetcsv($myfile);
    if (is_array($name)) {
      foreach($name as $key=>$value){
        echo $key.": ".$value."<br>";
      }
      echo "<br>";
    }
  }
  fclose($myfile);
?>
