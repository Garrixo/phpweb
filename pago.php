<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

// Replace these values with your own client ID and secret.
$apiContext = new ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
    'YOUR_CLIENT_ID',
    'YOUR_CLIENT_SECRET'
  )
);

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$items = [];
foreach ($_SESSION['cart'] as $id) {
  $item = new Item();
  $item->setName($phone_cases[$id]['name'])
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setPrice($phone_cases[$id]['price']);
  $items[] = $item;
}

$itemList = new ItemList();
$itemList->setItems($items);

$details = new Details();
$details->setShipping(0)
  ->setTax(0)
  ->setSubtotal(array_sum(array_column($items, 'price')));

$amount = new Amount();
$amount->setCurrency('USD')
  ->setTotal(array_sum(array_column($items, 'price')))
  ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
  ->setItemList($itemList)
  ->setDescription('Phone cases purchase')
  ->setInvoiceNumber(uniqid());

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://localhost/checkout/success.php')
  ->setCancelUrl('http://localhost/checkout/cancel.php');

$payment = new Payment();
$payment->setIntent('sale')
  ->setPayer($payer)
  ->setRedirectUrls($redirectUrls)
  ->setTransactions([$transaction]);

try {
  $payment->create($apiContext);
  header('Location: ' . $payment->getApprovalLink());
  exit;
} catch (PayPalConnectionException $e) {
  echo 'Error: ' . $e->getMessage();
}
