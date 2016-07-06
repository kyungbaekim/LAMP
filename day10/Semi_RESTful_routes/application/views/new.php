<?php
  // session_start();
  // var_dump($this->session->all_userdata());
  // var_dump($this->session->userdata['activity']);
  // session_destroy();
  // var_dump($this->session->all_userdata());
?>

<html lang="en">
  <head>
    <title>Semi-RESTful Routes</title>
    <style>
      p{
        font-size: 20px;
        font-weight: bold;
      }
      .wrapper{
        width: 845px;
        margin: 0px auto;
        border: 1px solid black;
        padding: 20px;
      }
      .display{
        width: 840px;
        /*padding: 20px 20px;*/
      }
      .button{
        margin-top: 10px;
        height: 30px;
        font-size: 24px;
      }
      th, td{
        padding: 5px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class='body'>
        <h1>Add a new product</h1>
        <div class="display">
          <?php
            if(isset($errors)){
              echo $errors;
            }
          ?>
          <form action="/products/create" method="post">
            <p>Name: <input type="text" name="name"></p>
            <p>Description: <input type="text" name="description"></p>
            <p>Price: $<input type="text" name="price"><br></p>
            <input class='button' type="submit" value="Create">
          </form>
          <br><a href="/">Go back</a>
        </div>
      </div>
    </div><!-- end of wrapper -->
  </body>
</html>
