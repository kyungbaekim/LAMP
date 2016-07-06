<?php
  session_start();
  if(!isset($_SESSION['num'])){
    $_SESSION['num'] = rand(1, 100);
  }
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
    </style>
  </head>
  <body>
    <div class='wrapper'>
      <h1>Welcome to the Great Number Game!</h1>
      <h2>I am thinking of a number between 1 and 100</h2>
      <h2>Take a guess</h2>
      <form action="process.php" method="post">
        <p><input type="text" name="guess"></p>
        <input type="submit" value="Submit">
      </form>
    </div>
  </body>
</html>
