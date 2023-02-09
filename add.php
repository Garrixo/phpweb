<?php
session_start();

$id = intval($_POST['id']);

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

$_SESSION['cart'][] = $id;

header('Location: index.php');
