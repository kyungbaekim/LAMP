<html>
  <head>
    <title>Time Display</title>
    <style type="text/css">
      .wrapper{
        text-align: center;
        width: 700px;
        margin: 0px auto;
      }
      .title{
        width: 250px;
        border: 1px solid black;
        padding: 10px;
        margin: 0px auto;
      }
      .time{
        width: 350px;
        border: 1px solid black;
        margin: 20px auto;
        font-size: 36px;
        padding: 20px;
      }
    </style>
  </head>
  <body>
    <div class='wrapper'>
      <p class='title'>The current time and date:</p>
      <p class='time'><?= $this->session->userdata['time'] ?></p>
    </div>
  </body>
</html>
