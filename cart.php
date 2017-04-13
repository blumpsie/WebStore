<?php
require_once "include/smarty.php";
require_once "include/db.php";

//$session->cart = null;  // failsafe

//echo $session;

// Get the data
$product_id = filter_input(INPUT_GET, 'product_id');
$quantity = filter_input(INPUT_GET, 'quantity');

$hasItems = true;
if (!isset($session->cart)) {  // or, is_null($session->cart)
  $session->cart = [];
  $hasItems = false;
}

// process $session->cart, storing information into $cart_data
if (!is_null($product_id) && $quantity == 0)
{
    unset($session->cart[$product_id]);
    if ($session->cart == [])
    {
        $hasItems = false;
    }
}

if(!is_null($product_id) && $quantity != 0)
{
    $session->cart[$product_id] = $quantity;
}

// Initialize the array otherwize PHP will throw a hissy fit
$cart_info = [];

//we might generate this cart info to send to the view script
foreach ($session->cart as $key => $value)
{
    $product = R::load('product', $key);
    $cart_info[$key]= [ 
            'name' => $product->name, 
            'price' => $product->price, 
            'quantity' => $value,
            'subtotal' => $product->price * $value,
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
    'hasItems' => $hasItems,
];
$smarty->assign($data);
$smarty->display("cart.tpl");
