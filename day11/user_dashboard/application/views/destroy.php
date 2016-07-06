<html lang="en">
  <head>
    <title>Coureses</title>
    <style>
      p{
        font-size: 20px;
        font-weight: bold;
      }
      .wrapper{
        width: 620px;
        margin: 0px auto;
        border: 1px solid black;
      }
      .top{
        margin-left: 20px;
      }
      .display{
        width: 600px;
      }
      .button, .reset, button{
        margin-top: 10px;
        height: 30px;
        font-size: 24px;
      }
      button{
        margin-bottom: 20px;
      }
      .reset{
        margin: 20px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class='top'>
        <h2>Are you sure you want to delete the following product?</h2>
        <div class="display">
          <form action="/products/remove/<?= $product['id'] ?>" method="post">
            <p>Name: <?= $product['name'] ?></p>
            <p>Description: <?= $product['description'] ?></p>
            <p>Price: $<?= $product['price'] ?></p><br>
            <input class="button" type="submit" value="Yes! I want to delete this">
          </form>
        </div>
        <a href="/"><button>No</button></a>
      </div>
    </div><!-- end of wrapper -->
  </body>
</html>
