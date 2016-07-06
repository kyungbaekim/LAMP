<?php
  // var_dump($this->session->all_userdata());
  // var_dump($posts);
?>
<html>
<head>
  <title>User Information</title>
  <style>
    .wrapper{
      width: 1000px;
      height: 100%;
      margin: 0px auto;
    }
    .top{
      width: 1000px;
    }
    .home, .signin{
      display: inline-block;
    }
    .home{
      width: 800px;
    }
    .signin{
      width: 190px;
      text-align: right;
    }
    a{
      text-decoration: none;
    }
    p{
      padding: 0px;
      margin: 0px;
    }
    .quotes{
      /*width: 700px;*/
      margin: 0px auto;
      text-align: left;
    }
    /*.post_comment{
      width: 800px;
      margin: 50px auto;
    }*/
    .post{
      margin: 10px 0px;
    }
    /*.posts{
      width: 800px;*/
      /*margin: 0px auto;*/
    /*}*/
    .sub p, .sub h3, .sub form{
      padding: 0px 0px;
    }
    .sub h3{
      margin: 0px;
    }
    button{
      width: 120px;
      height: 30px;
    }
    tr, td{
      margin: 0px;
      padding: 0px;
    }
    .content{
      border: 1px solid grey;
      height: 60px;
      /*padding: 20px;*/
    }
    h4{
      margin-bottom: 0px;
    }
  </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='home'>
        <b>TEST APP</b>&emsp;<a href="/dashboard">Dashboard</a>&emsp;<a href="/main">Profile</a>
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
    <div class='info'>
      <h2><?= $user['first_name'].' '.$user['last_name']?></h2>
      <p><u>Registered at:</u>&emsp;<?= $user['created_at'] ?></p>
      <p><u>User ID:</u>&emsp;#<?= $user['id'] ?></p>
      <p><u>Email Address:</u>&emsp;<?= $user['email'] ?></p>
      <p><u>Description:</u>&emsp;<?= $user['description'] ?></p>
    </div>
    <div class='post_comment'>
      <h2>Leave a message for <?= $user['first_name'].' '.$user['last_name'] ?></h2>
      <form action="/add_post/<?= $user['id'] ?>" method="post">
        <!-- <input type="hidden" name='owner' value='<?= $user['id'] ?>'> -->
        <textarea rows="5" cols="100" name='message'></textarea><br>
        <input class='post' type="submit" value="Post a message!">
      </form>
    </div>
    <div class='posts'>
      <table>
        <?php
        foreach($posts as $row){
          echo "<tr><td><p>".$row['name']." wrote on ".$row['posted']."</p></td></tr>";
          echo "<tr><td class='content' valign='top'>".$row['post']."</td></tr>";

          foreach($comments as $data){
            // var_dump($comments);
            // die();
            if($row['id'] == $data['post_id'] && $data['comment']){
              echo "<tr height=10><td></td></tr>";
              echo "<tr class='sub'><td align='right'><p>".$data['name']." wrote on ".$data['commented']."</p></td></tr>";
              echo "<tr class='sub'><td align='right'><p>".$data['comment']."<p></td></tr>";
              echo "<tr height=10></tr>";
            }
          }
          echo "<tr><td class='sub'><form action='/add_comment/".$this->session->userdata['user_id']."/".$row['id']."' method='post'>";
          echo "<input type='hidden' name='owner_id' value='".$user['id']."'>";
          echo "<textarea rows='5' cols='100' name='comment'></textarea><br>";
          echo "<input class='post' type='submit' value='Post a comment!'><br><br>";
          echo "</form>";
          echo "</td></tr>";
        }
        ?>
      </table>
    </div>
  </div>
</body>
</html>
