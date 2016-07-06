<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>Uber</title>
  <script type='text/javascript' src='http://code.jquery.com/jquery-2.2.2.js'></script>
  <script type='text/javascript'>
    $(document).ready(function(){
      $('.new_longitude').focus();
      $('form').submit(function(){
        // $('.uber').html("<img src='assets/images/loading.gif'>");
        // console.log($(this).serialize());
        // console.log($(this).attr('action'));
        console.log('Submit button is clicked!');
        $('.uber').html('<h1>Estimates</h1>');
        $.post('get_price', $(this).serialize(), function(res) {
        // $.get($(this).attr('action'), function(res) {
          var html_string = '';
          $('.uber').html(res);
          if(res.length !== 0) {
              html_string = res;
          } else {
              html_string = 'Data Not Found';
          }
          console.log(html_string);
          $('.uber').html('<h1>Estimates</h1>');
          $('.uber').html(html_string);
        }, 'json');
        return false;
      });
      // $('form').submit(function(){
      //  var baseURL = 'https://api.uber.com/v1/estimates/price';
    	// 	var start_lat = 47.8497021;
    	// 	var start_long = -122.2575377;
    	// 	var end_lat = 47.4502535;
    	// 	var end_long = -122.3110052;
    	// 	var token = 'OuwRproNQLfR_1XAhlxPnhnh-GzjCGHkpHn3_UKx';
    	// 	var targetURL = baseURL+'?start_latitude='+start_lat+'&start_longitude='+start_long+'&end_latitude='+end_lat+'&end_longitude='+end_long+'&server_token='+token;
      //   $.get(targetURL, function(res) {
      //       if(res.prices.length !== 0) {
      //           html_string = res.prices;
      //       } else {
      //           html_string = "Not Found";
      //       }
      //       $('.uber').html(html_string);
      //     }, 'json');
      //     return false;
      // });
    });
  </script>
  <style>
    .wrapper{
      width: 800px;
      margin: 20px auto;
    }
    .form_input{
      width: 800px;
    }
    p{
      margin: 5px;
    }
    table{
      margin: 0px auto;
    }
    input, textarea, table, p{
      font-family: sans-serif;
    }
    input{
      width: 390px;
    }
    hr{
      margin-bottom: 30px;
    }
    </style>
</head>
<body>
  <div class='wrapper'>
    <div class='uber'></div>
    <div class='form_input'>
      <form method='post'>
        <table>
          <tr>
            <td><input type='text' class='new_longitude' name='longitude' placeholder='Insert destination longitude here...'></td>
          </tr>
          <tr>
            <td><input type='text' class='new_latitude' name='latitude' placeholder='Insert destination latitude here...'></td>
          </tr>
          <tr>
            <td align=center><input type='submit' value='Get price'></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>
</html>
