<?php
  var_dump($this->session->all_userdata());
?>
<html>
<head>
  <title>Register/Add new user</title>
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
        <?php
          if($this->session->userdata['user_id'] && $this->session->userdata['user_level'] == 9){
            echo "<b>TEST APP</b>&emsp;<a href='/dashboard'>Dashboard</a>&emsp;<a href='/main'>Profile</a>";
          }
          else{
            echo "<b>TEST APP</b>&emsp;<a href='/'>Home</a>";
          }
        ?>
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
        <?php
          if($this->session->userdata['user_id'] && $this->session->userdata['user_level'] == 9){
            echo "<h2>Add a new user</h2>";
          }
          else{
            echo "<h2>Register</h2>";
          }
        ?>
        <?php
          if(isset($errors)){
            echo $errors;
          }
        ?>
        <form action="/register_process" method="post">
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
          <?php
            if($this->session->userdata['user_id'] && $this->session->userdata['user_level'] == 9){
              echo "<input type='submit' value='Create'>";
            }
            else{
              echo "<input type='submit' value='Register'>";
            }
          ?>
        </form>
        <br>
        <?php
          if($this->session->userdata['user_id'] && $this->session->userdata['user_level'] != 9){
            echo "<a href='/main/signin'>Already have an account? Login</a>";
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
