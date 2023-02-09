<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Phone Cases</title>
</head>
<body>
  <header>
    <h1>Phone Cases</h1>
    <a href="carro.php"><img src="shopping-cart.png" alt="Shopping Cart"></a>
  </header>
  <main>
    <div class="phone-case">
      <img src="phone-case-1.jpg" alt="Phone Case 1">
      <h2>Phone Case 1</h2>
      <form action="add.php" method="post">
        <input type="hidden" name="id" value="1">
        <input type="submit" value="Add to Cart">
      </form>
    </div>
    <div class="phone-case">
      <img src="phone-case-2.jpg" alt="Phone Case 2">
      <h2>Phone Case 2</h2>
      <form action="add.php" method="post">
        <input type="hidden" name="id" value="2">
        <input type="submit" value="Add to Cart">
      </form>
    </div>
    <div class="phone-case">
      <img src="phone-case-3.jpg" alt="Phone Case 3">
      <h2>Phone Case 3</h2>
      <form action="add.php" method="post">
        <input type="hidden" name="id" value="3">
        <input type="submit" value="Add to Cart">
      </form>
    </div>
  </main>
</body>
</html>
