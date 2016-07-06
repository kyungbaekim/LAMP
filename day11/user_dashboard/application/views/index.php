<?php
  var_dump($this->session->all_userdata());
?>
<html>
<head>
  <title>Home Page</title>
  <style>
    .wrapper{
      width: 1000px;
      height: 100%;
      margin: 0px auto;
    }
    .top{
      width: 1000px;
      /*border: 1px solid silver;*/
    }
    .home, .signin{
      display: inline-block;
    }
    .home{
      width: 800px;
      /*border: 1px solid blue;*/
    }
    .signin{
      width: 190px;
      /*border: 1px solid black;*/
      text-align: right;
    }
    a{
      text-decoration: none;
      color: black;
    }
    .main{
      width: 960px;
      background-color: lightgrey;
      margin: 20px 0px;
      padding: 20px;
    }
    h2{
      padding: 0px;
      margin: 0px;
    }
    .sub{
      width: 280px;
      height: 140px;
      display: inline-block;
      padding: 20px;
      margin-left: 6px;
      vertical-align: top;
      border: 1px solid silver;
      border-radius: 10px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='home'>
        <b>TEST APP</b>&emsp;<a href="/">Home</a>
      </div>
      <div class='signin'>
        <?php
          if(!$this->session->userdata['user_id']){
            echo "<a href='/signin'>Sign in</a>";
          }
          else{
            echo "<a href='/reset_session'>Log off</a>";
          }
        ?>
      </div>
    </div>
    <hr>
    <div class='body'>
      <div class='main'>
        <h2>Welcome to the Test</h2>
        <p>We are going to build a cool application using a MVC framework! This application was built with the Vilage88 folks!</p>
        <a href=""><button>Start</button></a>&emsp;<a href="/main/reset_session"><button>Clear Session</button></a>
      </div>
      <a href='/dashboard'><div class='sub'>
        <h3>Manage Users</h3>
        <p>Using this application, you'll learn how to add, remove and edit users for the application.</p>
      </div></a>
      <a href='/dashboard'><div class='sub'>
        <h3>Leave Messages</h3>
        <p>Users will be able to leave a message to another user using this application.</p>
      </div></a>
      <a href='/edit/<?= $this->session->userdata['user_id'] ?>'><div class='sub'>
        <h3>Edit User information</h3>
        <p>Admin will be able to edit another user's information (email address, first name, last name, etc).</p>
      </div></a>
    </div>
  </div>
</body>
</html>
