<?php
  session_start();
  include_once('db_connection.php');
?>
<html>
<head>
  <title>Quoting Dojo</title>
  <style>
    .wrapper{
      width: 100%;
      height: 100%;
      text-align: center;
      margin-top: 50px;
    }
    .success{
      width: 450px;
      height: 120px;
      background-color: green;
      border: 2px solid black;
      margin: 0px auto;
      text-align: center;
    }
    .quotes{
      width: 700px;
      margin: 0px auto;
      text-align: left;
    }
    button{
      width: 120px;
      height: 30px;
    }
    .a{
      text-decoration: none;
    }
    .delete{
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class='wrapper'>
    <div class='title'>
      <h1>Here are the awesome quotes!!!</h1><br><br>
    </div>
    <div class='quotes'>
      <table width=700>
          <?php
          $query = "SELECT * FROM quotes";
          $results = fetch_all($query);
          foreach($results as $row){
            echo "<tr><td width=700>";
            echo "<h3>\"".$row['quote']."\"</h3>";
            echo "</td></tr>";
            echo "<tr><td align='center'>";
            echo "-".$row['name']." at ".$row['created_at'];
            echo "\n<hr>";
            echo "</td></tr>";
          }
          ?>
      </table><br>
      <button><a href="index.php">Back to home!</a></button>
    </div>
  </div>
</body>
</html>
