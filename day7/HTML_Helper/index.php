<?php
  class HTML_Helper{
    public function print_table($arr){
      echo "<table><thead>";
      foreach($arr as $key=>$value){
        echo "<th>$key</th>";
      }
      echo "</thead><tr>";
      foreach($arr as $key=>$value){
        echo "<td>$value</td>";
      }
      echo "</tr></table>";
    }

    public function print_select($name, $arr){
      echo "<select name='".$name."'>";
      for($i=0; $i<count($arr); $i++){
        echo "<option value='".$arr[$i]."'>".$arr[$i]."</option>";
      }
      echo "</select>";
    }
  }

  $array1 = array("first_name" => "Michael", "last_name" => "Choi", "nick_name" => "Sensei");
  $array2 = array("full_name" => "Kyungbae Kim", "occupation" => "Student", "city" => "Seattle");
  $obj = new HTML_Helper();
  $obj->print_table($array1);
  echo "<br>";

  $obj2 = new HTML_Helper();
  $obj2->print_table($array2);
  echo "<br>";

  $sample_array = array("CA", "WA", "UT", "TX", "AZ", "NY");
  $obj3 = new HTML_Helper();
  $obj3->print_select('state', $sample_array);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HTML Helper</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  </body>
</html>
