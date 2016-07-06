<?php
  session_start();
?>

<html>
<head>
  <title>Welcom to the WALL</title>
  <style>
    .wrapper{
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .error{
      width: 400px;
      height: 300px;
      background-color: lightgrey;
      border: 2px solid black;
      margin: 0px auto;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
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
      margin: 10px 10px;
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class='wrapper'>
    <div class='error'>
      <div class='message'>
        <?php
          foreach($_SESSION['errors'] as $key=>$value){
            echo "<h3>".$value."</h3>\n";
          }
        ?><br>
        <a href="index.php"><input type="button" value="Go back" /></a>
      </div>
    </div>
  </div>
</body>
</html>
