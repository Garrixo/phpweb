
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phone Cases</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Phone Cases</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php require_once 'list_phone_cases.php'; ?>
    </table>
    <h2>Shopping Cart</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php require_once 'list_cart_items.php'; ?>
    </table>
    <p>Total: <?php require_once 'get_cart_total.php'; ?></p>
    <a href="?checkout=1">Checkout</a>
</body>
</html>
