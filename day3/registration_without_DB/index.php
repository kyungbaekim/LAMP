<?php
  session_start();
  // var_dump($_SESSION);
?>
<html lang="en">
   <head>
      <title>Registration without DB</title>
      <style type="text/css">
        .wrapper{
          width: 460px;
          height: 440px;
          margin: 0px auto;
          border: 2px solid black;
        }
        .form{
          width: 440px;
          height: 440px;
          text-align: right;
          padding: 0px 10px;
        }
        .submit{
          width: 120px;
          height: 40px;
          font-size: 20px;
        }
        .description{
          font-size: 12px;
          color: red;
          line-height: 50%;
        }
        .reset{
          width: 200px;
          height: 40px;
          font-size: 20px;
          margin-top: 20px;
        }
      </style>
   </head>
   <body>
      <div class="wrapper">
        <div class="form">
           <form action="process.php" method="post" ENCTYPE="multipart/form-data">
              <?php
                // Email field
                if(!empty($_SESSION) && !$_SESSION['valid'][0]){
                  echo "<p><mark>*E-mail</mark>: ";
                }
                else{
                  echo "<p>*E-mail: ";
                }
                echo "<input type='text' name='email'></p>";

                // First name field
                if(!empty($_SESSION) && !$_SESSION['valid'][1]){
                  echo "<p><mark>*First name</mark>: ";
                }
                else{
                  echo "<p>*First name: ";
                }
                echo "<input type='text' name='first_name'></p>";

                // Last name field
                if(!empty($_SESSION) && !$_SESSION['valid'][2]){
                  echo "<p><mark>*Last name</mark>: ";
                }
                else{
                  echo "<p>*Last name: ";
                }
                echo "<input type='text' name='last_name'></p>";

                // Password field
                if(!empty($_SESSION) && !$_SESSION['valid'][3]){
                  echo "<p><mark>*Password</mark>: ";
                }
                else{
                  echo "<p>*Password: ";
                }
                echo "<input type='text' name='password1'></p>";
                echo "<p class='description'>Password should be more than 6 characters</p>";

                // Confirm password field
                if(!empty($_SESSION) && !$_SESSION['valid'][4]){
                  echo "<p><mark>*Confirm Password</mark>: ";
                }
                else{
                  echo "<p>*Confirm Password: ";
                }
                echo "<input type='text' name='password2'></p>";
                echo "<p class='description'>Password should be more than 6 characters</p>";

                // Birthday field
                if(!empty($_SESSION) && !$_SESSION['valid'][5]){
                  echo "<p><mark>Birthday</mark>: ";
                }
                else{
                  echo "<p>Birthday: ";
                }
                echo "<input type='text' name='birth_date'></p>";
                echo "<p class='description'>(MMDDYYYY)</p>";
              ?>

             <p>Profile picture (optional): <input type="file" name="picture"></p>
             <input class='submit' type="submit" name="submit" value="Register">
             <hr>
             <p>* are fields that are required.</p>
           </form>
           <?php
            if(isset($_SESSION['errors'])){
              echo "<br>";
              foreach($_SESSION['errors'] as $errors){
                echo $errors."<br>";
              }
            }
           ?>
           <form action="index.php" method="post">
             <input type="hidden" name="action" value="reset">
             <input class='reset' type="submit" value="Reset Session!">
             <p class='description'>Please press button twice to clear SESSION.</p>
           </form>
           <?php
            if(isset($_POST['action']) && $_POST['action'] == 'reset'){
              $_SESSION = array();
            }
           ?>
        </div>
      </div>
   </body>
</html>
