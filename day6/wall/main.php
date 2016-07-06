<?php
  session_start();
  // var_dump($_SESSION);
  include_once('db_connection.php');
  if(!$_SESSION['user_id']){
    $errors[] = "You have not signed in. Please log in first!";
    $_SESSION['errors'] = $errors;
    header('Location:error.php');
  }
?>
<html>
<head>
  <title>Quoting Dojo</title>
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
        <h3>Welcome <span style='color:blue'><?= $_SESSION['user_name']; ?></span></h3>
      </div>
      <div class='logoff'>
        <form action="process.php" method="post">
          <input type="hidden" name="action" value="logoff">
          <input type="submit" value="Log Off">
        </form>
      </div>
    </div>
    <div class='post_comment'>
      <h2>Post a message!!!</h2>
      <form action="process.php" method="post">
        <input type="hidden" name="action" value="message">
        <input type="hidden" name="id" value="<?= $_SESSION['user_id'];?>">
        <textarea rows="5" cols="100" name='message'></textarea><br>
        <input class='post' type="submit" value="Post a message!">
      </form>
      <br>
      <form action='main.php' method='post'>
        <input type="hidden" name="action" value="reset1">
        <input type="submit" value="CLEAR ALL SESSIONS!">
      </form>
      <form action='main.php' method='post'>
        <input type="hidden" name="action" value="reset2">
        <input type="submit" value="CLEAR SESSIONS[errors]!">
      </form>
      <?php
      if(isset($_POST['action']) && $_POST['action'] == 'reset1'){
        $_SESSION = array();
      }
      if(isset($_POST['action']) && $_POST['action'] == 'reset2'){
        $_SESSION['errors'] = array();
      }
      ?>
    </div>
    <div class='messages'>
      <table width=800>
        <?php
        $query = "SELECT users.id AS user_id, concat(users.first_name, ' ', users.last_name) AS name, messages.id, messages.message, DATE_FORMAT(messages.created_at,'%M %D %Y %T') AS posted FROM messages
                  LEFT JOIN users ON messages.users_id =users.id
                  ORDER BY messages.created_at DESC";
        $results = fetch_all($query);
        foreach($results as $row){
          echo "<tr><td width=800><h2>".$row['name']." - ".$row['posted']."</h2></td></tr>";
          echo "<tr><td>".$row['message']."</td></tr>";
          echo "<tr height=30></tr>";
          $query = "SELECT users.id AS user_id, concat(users.first_name, ' ', users.last_name) AS name, messages.id, comments.comment AS comment, DATE_FORMAT(comments.created_at,'%M %D %Y %T') AS commented FROM messages
                    LEFT JOIN comments ON messages.id = comments.messages_id
                    LEFT JOIN users ON comments.users_id = users.id
                    WHERE comments.messages_id = {$row['id']}
                    ORDER BY comments.created_at ASC";
          $data = fetch_all($query);
          foreach($data as $value){
            echo "<tr class='sub'><td><h3>".$value['name']." - ".$value['commented']."</h2></td></tr>";
            echo "<tr class='sub'><td><p>".$value['comment']."<p></td></tr>";
            echo "<tr height=10></tr>";
          }
          echo "<tr><td class='sub' width=700><form action='process.php' method='post'>";
          echo "<input type='hidden' name='action' value='comment'>";
          echo "<input type='hidden' name='user_id' value=".$_SESSION['user_id'].">";
          echo "<input type='hidden' name='post_id' value=".$row['id'].">";
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
