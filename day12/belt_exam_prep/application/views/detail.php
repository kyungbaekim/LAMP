<?php
  // var_dump($this->session->all_userdata());
  // var_dump(base_url());
  // die();
  // var_dump($book);
  // var_dump($reviews);
?>
<html>
<head>
  <title>Book and Reviews</title>
  <style>
    .wrapper{
      width: 800px;
      margin: 0px auto;
    }
    .top{
      width: 800px;
      height: 70px;
      /*border: 1px solid black;*/
      /*margin: 0px auto;*/
    }
    .user, .menu{
      display: inline-block;
      /*border: 1px solid silver;*/
    }
    .user{
      width: 540px;
    }
    .menu{
      width: 250px;
      text-align: right;
    }
    .reviews, .review{
      display: inline-block;
      /*border: 1px solid silver;*/
      vertical-align: top;
    }
    h3{
      margin: 0px;
    }
    .reviews{
      width: 396px;
    }
    .review{
      width: 376px;
      padding-left: 20px;
    }
    .detail{
      padding-left: 20px;
    }
  </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='user'>
        <!-- <h2>Welcome, <?= $this->session->userdata['user_alias'] ?>!</h2> -->
      </div>
      <div class='menu'>
        <a href='/books_main'>Home</a>&emsp;<a href='/clear'>Logout</a>
      </div>
    </div>
    <div class='body'>
      <div class='info'>
        <h3><?= $book['title'] ?></h3>
        <p>Author: <?= $book['author'] ?></p><br>
      </div>
      <div class='reviews'>
        <h3>Reviews:</h3>
        <?php
        foreach($reviews as $key=>$value){
          if($value['book_id'] == $book['id']){
            $str = '';
            for($i=0; $i<intval($value['rating']); $i++){
              // $str .= "<img src='".base_url()."assets/images/close.jpg' height='42' width='42'>";
              $str .= "<img src='http://localhost/assets/images/close.jpg' height='15' width='15'>";
            }
            if(intval($value['rating']) != 5){
              for($j=0; $j<5-intval($value['rating']);$j++){
                $str .= "<img src='http://localhost/assets/images/open.png' height='15' width='15'>";
              }
            }
            // var_dump($str);
            echo "<hr>";
            // echo "<div class='detail'><p>Rating: ".$value['rating']."</p>";
            echo "<div class='detail'><p>Rating: ".$str."</p>";
            echo "<p><a href='/user_detail/".$value['user_id']."'>".$value['name']."</a> says: ".$value['review']."</p>";
            echo "<p>Posted on ".$value['reviewed']."</p>";
            if($value['user_id'] == $this->session->userdata['user_id']){
              echo "<p><a href='/remove/".$value['review_id']."'>Delete this Review</a></p>";
            }
            echo "</div>";
          }
        }
        ?>
      </div>
      <div class='review'>
        <h3>Add a Review</h3>
        <form action='/add_review' method='post'>
          <table>
            <tr><td><textarea name='review' cols='50' rows='5'></textarea></td></tr>
            <tr><td><p>Rating:
              <select name='rating'>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select> stars</p></td></tr>
            <tr><td align=right><input type='submit' value='Submit Review'></td></tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
