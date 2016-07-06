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
        <b>TEST APP</b>&emsp;<a href="/main/dashboard">Dashboard</a>&emsp;<a href="/main">Profile</a>
      </div>
      <div class='signin'>
        <?php
          if(!$this->session->userdata['user_id']){
            echo "<a href='/main/signin'>Sign in</a>";
          }
          else{
            echo "<a href='/main/signoff'>Log off</a>";
          }
        ?>
      </div>
    </div>
    <hr>
    <div class='body'>
      <div class='form'>
        <h2>Add a new user</h2>
        <?php
          if(isset($errors)){
            echo $errors;
          }
        ?>
        <form action="/main/register_process" method="post">
          <p>Email address:<br>
          <input type="text" name='email'></p>
          <p>First name:<br>
          <input type="text" name='fname'></p>
          <p>Last name:<br>
          <input type="text" name='lname'></p>
          <p>Password:<br>
          <input type="password" name='password1'></p>
          <p>Password Confirmation:<br>
          <input type="password" name='password2'></p>
          <p>Description:<br>
          <textarea name="description" rows="10" cols="100"></textarea></p>
          <input type="submit" value="Create">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
