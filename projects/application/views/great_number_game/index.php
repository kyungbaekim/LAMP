<html>
  <head>
    <title>Great Number Game</title>
    <style type="text/css">
      .wrapper{
        text-align: center;
        width: 700px;
        margin: 0px auto;
      }
      .red, .green{
        border: 2px solid black;
        width: 250px;
        height: 250px;
        font-size: 26px;
        padding: 50px;
        margin: 0px auto;
      }
      .red{
        background-color: red;
      }
      .green{
        background-color: green;
      }
    </style>
  </head>
  <body>
    <div class='wrapper'>
      <?= $this->session->userdata['number'] ?>
      <?= $this->session->flashdata('correct') ?>
      <h1>Welcome to the Great Number Game!</h1>
      <p>I am thinking of a number between 1 and 100</p>
      <p>Take a guess</p>

      <?php
        if($this->session->flashdata('result')){
          echo "<div class='red'><br><br>";
          echo "<p>".$this->session->flashdata('result')."</p>";
          echo "</div>";
        }
        if($this->session->flashdata('correct')){
          echo "<div class='green'><br><br>";
          echo "<p>".$this->session->flashdata('correct')."</p>";
          echo "<form action='/reset_num' method='post'>";
          echo "<input type=submit value='Play Again!'>";
          echo "</form></div>";
        }
      ?>

      <form action='/check' method="post">
        <p><input type="text" name="guess"></p>
        <input type="submit" value="Submit">
      </form>
    </div>
  </body>
</html>
