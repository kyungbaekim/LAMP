<html>
<head>
  <title>Successfully registered!</title>
  <style>
    .wrapper{
      width: 1000px;
      height: 100%;
      margin: 0px auto;
    }
    .top{
      width: 1000px;
    }
    .home, .signin{
      display: inline-block;
    }
    .home{
      width: 800px;
    }
    .signin{
      width: 190px;
      text-align: right;
    }
    .success{
      width: 400px;
      height: 300px;
      background-color: lightgrey;
      border: 2px solid black;
      margin: 50px auto;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    button{
      width: 120px;
      height: 30px;
      font-size: 24px;
    }
    a{
      text-decoration: none;
    }
    h2{
      padding: 0px;
      margin: 0px;
    }
    p {
      padding: 0px;
      margin-top: 10px;
    }
    h3{
      margin: 10px 10px;
      vertical-align: middle;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='top'>
      <div class='home'>
        <b>TEST APP</b>&emsp;<a href="/">Home</a>
      </div>
      <div class='signin'>
        <?php
          if(!$this->session->userdata['user_id']){
            echo "<a href='/main/signin'>Sign in</a>";
          }
          else{
            echo "<a href='/main/signoff'>Log off</a>";
          }
        ?>
      </div>
    </div>
    <hr>
    <div class='body'>
      <div class='success'>
        <div class='message'>
          <h3>You are successfully registered.<br>Please log in!!!</h3><br>
          <a href="/"><input type="button" value="Back to log in page!"></a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
