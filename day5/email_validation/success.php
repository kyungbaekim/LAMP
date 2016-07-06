<?php
  session_start();
  include_once('db_connection.php');
?>
<html>
<head>
  <title>Email Validation failed!!!</title>
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
    .display_data{
      width: 450px;
      height: 500px;
      margin: 0px auto;
      text-align: left;
    }
    button{
      width: 120px;
      height: 30px;
    }
    h2{
      text-decoration: underline;
    }
    h3{
      margin: 40px 10px;
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
    <div class='success'>
      <h3>The email address you entered <?= $_SESSION['email'] ?> is a valid email address! Thank you!</h3>
    </div>
    <div class='display_data'>
      <h2>Email Addresses Entered:</h2>
      <table>
          <?php
          $query = "SELECT * FROM email";
          $results = fetch_all($query);
          foreach($results as $row){
            echo "<tr height=40>";
            echo "<td width=200;>".$row['email']."</td>";
            echo "<td width=150>".$row['created_at']."</td>";
            echo "<td><form action='process.php' method='post'>";
            echo "<input type='hidden' name='action' value='delete'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<input class='delete' type='submit' value='delete'>";
            echo "</form></td>";
            echo "</tr>";
          }
          ?>
      </table><br>
      <button><a href="index.php">Back to home!</a></button>
    </div>
  </div>
</body>
</html>
