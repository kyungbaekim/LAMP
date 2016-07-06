<?php
  session_start();
  var_dump($_SESSION);
?>

<html>
<head>
  <title>Quoting Dojo</title>
  <style>
    .wrapper{
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .quote{
      width: 500px;
      height: 450px;
      border: 2px solid black;
      margin: 0px auto;
      text-align: center;
    }
    .form{
      text-align: left;
      margin: 20px;
    }
    h2{
      margin: 20px 10px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='quote'>
      <h2>Welcome to QuotingDojo</h2>
      <div class='form'>
        <form action='process.php' method='post'>
          <p>Your name: <input type="text" name="name"></p>
          <p>Your quote:
          <textarea rows="10" cols="50" name="quote"></textarea></p><br>
          <input type="submit" value="Add my quote!">
          <a href="main.php"><input type="button" value="Skip to quote!" /></a>
        </form><br><hr><br>
        <form action='index.php' method='post'>
          <input type="hidden" name="action" value="reset">
          <input type="submit" value="CLEAR SESSION!">
        </form>
        <?php
        if(isset($_POST['action']) && $_POST['action'] == 'reset'){
          $_SESSION = array();
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
