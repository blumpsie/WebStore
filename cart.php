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
foreach ($session->cart as $key => $value)
{
    $cart_info = [
        $key => [ 
            'name' => $product->name, 
            'price' => $product->price, 
            'quantity' => $quantity,
            'subtotal' => $product->price * $quantity,
            ],
    ];
}

// Get the total
$total = 0;
foreach ($cart_info as $key => $value)
{
    $total += $value['subtotal'];
}
$data = [
    'cart_info' => $cart_info,
    'total' => $total,
];
$smarty->assign($data);
$smarty->display("cart.tpl");
