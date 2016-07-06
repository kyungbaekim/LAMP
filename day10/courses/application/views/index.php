<?php
  // session_start();
  // var_dump($this->session->all_userdata());
  // var_dump($this->session->userdata['activity']);
  // session_destroy();
  // var_dump($this->session->all_userdata());
?>

<html lang="en">
  <head>
    <title>Coureses</title>
    <style>
      p{
        font-size: 20px;
        font-weight: bold;
      }
      .wrapper{
        width: 845px;
        margin: 0px auto;
        border: 1px solid black;
      }
      .top{
        width: 840px;
        padding: 0px 20px;
      }
      .bottom{
        width: 840px;
        padding: 20px 20px;
      }
      .button, .reset{
        margin-top: 10px;
        height: 30px;
        font-size: 24px;
      }
      .reset{
        margin: 10px 20px;
      }
      th, td{
        padding: 5px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class='top'>
        <h2>Add a new course</h2>
        <div class="add_form">
          <form action="/courses/add" method="post">
            <p>Name: <input type="text" name='name'></p>
            <p>Description:</p>
            <textarea cols="50" rows="10" name='description'></textarea><br>
            <input class="button" type="submit" value="Add">
          </form>
        </div>
      </div>
      <div class='bottom'>
        <h2>Courses</h2>
        <div class="display">
          <table border="1" width="805">
            <thead>
              <th>Course name</th>
              <th>Description</th>
              <th>Date added</th>
              <th>Action</th>
            </thead>
            <?php
              for($i=0; $i<count($courses); $i++){
                echo "<tr>";
                echo "<td>".$courses[$i]['name']."</td>";
                echo "<td>".$courses[$i]['description']."</td>";
                echo "<td align='center'>".$courses[$i]['created_at']."</td>";
                echo "<td align='center'><a href='courses/destory/".$courses[$i]['id']."'>remove</a></td>";
                echo "</tr>";
              }
            ?>
          </table>
        </div>
      </div>
      <form action="/courses/reset_session" method="post">
        <input class="reset" type="submit" value="Reset whole session!">
      </form>
    </div><!-- end of wrapper -->
  </body>
</html>
