<!DOCTYPE html>
<html lang="en">
   <head>
      <title>HTML table</title>
      <style type="text/css">
        td{
          border: 1px solid black;
          height: 30px;
        }
        .title{
          font-weight: bold;
        }
        .highlight{
          background-color: black;
          color: white;
        }
        td{
          text-align: center;
        }
      </style>
   </head>
   <body>
     <table>
       <tr>
         <td class='title'>User#</td>
         <td class='title'>First Name</td>
         <td class='title'>Last Name</td>
         <td class='title'>Full Name</td>
         <td class='title'>Full Name in upper case</td>
         <td class='title'>Length of full name (without spaces)</td>
       </tr>
       <?php
         $users = array(
          array('first_name' => 'Michael', 'last_name' => 'Choi'),
          array('first_name' => 'John', 'last_name' => 'Supsupin'),
          array('first_name' => 'Mark', 'last_name' => 'Guillen'),
          array('first_name' => 'KB', 'last_name' => 'Tonel'),
          array('first_name' => 'David', 'last_name' => 'Kim'),
          array('first_name' => 'James', 'last_name' => 'Doe'),
          array('first_name' => 'Robert', 'last_name' => 'Smith'),
          array('first_name' => 'Tom', 'last_name' => 'Johnson'),
          array('first_name' => 'Richard', 'last_name' => 'William'),
          array('first_name' => 'Joseph', 'last_name' => 'Brown'),
          array('first_name' => 'Matt', 'last_name' => 'Jones'),
          array('first_name' => 'Paul', 'last_name' => 'Miller'),
          array('first_name' => 'George', 'last_name' => 'Wilson'),
          array('first_name' => 'Daniel', 'last_name' => 'Taylor')
         );

        // this is a code using foreach loop
        // foreach($users as $key => $value){
        //   $user_num = $key + 1;
        //   if($user_num % 5 == 0){
        //     echo "<tr class='highlight'>";
        //   }
        //   else{
        //     echo "<tr>";
        //   }
        //   echo "<td><b>$user_num</b></td>";
        //   echo "<td>".$users[$key]['first_name']."</td>";
        //   echo "<td>".$users[$key]['last_name']."</td>";
        //   $full_name = $users[$key]['first_name']." ".$users[$key]['last_name'];
        //   echo "<td>".$full_name."</td>";
        //   echo "<td>".strtoupper($full_name)."</td>";
        //   echo "<td>".strlen(str_replace(' ','',$full_name))."</td>";
        //   echo "</tr>";
        // }

        // this is a code using for loop.
        for($i=0; $i<count($users); $i++){
          $user_num = $i + 1;
          if($user_num % 5 == 0){
            echo "<tr class='highlight'>";
          }
          else{
            echo "<tr>";
          }
          echo "<td><b>$user_num</b></td>";
          echo "<td>".$users[$i]['first_name']."</td>";
          echo "<td>".$users[$i]['last_name']."</td>";
          $full_name = $users[$i]['first_name']." ".$users[$i]['last_name'];
          echo "<td>".$full_name."</td>";
          echo "<td>".strtoupper($full_name)."</td>";
          echo "<td>".strlen(str_replace(' ','',$full_name))."</td>";
          echo "</tr>";
        }
       ?>
     </table>
   </body>
</html>
