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
      .button{
        margin-top: 10px;
        height: 30px;
        font-size: 24px;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <h1>Edit product #<?= $product['id'] ?></h1>
      <div class="display">
        <form action="/products/update/<?= $product['id'] ?>" method="post">
          <p>Name: <input type="text" name="name" value="<?= $product['name'] ?>"></p>
          <p>Description: <input type="text" name="description" value="<?= $product['description'] ?>"></p>
          <p>Price: $<input type="text" name="price" value="<?= $product['price'] ?>"></p>
          <input class='button' type="submit" value="Update">
        </form>
      </div>
      <a href="/products/show/<?= $product['id'] ?>">Show product</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/">Go back</a>
    </div><!-- end of wrapper -->
  </body>
</html>
