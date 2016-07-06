<html>
<head>
  <title>Counter Demo</title>
  <style type="text/css">
    body{
      text-align: center;
    }
    .board{
      font-size: 30px;
      padding: 20px;
      border: 1px solid silver;
      width: 50px;
      margin: 10px auto;
    }
  </style>
</head>
<body>
  <p>You visited this site <div class='board'><?= $counter; ?></div> times.</p>
  <a href="./welcome/reset"><button>Reset</button></a>
</body>
</html>
