<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Survey Form</title>
    <style type="text/css">
      .wrapper{
        /*border: 1px solid black;*/
        width: 500px;
        margin: 10px auto;
        padding-left: 20px;
        padding-bottom: 20px;
      }
      h2{
        text-decoration: underline;
      }
      .notice{
        border: 1px solid black;
        width: 390px;
        margin: 10px auto;
        padding: 10px;
        background-color: lightgreen;
      }
      .form{
        border: 1px solid black;
        width: 390px;
        margin: 10px auto;
        padding-left: 20px;
        padding-bottom: 20px;
      }
    </style>
  </head>
  <body>
    <div class='wrapper'>
      <p class='notice'>Thank you for submittin this form! You have submitted this form <?= $this->session->userdata['counter'] ?> times now.</p>
      <div class='form'>
        <form action='/'>
          <h2>Submitted Information</h2>
          <p>Your name: <?= $this->session->userdata('name') ?></p>
          <p>Dojo Locaion: <?= $this->session->userdata('location') ?></p>
          <p>Favorite Language: <?= $this->session->userdata('language') ?></p>
          <p>Comments (optional): <?= $this->session->userdata('comment') ?></p>
          <input type='submit' value='Go back'>
        </form>
        <br>
        <form action='/reset'>
          <input type='submit' value='Reset Counter!!!'>
        </form>
      </div>
    </div>
  </body>
</html>
