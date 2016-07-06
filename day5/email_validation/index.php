<?php
  session_start();
  // var_dump($_SESSION);
?>

<html>
<head>
  <title>Email Validation with DB</title>
  <style>
    .wrapper{
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .email{
      width: 300px;
      height: 140px;
      border: 2px solid black;
      margin: 0px auto;
      text-align: center;
    }
    h2{
      margin: 20px 10px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='email'>
      <h2>Please enter your email address to register!!</h2>
      <form action='process.php' method='post'>
        <input type="hidden" name="action" value="add">
        <input type="text" name="email">
        <input type="submit" value="SEND!">
      </form><br><br>
      <form action='index.php' method='post'>
        <input type="hidden" name="action" value="reset">
        <input type="submit" value="CLEAR SESSION!">
      </form>
      <?php
      if(isset($_POST['action']) && $_POST['action'] == 'reset'){
        $_SESSION = array();
      }
      ?>
    </div>
  </div>
</body>
</html>
