<?php
  session_start();
  include_once('db_connection.php');
  $errors = array();
  var_dump($_POST);

  // If user is registering....
  if(isset($_POST['action']) && $_POST['action'] == 'register'){
    // Checking for empty form data
    if(empty($_POST['first_name'])){
      $errors[] = "Your first name field cannot be blank";
    }
    else{
      if(!ctype_alpha($_POST['first_name'])){
        $errors[] = "Your first name cannot contain symbols or numbers.";
      }
    }

    if(empty($_POST['last_name'])){
      $errors[] = "Your last name field cannot be blank";
    }
    else{
      if(!ctype_alpha($_POST['last_name'])){
        $errors[] = "Your first name cannot contain symbols or numbers.";
      }
    }

    if(empty($_POST['email'])){
      $errors[] = "Email field cannot be blank";
    }
    else {
      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = "You entered invalid email address.";
      }
    }

    if(empty($_POST['password1'])){
      $errors[] = "Password field cannot be blank";
    }
    else {
      if(strlen($_POST['password1']) < 7){
        $errors[] = "Password should be more than 6 characters!";
      }
    }
    if(empty($_POST['password2'])){
      $errors[] = "Confirm password field cannot be blank";
    }
    if($_POST['password1'] != $_POST['password2']){
      $errors[] = "Confirm password and password don't match!";
    }

    // If there's no empty form data, add to database and redirect to main.php
    if(!empty($errors)){
      $_SESSION['errors'] = $errors;
      header("Location:error.php");
    }
    else{
      $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '{$_POST['password1']}', NOW(), NOW())";
      if(run_mysql_query($query)){
        $_SESSION['message'] = "You are successfully registered. Please log in to use CodingDojo Wall!!!";
        header("Location:success.php");
      }
      else{
        var_dump($query);
        var_dump(run_mysql_query($query));
        die("DB update was failed!");
      }
    }
  }

  // If user is registered and want to log in...
  elseif (isset($_POST['action']) && $_POST['action'] == 'login') {
    if(empty($_POST['email'])){
      $errors[] = "Email field cannot be blank";
    }
    if(empty($_POST['password'])){
      $errors[] = "Password field cannot be blank";
    }

    if(!empty($errors)){
      $_SESSION['errors'] = $errors;
      header("Location:error.php");
    }
    else{
      $esc_email= escape_this_string($_POST['email']);
      $esc_password = escape_this_string($_POST['password']);
      $query = "SELECT * FROM users WHERE email = '$esc_email' AND password = '$esc_password'";
      if(fetch_record($query)){
        $result = fetch_record($query);
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_name'] = $result['first_name'];
        header("Location:main.php");
      }
      else{
        $errors[] = "You have entered invalid email address or password!";
        $_SESSION['errors'] = $errors;
        header("Location:error.php");
      }
    }
  }

  // If user wansts to make a post on WALL
  elseif (isset($_POST['action']) && $_POST['action'] == 'message') {
    if(empty($_POST['message'])){
      $errors[] = "Please write what you want to post!!!";
    }

    if(!empty($errors)){
      $_SESSION['errors'] = $errors;
      header("Location:error.php");
    }
    else{
      $query = "INSERT INTO messages (users_id, message, created_at, updated_at) VALUES('{$_POST['id']}', '{$_POST['message']}', NOW(), NOW())";
      if(run_mysql_query($query)){
        header("Location:main.php");
      }
      else{
        die("DB update was failed!");
      }
    }
  }

  // If user wansts to leave a comment under a post on WALL
  elseif (isset($_POST['action']) && $_POST['action'] == 'comment') {
    if(empty($_POST['comment'])){
      $errors[] = "Please write what you want to post!!!";
    }

    if(!empty($errors)){
      $_SESSION['errors'] = $errors;
      header("Location:error.php");
    }
    else{
      $query = "INSERT INTO comments (users_id, messages_id, comment, created_at, updated_at) VALUES('{$_POST['user_id']}', '{$_POST['post_id']}', '{$_POST['comment']}', NOW(), NOW())";
      if(run_mysql_query($query)){
        header("Location:main.php");
      }
      else{
        die("DB update was failed!");
      }
    }
  }
  elseif (isset($_POST['action']) && $_POST['action'] == 'logoff') {
    $_SESSION = array();
    $_SESSION['message'] ="You are successfully logged out. Please log in again to use CodingDojo Wall!!!";
    header("Location:success.php");
  }
  elseif (isset($_POST['action']) && $_POST['action'] == 'reset') {
    $_SESSION = array();
    $_SESSION['message'] ="SESSION data is cleared!!!";
    header("Location:success.php");
  }
?>
