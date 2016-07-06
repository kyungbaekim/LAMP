<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Checker Board #2</title>
    <style type="text/css">
      div.row div{
        display: inline-block;
      }
      div.row{
        height: 50px;
      }
      .tile1{
        background-color: black;
        width: 50px;
        height: 50px;
      }
      .tile2{
        <?php
          function randColor(){
            $colors = array('lightgrey', 'red', 'blue', 'lightblue', 'pink', 'lime', 'magenta', 'lightyellow', 'orange', 'orchid');
            $index = rand(0,9);
            return $colors[$index];
          }
        ?>
        background-color: <?= randColor(); ?>;
        width: 50px;
        height: 50px;
      }
    </style>
  </head>
  <body>
    <div id='container'>
      <div id='tile1'></div>
      <div id='tile2'></div>
    </div>

    <?php
      $board = array(
        array(1,2,1,2,1,2,1,2),
        array(2,1,2,1,2,1,2,1),
        array(1,2,1,2,1,2,1,2),
        array(2,1,2,1,2,1,2,1),
        array(1,2,1,2,1,2,1,2),
        array(2,1,2,1,2,1,2,1),
        array(1,2,1,2,1,2,1,2),
        array(2,1,2,1,2,1,2,1)
      );

      for($i=0; $i<count($board); $i++){
        echo "<div class='row'>";
        for($j=0; $j<count($board[$i]); $j++){
          if($board[$i][$j] == 2) {
            echo "<div class='tile2'></div>";
          }
          else {
            echo "<div class='tile1'></div>";
          }
        }
        echo "</div>";
      }
    ?>
  </body>
</html>
