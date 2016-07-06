<?php
  // var_dump($this->session->all_userdata());
  // var_dump($posts);
?>
<html>
<head>
  <title>Welcome to the Wall</title>
  <style>
    .wrapper{
      width: 100%;
    }
    .top{
      width: 1000px;
      height: 70px;
      border-bottom: 2px solid black;
      margin: 0px auto;
    }
    .title, .user_info, .logoff{
      display: inline-block;
    }
    .title{
      margin-left: 20px;
      width: 650px;
    }
    .user_info{
      width: 200px;
      text-align: right;
    }
    .logoff{
      width: 100px;
      text-align: right;
    }
    .quotes{
      width: 700px;
      margin: 0px auto;
      text-align: left;
    }
    .post_comment{
      width: 800px;
      margin: 50px auto;
    }
    .post{
      margin: 10px 0px;
    }
    .messages{
      width: 800px;
      margin: 0px auto;
    }
    .sub p, .sub h3, .sub form{
      padding: 0px 20px;
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
  </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='title'>
        <h1>CodingDojo Wall</h1>
      </div>
      <div class='user_info'>
        <h3>Welcome <span style='color:blue'><?= $this->session->userdata['user_name'] ?></span></h3>
      </div>
      <div class='logoff'>
        <form action="/walls/reset_session" method="post">
          <input type="submit" value="Log Off">
        </form>
      </div>
    </div>
    <div class='post_comment'>
      <h2>Post a message!!!</h2>
      <form action="add_post/<?= $this->session->userdata['user_id'] ?>" method="post">
        <textarea rows="5" cols="100" name='message'></textarea><br>
        <input class='post' type="submit" value="Post a message!">
      </form>
    </div>
    <div class='messages'>
      <table width=800>
        <?php
        foreach($posts as $row){
          echo "<tr><td width=800><h2>".$row['name']." - ".$row['posted']."</h2></td></tr>";
          echo "<tr><td>".$row['message']."</td></tr>";
          echo "<tr height=30></tr>";

          foreach($comments as $data){
            if($row['id'] == $data['message_id'] && $data['comment']){
              // var_dump($ata);
              echo "<tr class='sub'><td><h3>".$data['name']." - ".$data['commented']."</h2></td></tr>";
              echo "<tr class='sub'><td><p>".$data['comment']."<p></td></tr>";
              echo "<tr height=10></tr>";
            }
          }
          echo "<tr><td class='sub' width=700><form action='add_comment/".$this->session->userdata['user_id']."/".$row['id']."' method='post'>";
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
