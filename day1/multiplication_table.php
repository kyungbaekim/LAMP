<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Multiplication Table</title>
      <style type="text/css">
        td{
          border: 1px solid black;
          width: 40px;
          height: 40px;
          text-align: center;
        }
        .odd{
          background-color: lightgrey;
        }
        p{
          font-size: 20px;
          font-weight: bold;
          margin: 0px;
        }
      </style>
   </head>
   <body>
     <?php
       echo "<table cellspacing='2'>";
       for($i=0; $i<10; $i++){
         echo "<tr>";
         if($i == 0){
           for($j=0; $j<10; $j++){
             if($j == 0){
               echo "<td class='odd'></td>";
             }
             else{
              echo "<td class='odd'><p>$j</p></td>";
             }
           }
         }
         else {
           for($j=0; $j<10; $j++){
             if($i % 2 == 0){
               if($j == 0){
                 echo "<td class='odd'><p>$i</p></td>";
               }
               else{
                $result = $i * $j;
                echo "<td class='odd'>$result</td>";
               }
             }
             else{
               if($j == 0){
                 echo "<td><p>$i</p></td>";
               }
               else{
                $result = $i * $j;
                echo "<td>$result</td>";
               }
             }
           }
         }
         echo "</tr>";
       }
       echo "</table>";
     ?>
   </body>
</html>
