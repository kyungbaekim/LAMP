<?php
  $states = array('CA', 'WA', 'VA', 'UT', 'AZ');
  echo "<h3>Drop-down menu with 5 states and for loop!</h3>";
  echo "<select>";
  for($i=0; $i<count($states); $i++){
    echo "<option value='$states[$i]'>$states[$i]</option>";
  }
  echo "</select><br>";

  echo "<h3>Drop-down menu with 5 states and foreach loop!</h3>";
  echo "<select>";
  foreach($states as $value){
    echo "<option value='$value'>$value</option>";
  }
  echo "</select>";

  echo "<h3>Drop-down menu with 8 states and foreach loop!</h3>";
  echo "<select>";
  foreach($states as $value){
    echo "<option value='$value'>$value</option>";
  }
  echo "</select>";
?>
