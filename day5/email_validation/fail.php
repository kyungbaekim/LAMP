<?php
  session_start();
?>

<html>
<head>
  <title>Email Validation failed!!!</title>
  <style>
    .wrapper{
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .fail{
      width: 300px;
      height: 300px;
      background-color: red;
      border: 2px solid black;
      margin: 0px auto;
      text-align: center;
    }
    button{
      width: 120px;
      height: 30px;
      font-size: 24px;
    }
    a{
      text-decoration: none;
    }
    h3{
      margin: 60px 10px;
    }
  </style>
</head>
<body>
  <div class='wrapper'>
    <div class='fail'>
      <h3><?= $_SESSION['error'] ?><br>Please go back and enter your email address again.</h3>
      <button><a href="index.php">Go back</a></button>
    </div>
  </div>
</body>
</html>
