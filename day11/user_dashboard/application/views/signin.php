<?php
  // var_dump($this->session->all_userdata());
?>
<html>
<head>
  <title>Home Page</title>
  <style>
    .wrapper{
      width: 1000px;
      height: 100%;
      margin: 0px auto;
    }
    .top{
      width: 1000px;
    }
    .home, .signin{
      display: inline-block;
    }
    .home{
      width: 800px;
    }
    .signin{
      width: 190px;
      text-align: right;
    }
    .form{
      padding: 20px;
    }
    a{
      text-decoration: none;
    }
    h2{
      padding: 0px;
      margin: 0px;
    }
    p {
      padding: 0px;
      margin-top: 10px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='home'>
        <b>TEST APP</b>&emsp;<a href="/">Home</a>
      </div>
      <div class='signin'>
        <?php
          if(!$this->session->userdata['user_id']){
            echo "<a href='/signin'>Sign in</a>";
          }
          else{
            echo "<a href='/reset_session'>Log off</a>";
          }
        ?>
      </div>
    </div>
    <hr>
    <div class='body'>
      <div class='form'>
        <h2>Sign in</h2>
        <form action="/main/signin_process" method="post">
          <p>Email address:<br>
          <input type="text" name='email'></p>
          <p>Password:<br>
          <input type="password" name='password'></p>
          <input type="submit" value="Sign in">
        </form>
        <a href="/register">Don't have an account? Register</a>
      </div>
    </div>
  </div>
</body>
</html>
