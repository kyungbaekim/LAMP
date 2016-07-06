<?php
  // var_dump($this->session->userdata['gold']);
  // var_dump($this->session->userdata['activity']);
?>

<html lang="en">
  <head>
    <title>Ninja Gold Gmae</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style>
      p{
        font-size: 20px;
        font-weight: bold;
      }
      .wrapper{
        width: 845px;
        height: 700px;
        margin: 100px auto;
        border: 1px solid black;
      }
      .options{
        width: 840px;
        height: 160px;
        padding: 40px 0px 0px 10px;
      }
      .gold{
        height: 50px;
        padding: 10px;
        display: flex;
        align-items: center;
      }
      .farm, .cave, .house, .casino{
        border: 2px solid black;
        display: inline-block;
        width: 200px;
        height: 150px;
        text-align: center;
      }
      .activity{
        padding-left: 10px;
      }
      #reset{
        margin: 20px 0px 0px 10px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="gold">
        <p>Your Gold: <input type="text" value="<?= $this->session->userdata('gold'); ?>"></p>
      </div>
      <div class="options">
        <div class="farm">
          <p>Farm</p>
          <p>Earns 10~20 gold</p>
          <form action="/main/process_money" method="post">
            <input type="hidden" name="action" value="farm">
            <input type="submit" value="Find Gold!">
          </form>
        </div>
        <div class="cave">
          <p>Cave</p>
          <p>Earns 5~10 gold</p>
          <form action="/main/process_money" method="post">
            <input type="hidden" name="action" value="cave">
            <input type="submit" value="Find Gold!">
          </form>
        </div>
        <div class="house">
          <p>House</p>
          <p>Earns 2~5 gold</p>
          <form action="/main/process_money" method="post">
            <input type="hidden" name="action" value="house">
            <input type="submit" value="Find Gold!">
          </form>
        </div>
        <div class="casino">
          <p>Casino!</p>
          <p>Earns/takes 0~50 gold</p>
          <form action="/main/process_money" method="post">
            <input type="hidden" name="action" value="casino">
            <input type="submit" value="Find Gold!">
          </form>
        </div>
      </div>
      <div class='activity'>
        <p>Activities</p>
        <?php
          echo "<textarea readonly='readonly' cols='100' rows='20'>";
          // if($this->session->userdata('activity')){
            foreach($this->session->userdata('activity') as $value){
              echo $value."\n";
            }
          // }
          echo "</textarea>";
        ?>
      </div>
      <form action="reset" method="post">
        <input id="reset" type="submit" value="Reset the Game!">
      </form>
    </div><!-- end of wrapper -->
  </body>
</html>
