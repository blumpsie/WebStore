<?php
require_once "include/smarty.php";
require_once "include/db.php";

//$session->cart = null;  // failsafe

//echo $session;

// Get the data
$product_id = filter_input(INPUT_GET, 'product_id');
$quantity = filter_input(INPUT_GET, 'quantity');
$product = R::load('product', $product_id);

if (!isset($session->cart)) {  // or, is_null($session->cart)
  $session->cart = [];
}

// process $session->cart, storing information into $cart_data


$session->cart = [
    $product_id => $quantity,
];


//we might generate this cart info to send to the view script

$cart_info = [
    20 => [ 
        'name' => 'SanDisk microSDHCTM 16GB Memory Card', 
        'price' => 44.99, 
        'quantity' => 3
        ],
];
$total_price = 44.99 * 3;

$data = [
    'cart_info' => $cart_info,
    'total_price' => $total_price,
];
$smarty->assign($data);
$smarty->display("cart.tpl");
