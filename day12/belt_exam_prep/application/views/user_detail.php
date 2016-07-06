<?php
  // var_dump($this->session->all_userdata());
  // var_dump($user);
  // var_dump($books);
?>
<html>
<head>
  <title>Book and Reviews</title>
  <style>
    .wrapper{
      width: 800px;
      margin: 0px auto;
    }
    .top{
      width: 800px;
      height: 70px;
      /*border: 1px solid black;*/
      /*margin: 0px auto;*/
    }
    .user, .menu{
      display: inline-block;
      /*border: 1px solid silver;*/
    }
    .user{
      width: 490px;
    }
    .menu{
      width: 300px;
      text-align: right;
    }
    h3{
      margin: 10px 0px;
    }
    p{
      margin: 5px 0px;
    }
    .title{
      padding-left: 20px;
    }
  </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='user'>
        <!-- <h2>Welcome, <?= $this->session->userdata['user_alias'] ?>!</h2> -->
      </div>
      <div class='menu'>
        <a href='/books_main'>Home</a>&emsp;<a href='/add'>Add Book and Review</a>&emsp;<a href='/clear'>Logout</a>
      </div>
    </div>
    <div class='body'>
      <div class='user_info'>
        <?php
        $count = 0;
        foreach ($books as $key => $value){
          if($value['user_id'] == $user['id']){
            $count++;
          }
        }
        ?>
        <h3>User Alias: <?= $user['alias'] ?></h3>
        <p>Name: <?= $user['name'] ?></p>
        <p>Email: <?= $user['email'] ?></p>
        <p>Total Reviews: <?= $count ?></p><br>
      </div>
      <div class='books'>
        <h3>Posted Reviews on the following books:</h3>
        <?php
        foreach ($books as $key => $value){
          if($value['user_id'] == $user['id']){
            echo "<p class='title'><a href='/detail/".$value['book_id']."'>".$value['title']."</a></p>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
