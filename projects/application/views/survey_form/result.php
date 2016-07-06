<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Survey Form</title>
    <style type="text/css">
      .wrapper{
        border: 1px solid black;
        /*height: 280px;*/
        width: 395px;
        margin: 10px auto;
        padding-left: 20px;
        padding-bottom: 20px;
      }
      h2{
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class='wrapper'>
      <form action='/'>
        <h2>Submitted Information</h2>
        <p>Your name: <?= $this->session->userdata('name') ?></p>
        <p>Dojo Locaion: <?= $this->session->userdata('location') ?></p>
        <p>Favorite Language: <?= $this->session->userdata('language') ?></p>
        <p>Comments (optional): <?= $this->session->userdata('comment') ?></p>
        <input type='submit' value='Go back'>
      </form>
    </div>
  </body>
</html>
