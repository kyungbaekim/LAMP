<?php
  session_start();
  // var_dump($_SESSION);
  if(isset($_SESSION) && !empty($_SESSION['user_id'])){
    header('Location:main.php');
  }
?>

<html>
<head>
  <title>Quoting Dojo</title>
  <style>
    .wrapper{
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .quote{
      width: 500px;
      height: 580px;
      border: 2px solid black;
      margin: 0px auto;
      text-align: center;
    }
    .form{
      text-align: right;
      margin: 20px;
    }
    h2{
      margin: 20px 10px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='quote'>
      <h2>Welcome to the WALL</h2>
      <div class='form'>
        <form action='process.php' method='post'>
          <input type="hidden" name="action" value="register">
          <p>Your first name: <input type="text" name="first_name"></p>
          <p>Your last name: <input type="text" name="last_name"></p>
          <p>Your email: <input type="text" name="email"></p>
          <p>Your password: <input type="password" name="password1"></p>
          <p>Confirm your password: <input type="password" name="password2"></p>
          <input type="submit" value="Register!">
        </form><br><hr><br>
        <form action='process.php' method='post'>
          <input type="hidden" name="action" value="login">
          <p>Your email: <input type="text" name="email"></p>
          <p>Your password: <input type="password" name="password"></p>
          <input type="submit" value="Log In!">
        </form><br><hr><br>
        <form action='process.php' method='post'>
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
  </div>
</body>
</html>
