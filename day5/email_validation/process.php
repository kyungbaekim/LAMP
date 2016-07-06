<?php
  session_start();
  include_once('db_connection.php');
  $error = '';
  var_dump($_POST);

  if($_POST['action'] == 'add'){
    if(empty($_POST['email'])){
      $error = "Email field cannot be blank";
    }
    else {
      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $error = "You entered invalid email address.";
      }
    }
    if($error != ''){
      $_SESSION['error'] = $error;
      header("Location:fail.php");
    }
    else{
      $_SESSION['email'] = $_POST['email'];
      $query = "INSERT INTO email (email, created_at) VALUES('{$_POST['email']}', NOW())";
      if(run_mysql_query($query)){
        header("Location:success.php");
      }
      else{
        die("DB update was failed!");
      }
    }
  }
  elseif($_POST['action'] == 'delete') {
    $query = "DELETE FROM email WHERE id = {$_POST['id']}";
    if(!run_mysql_query($query)){
      header("Location:success.php");
    }
    else{
      die("DB update was failed!");
    }
  }
?>
