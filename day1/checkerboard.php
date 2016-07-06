<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Checker Board</title>
    <style type="text/css">
      #black{
        background-color: black;
        width: 50px;
        height: 50px;
      }
      #white{
        border: 1px solid black;
        width: 50px;
        height: 50px;
      }
      /*td{
        border: 1px solid black;
        width: 30px;
        height: 30px;
      }*/
    </style>
  </head>
  <body>
    <!-- <div id='black'></div>
    <div id='white'></div> -->
    <?php
      // $board = [
      //   [1,2,1,2,1,2,1,2],
      //   [2,1,2,1,2,1,2,1],
      //   [1,2,1,2,1,2,1,2],
      //   [2,1,2,1,2,1,2,1],
      //   [1,2,1,2,1,2,1,2],
      //   [2,1,2,1,2,1,2,1],
      //   [1,2,1,2,1,2,1,2],
      //   [2,1,2,1,2,1,2,1]
      // ];

      // $output = '';
      // for($i=0; $i<count($board); $i++){
      //   $output += "\n<div class='row'>\n";
      //   for($j=0; $j<count($board[$i]); $j++){
      //     if($board[$i][$j] == 2){
      //       $output += "<div id='white'></div>";
      //     }
      //     if($board[$i][$j] == 1){
      //       $output += "<div id='black'></div>";
      //     }
      //   }
      //   $output += "\n</div>";
      // }
      function blackFirst(){
        echo "<tr>";
        for($i=0; $i<8; $i++){
          if ($i % 2 == 0){
            echo "<td id='black'></td>";
          } else {
            echo "<td id='white'></td>";
          }
        }
        echo "</tr>";
      }
      function whiteFirst(){
        echo "<tr>";
        for($i=0; $i<8; $i++){
          if ($i % 2 == 0){
            echo "<td id='white'></td>";
          } else {
            echo "<td id='black'></td>";
          }
        }
        echo "</tr>";
      }
    ?>
    <table>
      <?php
        for($k=0; $k<8; $k++){
          if ($k % 2 == 0){
            blackFirst();
          } else {
            whiteFirst();
          }
        }
      ?>
    </table>
  </body>
</html>
