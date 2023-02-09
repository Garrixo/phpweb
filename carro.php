<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
  header('Location: index.php');
  exit;
}

$phone_cases = [
  1 => [
    'name' => 'Phone Case 1',
    'price' => 10.99
  ],
  2 => [
    'name' => 'Phone Case 2',
    'price' => 12.99
  ],
  3 => [
    'name' => 'Phone Case 3',
    'price' => 9.99
  ],
];

$total = 0;

foreach ($_SESSION['cart'] as $id) {
  $total += $phone_cases[$id]['price'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="styleheet" type="text/css" href="style.css">

<title>Shopping Cart</title>
</head>
<body>
<header>
  <a href="index.php">Phone Cases</a>
  <img src="shopping-cart.png" alt="Shopping Cart">
</header>
<main>
  <table>
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['cart'] as $id): ?>
      <tr>
        <td><?php echo $phone_cases[$id]['name']; ?></td>
        <td><?php echo $phone_cases[$id]['price']; ?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td>Total:</td>
        <td><?php echo $total; ?></td>
      </tr>
    </tbody>
  </table>
  <form action="pago.php" method="post">
    <input type="hidden" name="total" value="<?php echo $total; ?>">
    <input type="submit" value="Checkout">
  </form>
</main>
</body>
</html> 

