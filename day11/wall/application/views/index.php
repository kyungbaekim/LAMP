<?php
  // var_dump($this->session->all_userdata());
?>
<html>
<head>
  <title>Welcome to the Wall</title>
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
    p{
      color: red;
      font-size: 12px;
      line-height: 80%;
    }
    .text{
      color: black;
      font-size: 16px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='quote'>
      <h2>Welcome to the WALL(MVC)</h2>
      <?php
        if(isset($errors)){
          echo $errors;
        }
        echo "<br>";
      ?>
      <div class='form'>
        <form action='/walls/register' method='post'>
          <p class='text'>Your first name: <input type="text" name="first_name"></p>
          <p class='text'>Your last name: <input type="text" name="last_name"></p>
          <p class='text'>Your email: <input type="text" name="email"></p>
          <p class='text'>Your password: <input type="password" name="password1"></p>
          <p class='text'>Confirm your password: <input type="password" name="password2"></p>
          <input type="submit" value="Register!">
        </form><br><hr><br>
        <form action='/walls/login' method='post'>
          <p class='text'>Your email: <input type="text" name="email"></p>
          <p class='text'>Your password: <input type="password" name="password"></p>
          <input type="submit" value="Log In!">
        </form><br><hr><br>
        <a href="/walls/reset_session"><button>CLEAR SESSION</button></a>
      </div>
    </div>
  </div>
</body>
</html>
