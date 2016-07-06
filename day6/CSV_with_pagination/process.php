<?php
  session_start();
  var_dump($_POST);
  // Upload file
  if(isset($_POST["submit"])){
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
    var_dump($target_file);
    // move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file);
    if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["attachment"]["name"])." has been uploaded.";
        $_SESSION['file'] = $target_file;
        header('Location:csv.php');
    } else {
        die("Sorry, there was an error while uploading your file.");
    }
  }
?>
