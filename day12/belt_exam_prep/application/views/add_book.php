<?php
  // var_dump($this->session->all_userdata());
  // var_dump($books);
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
    td{
      padding: 5px 0px;
    }
    form{
      margin-left: 20px;
    }
    .sub{
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
        <a href='/books_main'>home</a>&emsp;<a href='/clear'>Logout</a>
      </div>
    </div>
    <div class='body'>
      <div class='recent'>
        <h3>Add a New Book Title and a Review:</h3>
        <form action='/add_book_review' method='post'>
          <table>
            <tr><td><b>Book Title:</b></td><td><input type='text' name='title'></td></tr>
            <tr><td colspan='2'><b>Author:</b></td></tr>
            <tr><td class='sub' colspan='2'>Choose from the list:
              <select name='author1'>
                <option value=''>Select</option>
                <?php
                  foreach($books as $key => $value){
                    echo "<option value='".$value['author']."'>".$value['author']."</option>";
                  }
                ?>
              </select>
            </td></tr>
            <tr><td class='sub' colspan='2'>Or add a new author: <input type='text' name='author2'></td></tr>
            <tr><td valign=top><b>Review:</b></td><td><textarea cols=50 rows=5 name='review'></textarea></td></tr>
            <tr><td colspan='2'><b>Rating:</b>
              <select name='rating'>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select> stars</td></tr>
            <tr><td colspan='2' align=right><input type='submit' value='Add book and Review'></td></tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
