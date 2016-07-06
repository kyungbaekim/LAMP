<?php
  // var_dump($this->session->all_userdata());
  // var_dump($books);
  // var_dump($reviews);
  // var_dump($others);
?>
<html>
<head>
  <title>Books Home</title>
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
    .recent, .others{
      display: inline-block;
      /*border: 1px solid silver;*/
      vertical-align: top;
    }
    .recent{
      width: 406px;
      margin-right: 50px;
    }
    .others{
      width: 336px;
    }
    h4{
      margin-bottom: 0px;
    }
    p{
      margin: 5px 0px;
    }
    .detail, .more{
      margin-left: 20px;
    }
    #box {
      width: 400px;
      height: 300px;
      margin: 0 auto;
      overflow-y: auto;
      border: 1px solid silver;
      padding: 2px;
      /*text-align: justify;*/
      background: transparent;
    }
    .sub{
      margin: 10px;
    }
  </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='user'>
        <h2>Welcome, <?= $this->session->userdata['user_alias'] ?>!</h2>
      </div>
      <div class='menu'>
        <a href='/add'>Add Book and Review</a>&emsp;<a href='/clear'>Logout</a>
      </div>
    </div>
    <div class='body'>
      <div class='recent'>
        <h3>Recent Book Reviews:</h3>
        <?php
        $count = 0;
        foreach($reviews as $key=>$value){
          echo "<div class='detail'><a href='/detail/".$value['book_id']."'><h4>".$value['title']."</h4></a>";
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
          // echo "<p>Rating: ".$value['rating']."</p>";
          echo "<p>Rating: ".$str."</p>";
          echo "<p><a href='/user_detail/".$value['user_id']."'>".$value['name']."</a> says: ".$value['review']."</p>";
          echo "<p>Posted on ".$value['reviewed']."</p>";
          if($value['user_id'] == $this->session->userdata['user_id']){
            echo "<p><a href='/remove'>Delete this Review</a></p>";
          }
          echo "<br></div>";
          $count++;
          if($count > 2){
            break;
          }
        }
        ?>
      </div>
      <div class='others'>
        <h3>Other Books with Reviews</h3>
        <?php
        echo "<div id='box'>";
        for($i=0; $i<count($others); $i++){
            if($others[$i]['title'] == $reviews[0]['title'] || $others[$i]['title'] == $reviews[1]['title'] || $others[$i]['title'] == $reviews[2]['title']){
              continue;
            }
            else{
              echo "<p class='sub'><a href='/detail/".$others[$i]['book_id']."'>".$others[$i]['title']."</a></p>";
            }
          }
        echo "</div>";
        ?>
      </div>
    </div>
  </div>
</body>
</html>
