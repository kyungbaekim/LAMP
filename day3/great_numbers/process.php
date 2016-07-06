<?php
  session_start();
  var_dump($_SESSION['num']);
?>

<html>
  <head>
    <title>Great Number Game</title>
    <style type="text/css">
      .wrapper{
        text-align: center;
        width: 500px;
        height: 700px;
        margin: 0px auto;
      }
      .result{
        width: 500px;
        height: 300px;
      }
      .wrong, .right{
        width: 300px;
        height: 300px;
        margin: 0px auto;
        font-weight: bold;
        font-size: 26px;
      }
      .wrong{
        background-color: red;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .right{
        background-color: lightgreen;
      }
    </style>
  </head>
  <body>
    <div class='wrapper'>
      <h1>Welcome to the Great Number Game!</h1>
      <h2>I am thinking of a number between 1 and 100</h2>
      <h2>Take a guess</h2>
      <div class='result'>
        <?php
          if($_POST['guess'] == $_SESSION['num']){
            echo "<div class='right'><br><br><br><br>".$_POST['guess']." was the number!";
            echo "<br><br>";
            echo "<form action='great_numbers.php' method='post'>";
            echo "<input type='submit' value='Play again!'>";
            echo "</form></div>";
            $_SESSION = array();
          }
          else {
            if($_POST['guess'] > $_SESSION['num']){
              echo "<div class='wrong'>Too high!</div>";
            }
            else if($_POST['guess'] < $_SESSION['num']){
              echo "<div class='wrong'>Too low!</div>";
            }
            echo "<form action='process.php' method='post'>";
            echo "<p><input type='text' name='guess'></p>";
            echo "<input type='submit' value='Submit'>";
            echo "</form>";
          }
        ?>
      </div>
    </div>
  </body>
</html>
