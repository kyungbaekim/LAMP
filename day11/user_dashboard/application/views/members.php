<?php
  // var_dump($this->session->all_userdata());
?>
<html>
<head>
  <title>Home Page</title>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript">
  function popup(id) {
    var answer = confirm ("Are you sure you want to delete the user?")
    if (answer)
    window.location="/main/remove/"+id;
  }
  </script>
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
    h2{
      padding: 0px;
      margin: 0px;
    }
    .display{
      margin-top: 20px;
    }
    p {
      padding: 0px;
      margin-top: 10px;
    }
    table{
      /*padding: 0px;*/
      margin-top: 20px;
    }
    th, td{
      border: 1px solid black;
      padding: 5px;
      text-align: center;
    }
    .title{
      width: 465px;
    }
    .button{
      width: 200px;
      text-align: right;
    }
    .title, .button{
      display: inline-block;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='home'>
        <b>TEST APP</b>&emsp;<a href="/dashboard">Dashboard</a>&emsp;<a href='/show/<?= $this->session->userdata['user_id'] ?>'>Profile</a>
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
      <div class='display'>
        <?php
          if($this->session->userdata['user_level'] == 9){
            echo "<div class='title'><h2>Manager Users</h2></div>";
            echo "<div class='button'><a href='/new'><button>Add new</button></a></div>";
          }
          else{
            echo "<h2>All Users</h2>";
          }
        ?>
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>User Level</th>
            <?php
              if($this->session->userdata['user_level'] == 9){
                echo "<th>Actions</th>";
              }
            ?>
          </tr>
            <?php
            foreach($users as $user){
              echo "<tr>";
              $user_name = $user['first_name'].' '.$user['last_name'];
              if($user['user_level'] == 9){
                $user_level = 'admin';
              }
              else{
                $user_level = 'normal';
              }
              echo "<td>".$user['id']."</td>";
              // $this->session->set_flashdata('owner_id', $user['id']);
              echo "<td><a href='/show/".$user['id']."'>".$user_name."</a></td>";
              echo "<td>".$user['email']."</td>";
              echo "<td>".$user['created_at']."</td>";
              echo "<td>".$user_level;
              if($this->session->userdata['user_level'] != '9' && $this->session->userdata['user_id'] == $user['id']){
                echo "&emsp;<a href='/edit/".$user['id']."'>edit</a></td>";
              }
              if($this->session->userdata['user_level'] == 9){
                echo "<td><a href='/edit/".$user['id']."'>edit</a>&nbsp;&nbsp;&nbsp;";
                echo "<a href='javascript:popup(".$user['id'].")'>remove</a></td>";
              }
              echo "</tr>";
            }
            ?>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
