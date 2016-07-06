<?php
  // var_dump($this->session->all_userdata());
  // var_dump($this->session->flashdata('registered'));
  if($this->session->flashdata('registered')){
    if($this->session->flashdata('registered') == true){
      echo "<script type='text/javascript'>alert('You are successfully registered. Please log in and enjoy our books and reviews!');</script>";
    }
  }
?>
<html>
<head>
  <title>Welcome!</title>
  <style>
    .wrapper{
      width: 640;
      /*display: flex;
      align-items: center;
      justify-content: center;*/
      margin: 20px auto;
      /*border: 1px solid grey;*/
    }
    .register, .login{
      display: inline-block;
      width: 280px;
      margin-left: 10px;
      padding: 10px;
      border: 1px solid silver;
      vertical-align: top;
    }
    h3{
      margin-top: 0px;
    }
    td{
      padding: 2px 0px;
    }
    form{
      margin: 0px;
    }
    .notice, .error{
      color: red;
      font-size: 12px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <h2>&nbsp;&nbsp;Welcome!</h2>
    <div class='register'>
      <h3>Register</h3>
      <?php
        if(isset($register_errors)){
          echo $register_errors;
          echo "<br>";
        }
      ?>
      <form action='/register' method='post'>
        <table>
          <tr>
            <td width=100>Name:</td>
            <td><input type='text' name='name'>
          </tr>
          <tr>
            <td>Alias:</td>
            <td><input type='text' name='alias'>
          </tr>
          <tr>
            <td>Email:</td>
            <td><input type='text' name='email'>
          </tr>
          <tr>
            <td>Password:</td>
            <td><input type='password' name='password1'>
          </tr>
          <tr>
            <td class='notice' colspan='2' valign='top'>*Password should be at leat 8 characters</td>
          </tr>
          <tr>
            <td>Confirm PW:</td>
            <td><input type='password' name='password2'>
          </tr>
          <tr><td align='right' colspan='2'><input type='submit' value='Register'></tr>
          <tr><td align='right' colspan='2'></tr>
        </table>
      </form>
    </div>
    <div class='login'>
      <h3>Login</h3>
      <?php
        if(isset($login_errors)){
          echo $login_errors;
          echo "<br>";
        }
      ?>
      <form action='/login' method='post'>
        <table>
          <tr>
            <td width=100>Email:</td>
            <td><input type='text' name='email'>
          </tr>
          <tr>
            <td>Password:</td>
            <td><input type='password' name='password'>
          </tr>
          <tr><td align='right' colspan='2'><input type='submit' value='Login'>&emsp;<a href='/clear'>Clear session</a></td></tr>
        </table>
      </form>
    </div>
  </div>
</body>
</html>
