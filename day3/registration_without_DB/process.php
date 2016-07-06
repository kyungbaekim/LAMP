<?php
  session_start();
  $errors = array();
  $is_data_valid = [true, true, true, true, true, true];

  if(empty($_POST['email'])){
    $errors[] = "Email field cannot be blank";
    $is_data_valid[0] = false;
  }
  else {
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errors[] = "You entered invalid email address.";
      $is_data_valid[0] = false;
    }
  }

  if(empty($_POST['first_name'])){
    $errors[] = "First name field cannot be blank";
    $is_data_valid[1] = false;
  }
  else{
    if(!ctype_alpha($_POST['first_name'])){
      $errors[] = "Your first name cannot contain symbols or numbers.";
      $is_data_valid[1] = false;
    }
  }

  if(empty($_POST['last_name'])){
    $errors[] = "Last name field cannot be blank";
    $is_data_valid[2] = false;
  }
  else{
    if(!ctype_alpha($_POST['last_name'])){
      $errors[] = "Your last name cannot contain symbols or numbers.";
      $is_data_valid[2] = false;
    }
  }

  if(empty($_POST['password1'])){
    $errors[] = "Password field cannot be blank";
    $is_data_valid[3] = false;
  }
  else {
    if(strlen($_POST['password1']) < 7){
      $errors[] = "Password should be more than 6 characters!";
      $is_data_valid[3] = false;
    }
  }

  if(empty($_POST['password2'])){
    $errors[] = "Confirm password field cannot be blank";
    $is_data_valid[4] = false;
  }

  if($_POST['password1'] != $_POST['password2']){
    $errors[] = "Confirm password and password don't match!";
    $is_data_valid[3] = false;
    $is_data_valid[4] = false;
  }

  if(!empty($_POST['birth_date'])){
    if(!checkdate(substr($_POST['birth_date'], 0, 2), substr($_POST['birth_date'], 2, 2), substr($_POST['birth_date'], 4, 4))){
      $errors[] = "The date format must be MMDDYYYY";
      $is_data_valid[5] = false;
    }
  }

  // Upload file
  if(isset($_POST["submit"])){
    if(empty($errors)){
      $target_dir = 'upload/';
      $target_file = $target_dir . basename($_FILES["picture"]["name"]);
      move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
    }
  }

  // Upload file script from w3.school.com
  // $target_dir = "upload/";
  // $target_file = $target_dir . basename($_FILES["picture"]["name"]);
  // $uploadOk = 1;
  // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // // Check if image file is a actual image or fake image
  // if(isset($_POST["submit"])) {
  //   $check = getimagesize($_FILES["picture"]["tmp_name"]);
  //   if($check !== false) {
  //     echo "File is an image - " . $check["mime"] . ".";
  //     $uploadOk = 1;
  //   } else {
  //     echo "File is not an image.";
  //     $uploadOk = 0;
  //   }
  // }
  // Check if file already exists
  // if (file_exists($target_file)) {
  //     echo "Sorry, file already exists.";
  //     $uploadOk = 0;
  // }
   // Check file size
  // if ($_FILES["picture"]["size"] > 5000000) {
  //     echo "Sorry, your file is too large.";
  //     $uploadOk = 0;
  //  }
  // Allow certain file formats
  // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  // && $imageFileType != "gif" ) {
  //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //   $uploadOk = 0;
  // }
  // Check if $uploadOk is set to 0 by an error
  // if ($uploadOk == 0) {
  //   echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  // } else {
  //   move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
      // if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
      //     echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
      // } else {
      //     echo "Sorry, there was an error uploading your file.";
      // }
  // }

  if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['valid'] = $is_data_valid;
    header("Location:index.php");
  }
  else{
    header("Location:success.html");
  }
?>
