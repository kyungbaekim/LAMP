<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajax Notes</title>
  <script type="text/javascript" src='http://code.jquery.com/jquery-2.2.2.js'></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.new_note').focus();
      $.get('/ajaxs/index_html', function(res) {
        $('.notes').html(res);
      });
      $('form').submit(function() {
        $.post($(this).attr('action'), $(this).serialize(), function(res) {
          $('.notes').html(res);
          $('.new_note').val('');
          $('.new_note').focus();
        });
        return false;
      });
      $(document).on('click', '.delete', function() {
        $.post($(this).attr('href'), $(this).serialize(), function(res) {
          $('.notes').html(res);
        });
        return false;
      });
      $(document).on('focusout', '.description', function() {
        $.post($(this).parent().attr('action'), $(this).parent().serialize(), function(res) {
          $('.notes').html(res);
          $('.new_note').val('');
          $('.new_note').focus();
        });
        return false;
      });
    });
  </script>
  <style>
    .wrapper{
      width: 380px;
      margin: 20px auto;
    }
    p{
      margin: 5px;
    }
    input, textarea, table, p{
      font-family: sans-serif;
    }
    input{
      width: 369px;
    }
    hr{
      margin-bottom: 30px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <p>Notes:</p>
    <hr>
    <div class='notes'></div>
    <div class='title'>
      <form class='create' action='/ajaxs/create' method='post'>
        <table>
          <tr>
            <td><input type='text' class='new_note' name='title' placeholder='Insert note title here...'></td>
          </tr>
          <!-- <tr>
            <td><textarea cols=50 rows=10 name='message' placeholder='Enter description here...'></textarea></td>
          </tr> -->
          <tr>
            <td align=center><input type='submit' value='Add Note'></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>
</html>
