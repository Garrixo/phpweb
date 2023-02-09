<?php
session_start();

// Connect to the database
$conn = mysqli_connect("host", "username", "password", "database_name");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the shopping cart is empty
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to add an item to the shopping cart
function add_to_cart($item_id) {
    array_push($_SESSION['cart'], $item_id);
}

// Function to remove an item from the shopping cart
function remove_from_cart($item_id) {
    $index = array_search($item_id, $_SESSION['cart']);
    unset($_SESSION['cart'][$index]);
}

// Function to retrieve all items in the shopping cart
function get_cart_items() {
    $cart_items = array();
    foreach ($_SESSION['cart'] as $item_id) {
        $sql = "SELECT * FROM items WHERE id = $item_id";
        $result = mysqli_query($conn, $sql);
        $cart_items[] = mysqli_fetch_assoc($result);
    }
    return $cart_items;
}

// Function to calculate the total cost of the items in the shopping cart
function get_cart_total() {
    $total = 0;
    $cart_items = get_cart_items();
    foreach ($cart_items as $item) {
        $total += $item['price'];
    }
    return $total;
}

// Function to process the payment using a payment gateway
function process_payment($total) {
    // Implementation of the payment gateway API to process the payment
}

// Add an item to the cart
if (isset($_GET['add_to_cart'])) {
    add_to_cart($_GET['add_to_cart']);
}

// Remove an item from the cart
if (isset($_GET['remove_from_cart'])) {
    remove_from_cart($_GET['remove_from_cart']);
}

// Checkout and process the payment
if (isset($_GET['checkout'])) {
    $total = get_cart_total();
    process_payment($total);
}

// Display the shopping cart
$cart_items = get_cart_items();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php foreach ($cart_items as $item): ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td>
                    <a href="?remove_from_cart=<?php echo $item['id']; ?>">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>Total: <?php echo get_cart_total(); ?></p>
    <a href="?checkout=1">Checkout</a>
</body>
</html>

