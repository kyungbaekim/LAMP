<?php
  if($this->session->flashdata('duplicate')){
    if($this->session->flashdata('duplicate') == true){
      echo "<script type='text/javascript'>alert('The email address you entered already exists. Please try again with different email account!');</script>";
    }
  }
  if($this->session->flashdata('registered')){
    if($this->session->flashdata('registered') == true){
      echo "<script type='text/javascript'>alert('You are successfully registered. Please log in!');</script>";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <style>
    .wrapper{
      /*display: flex;
      align-items: center;
      justify-content: center;*/
      margin: 20px auto;
      /*border: 1px solid grey;*/
    }
    fieldset{
      margin: 20px auto;
      width: 500px;
      border: 2px groove;
    }
    td{
      padding: 2px 0px;
    }
    form{
      width: 350px;
      margin: 20px auto;
    }
    .notice, .error{
      color: red;
      font-size: 12px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <fieldset>
      <legend><h3>Log In</h3></legend>
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
    </fieldset>
    <fieldset>
      <legend><h3>Or Register</h3></legend>
      <?php
        if(isset($register_errors)){
          echo $register_errors;
          echo "<br>";
        }
      ?>
      <form action='/register' method='post'>
        <table>
          <tr>
            <td width>First Name:</td>
            <td><input type='text' name='fname'>
          </tr>
          <tr>
            <td>Last Name:</td>
            <td><input type='text' name='lname'>
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
            <td>Confirm Password:</td>
            <td><input type='password' name='password2'>
          </tr>
          <tr><td align='right' colspan='2'><input type='submit' value='Register'></tr>
          <tr><td align='right' colspan='2'></tr>
        </table>
      </form>
    </fieldset>
  </div>
</body>
</html>
