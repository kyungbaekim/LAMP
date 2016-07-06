<?php
  session_start();
  // var_dump($_SESSION);
?>
<html lang="en">
   <head>
      <title>CSV with pagination</title>
      <style type="text/css">
        .wrapper{
          width: 400px;
          height: 100%;
          margin: 0px auto;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        .form{
          width: 380px;
          height: 280px;
          text-align: right;
          padding: 0px 10px;
          border: 2px solid black;
        }
      </style>
   </head>
   <body>
      <div class="wrapper">
        <div class="form">
           <form action="process.php" method="post" ENCTYPE="multipart/form-data">
             <h1>Please attach your CSV file</h1>
             <p>Attach CSV file: <input type="file" name="attachment"></p>
             <input class='submit' type="submit" name="submit" value="Submit!!!">
           </form>
           <br><br><br>
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
