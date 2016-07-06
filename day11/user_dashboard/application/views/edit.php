<?php
  // var_dump($this->session->all_userdata());
?>
<html>
<head>
  <title>Edit Profile</title>
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
      text-align: right
    }
    .form1, .form2{
      padding: 20px;
      width: 430px;
      vertical-align: top;
      display: inline-block;
      border: 1px solid black;
    }
    .form1{
      margin-right: 40px;
      margin-left: 5px;
    }
    a{
      text-decoration: none;
    }
    /*h2{
      padding: 0px;
      margin: 0px;
    }*/
    p {
      padding: 0px;
      margin-top: 10px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='home'>
        <?php
          if($this->session->userdata['user_id']){
            echo "<b>TEST APP</b>&emsp;<a href='/dashboard'>Dashboard</a>&emsp;<a href='/main'>Profile</a>";
          }
          else{
            echo "<b>TEST APP</b>&emsp;<a href='/'>Home</a>";
          }
        ?>
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
      <?php
        if($this->session->userdata['user_level'] == 9){
          echo "<h2>Edit user #".$user['id']."</h2>";
        }
        else{
          echo "<h2>Edit profile</h2>";
        }
      ?>
      <div class='form1'>
        <p>Edit Information</p>
        <?php
          if(isset($errors)){
            echo $errors;
          }
        ?>
        <form action="/main/edit_process1/<?= $user['id'] ?>" method="post">
          <p>Email address:<br>
          <input type="text" name='email' value='<?= $user['email'] ?>'></p>
          <p>First name:<br>
          <input type="text" name='fname' value='<?= $user['first_name'] ?>'></p>
          <p>Last name:<br>
          <input type="text" name='lname' value='<?= $user['last_name'] ?>'></p>

            <?php
            if($this->session->userdata['user_level'] == '9'){
              echo "<p>User Level:<br>";
              echo "<select name='user_level'>";
              if($user['user_level'] == '9'){
                echo "<option value='9'>Admin</option>";
                echo "<option value='0'>Normal</option>";
              }
              else{
                echo "<option value='0'>Normal</option>";
                echo "<option value='9'>Admin</option>";
              }
            }
            else{
              echo "<input type='hidden' name='user_level' value='".$user['user_level']."'>";
            }
            echo "</select>";
            ?>
          </p>
          <p>Description:<br>
          <textarea name="description" rows="10" cols="50"><?= $user['description'] ?></textarea></p>
          <input type="submit" value="Save">
        </form>
      </div>
      <div class='form2'>
        <p>Change Password</p>
        <?php
          if(isset($errors)){
            echo $errors;
          }
        ?>
        <form action="main/edit_process2" method="post">
          <p>Password:<br>
          <input type="password" name='password1'></p>
          <p>Password Confirmation:<br>
          <input type="password" name='password2'></p>
          <input type='submit' value='Update Password'>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
