<html lang="en">
  <head>
    <title>Semi-RESTful Routes</title>
    <style>
      p{
        font-size: 20px;
        font-weight: bold;
      }
      .wrapper{
        width: 400px;
        margin: 0px auto;
        border: 1px solid black;
        padding: 20px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <h1>Product #<?= $product['id'] ?></h1>
      <div class="display">
        <p>Name: <?= $product['name'] ?></p>
        <p>Description: <?= $product['description'] ?></p>
        <p>Price: $<?= $product['price'] ?></p>
        <br><a href="/products/edit/<?= $product['id'] ?>">Edit product</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/">Go back</a>
      </div>
    </div><!-- end of wrapper -->
  </body>
</html>
