<html lang="en">
  <head>
    <title>Coureses</title>
    <style>
      p{
        font-size: 20px;
        font-weight: bold;
      }
      .wrapper{
        width: 845px;
        margin: 0px auto;
        border: 1px solid black;
      }
      .top{
        margin-left: 20px;
      }
      .display{
        width: 800px;
      }
      form{
        width: 800px;
      }
      .button, .reset, button{
        margin-top: 10px;
        height: 30px;
        font-size: 24px;
      }
      .reset{
        margin: 20px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class='top'>
        <h2>Are you sure you want to delete the following course?</h2>
        <div class="display">
          <form action="/courses/remove/<?= $course['id'] ?>" method="post">
            <p>Name: <?= $course['name'] ?></p>
            <p>Description: <?= $course['description'] ?></p><br>
            <input class="button" type="submit" value="Yes! I want to delete this">
          </form>
        </div>
        <a href="/"><button>No</button></a>
      </div>
      <form action="/courses/reset_session" method="post">
        <input class="reset" type="submit" value="Reset whole session!">
      </form>
    </div><!-- end of wrapper -->
  </body>
</html>
