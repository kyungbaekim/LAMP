<?php
  // session_start();
  // var_dump($this->session->all_userdata());
  // var_dump($this->session->userdata['activity']);
  // session_destroy();
  // var_dump($this->session->all_userdata());
?>

<html lang="en">
  <head>
    <title>Semi-RESTful Routes</title>
    <style>
      p{
        font-size: 20px;
        font-weight: bold;
      }
      .wrapper{
        width: 825px;
        margin: 0px auto;
        padding: 20px;
        border: 1px solid black;
      }
      .display{
        width: 820px;
      }
      .button{
        margin-top: 10px;
        height: 30px;
        font-size: 24px;
      }
      th, td{
        padding: 5px;
      }
      td{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class='display'>
        <h1>Products</h1>
        <div class="display">
          <table border="1" width="805">
            <thead>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Actions</th>
            </thead>
            <?php
              for($i=0; $i<count($products); $i++){
                echo "<tr>";
                echo "<td>".$products[$i]['name']."</td>";
                echo "<td>".$products[$i]['description']."</td>";
                echo "<td>$".$products[$i]['price']."</td>";
                echo "<td><a href='products/show/".$products[$i]['id']."'>show</a>&nbsp&nbsp|&nbsp&nbsp";
                echo "<a href='products/edit/".$products[$i]['id']."'>edit</a>&nbsp&nbsp|&nbsp&nbsp";
                echo "<a href='products/destory/".$products[$i]['id']."'>remove</a></td>";
                echo "</tr>";
              }
            ?>
          </table>
          <br><a href="/products/new_item">Add a new product</a>
        </div>
      </div>
    </div><!-- end of wrapper -->
  </body>
</html>
