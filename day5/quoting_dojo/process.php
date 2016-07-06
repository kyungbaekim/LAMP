<?php
  session_start();
  include_once('db_connection.php');
  $error = array();
  var_dump($_POST);

  // Checking for empty form data
  if(empty($_POST['name'])){
    $error[] = "Your name field cannot be blank";
  }
  if(empty($_POST['quote'])){
    $error[] = "Your quote field cannot be blank";
  }

  // If there's no empty form data, add to database and redirect to main.php
  if(!empty($error)){
    $_SESSION['error'] = $error;
    header("Location:error.php");
  }
  else{
    $query = "INSERT INTO quotes (name, quote, created_at) VALUES('{$_POST['name']}', '{$_POST['quote']}', NOW())";
    if(run_mysql_query($query)){
      header("Location:main.php");
    }
    else{
      die("DB update was failed!");
    }
  }
?>
