<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajax Exercise</title>
  <script type="text/javascript" src='http://code.jquery.com/jquery-2.2.2.js'></script>
  <script>
    $(document).ready(function(){
      $.get('/ajaxs/index_html', function(res) {
        $('.posts').html(res);
      });
      $('form').submit(function(){
        $.post('/ajaxs/create', $(this).serialize(), function(res) {
          $('.posts').html(res);
          $('.description').val('');
        });
        return false;
      });
    });
  </script>
  <style>
    .wrapper{
      width: 800;
      /*display: flex;
      align-items: center;
      justify-content: center;*/
      margin: 20px auto;
    }
    .post{
      width: 200px;
      height: 200px;
      border: 1px solid silver;
      margin-right: 10px;
      margin-top: 10px;
      display: inline-block;
      vertical-align: top;
      background-color: lightyellow;
    }
    .form{
      margin-top: 100px;
    }
    p{
      margin: 5px;
    }
    .submit{
      width: 234px;
    }
    h1{
      margin-bottom: 0px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <h1>My Posts:</h1>
    <div class='posts'></div>
    <div class='form'>
      <form action='/create' method='post'>
        <table>
          <tr>
            <td>Add a note:</td>
          </tr>
          <tr>
            <td><textarea class='description' name='message' cols='30' rows='10'></textarea></td>
          </tr>
          <tr>
            <td align='right'><input class='submit' type='submit' value='Post It!'></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>
</html>
