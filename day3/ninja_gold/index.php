<?php
  session_start();
  if(!isset($_SESSION['gold']) || !isset($_SESSION['activities'])){
    $_SESSION['gold'] = 0;
    $_SESSION['activities'] = [];
  }
  // var_dump($_SESSION);
?>

<html lang="en">
  <head>
    <title>Ninja Gold Gmae</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="gold">
        <p>Your Gold: <input type="text" value="<?= $_SESSION['gold']; ?>"></p>
      </div>
      <div class="options">
        <div class="farm">
          <p>Farm</p>
          <p>Earns 10~20 gold</p>
          <form action="process.php" method="post">
            <input type="hidden" name="action" value="farm">
            <input type="submit" value="Find Gold!">
          </form>
        </div>
        <div class="cave">
          <p>Cave</p>
          <p>Earns 5~10 gold</p>
          <form action="process.php" method="post">
            <input type="hidden" name="action" value="cave">
            <input type="submit" value="Find Gold!">
          </form>
        </div>
        <div class="house">
          <p>House</p>
          <p>Earns 2~5 gold</p>
          <form action="process.php" method="post">
            <input type="hidden" name="action" value="house">
            <input type="submit" value="Find Gold!">
          </form>
        </div>
        <div class="casino">
          <p>Casino!</p>
          <p>Earns/takes 0~50 gold</p>
          <form action="process.php" method="post">
            <input type="hidden" name="action" value="casino">
            <input type="submit" value="Find Gold!">
          </form>
        </div>
      </div>
      <div class='activity'>
        <p>Activities</p>
        <?php
          echo "<textarea readonly='readonly' cols='100' rows='20'>";
          foreach($_SESSION['activities'] as $value){
            echo $value."\n";
          }
          echo "</textarea>";
        ?>
      </div>
      <form action="process.php" method="post">
        <input type="hidden" name="action" value="reset">
        <input id="reset" type="submit" value="Reset the Game!">
      </form>
    </div><!-- end of wrapper -->
  </body>
</html>
