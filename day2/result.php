<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Survey Form</title>
    <style type="text/css">
      .wrapper{
        border: 1px solid black;
        height: 280px;
        width: 395px;
        margin: 10px auto;
        padding-left: 20px;
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
        <p>Your name: <?= $_POST['full_name']; ?></p>
        <p>Dojo Locaion: <?= $_POST['location']; ?></p>
        <p>Favorite Language: <?= $_POST['language']; ?></p>
        <p>Comments (optional): <?= $_POST['comment']; ?></p>
        <input type='submit' value='Go back'>
      </form>
    </div>
  </body>
</html>
