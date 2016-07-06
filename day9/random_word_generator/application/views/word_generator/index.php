<?php
  // var_dump($this->session->all_userdata());
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Random Word Generator</title>
    <style type="text/css">
      .wrapper{
        width: 600px;
        margin: 10px auto;
        padding-top: 200px;
        text-align: center;
      }
      .word{
        width: 500px;
        height: 60px;
        border: 1px solid silver;
        font-size: 48px;
        padding: 20px;
        margin: 0px auto;
        vertical-align: middle;
      }
      .button{
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <div class='wrapper'>
      <p>Random Word (attempt <?= $this->session->userdata['counter'] ?>)</p>
      <form action='/create' method='post'>
        <p class='word'>
        <?php
          if($this->session->userdata['word']){
            echo $this->session->userdata['word'];
          }
        ?>
        </p><br>
        <input class="button" type='submit' value='Generate'>
      </form>
      <form action='/reset' method='post'>
        <input class="button" type='submit' value='Reset!!!'>
      </form>
    </div>
  </body>
</html>
