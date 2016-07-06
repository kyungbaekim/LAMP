<?php
  session_start();
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  } else {
    $page = 1;
  }
  // var_dump($_SESSION);
  ini_set('auto_detect_line_endings', true);
  $target = $_SESSION['file'];
  $myfile = fopen("$target", "r") or die("Unable to open file!");

  // Get the count of csv data in the given file
  $count = 0;
  if(file_exists($target)){
    $name = fgetcsv($myfile);
    while(!feof($myfile)){
      $name = fgetcsv($myfile);
      if(is_array($name)){
        $count++;
      }
    }
    // echo "Count of CSV data in attached file: ".$count;
  }

  $_SESSION['total_pages'] = ceil($count / 50);
  fclose($myfile);

  $myfile = fopen("$target", "r") or die("Unable to open file!");
  if(file_exists($target)){
    echo "<div class='wrapper'>";
    $data = fgetcsv($myfile);
    echo "<h1>Here is your CSV data!!!</h1>";
    echo "<div class='data'><table align='center'><thead><th>count</th>";
    foreach($data as $value){
      echo "<th>".$value."</th>";
    }
    echo "</thead>";

    // Display 50 data per page
    for($j=1; $j<=($page-1)*50; $j++){
      $data = fgetcsv($myfile);
    }
    for($i=(($page-1)*50)+1; $i<=$page*50; $i++){
      $data = fgetcsv($myfile);
      if(is_array($data)){
        echo "<tr><td>".$i."</td>";
        echo "<td>".$data['0']."</td>";
        echo "<td>".$data['1']."</td>";
        echo "<td>".$data['2']."</td>";
        echo "<td>".$data['3']."</td>";
        echo "<td>".$data['4']."</td>";
        echo "<td>".$data['5']."</td>";
        echo "<td>".$data['6']."</td>";
        echo "<td>".$data['7']."</td>";
        echo "<td>".$data['8']."</td>";
        echo "<td>".$data['9']."</td>";
        echo "<td>".$data['10']."</td>";
        echo "<td>".$data['11']."</td>";
      }
      echo "</tr>";
    }
    echo "</table></div>";
    echo "<table align='center'><tr><td><ul>";
      for($i=1; $i<=$_SESSION['total_pages']; $i++){
        echo "<li><a href='csv.php?page=".$i."'>".$i."</a></li>";
      }
    echo "</ul></td></tr></table>";
  }
  echo "</div>";
  fclose($myfile);
?>
<html lang="en">
   <head>
      <title>CSV with pagination</title>
      <style type="text/css">
        .wrapper{
          width: 100%;
          text-align: center;
          margin: 0px auto;
        }
        .data td, .data th{
          border: 1px solid black;
          padding: 5px;
          white-space: nowrap;
        }
        th{
          text-align: center;
        }
        li{
          padding: 20px 10px 2px 10px;
          color: grey;
          display: inline-block;
        }
      </style>
   </head>
   <body>
   </body>
</html>
