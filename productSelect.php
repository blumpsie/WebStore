<?php
require_once "include/smarty.php";
require_once "include/db.php";

$product_id = filter_input(INPUT_GET, 'product_id');
$product = R::load('product', $product_id);

// must enter this page with a valid $product_id
if ($product->id == 0) {
  die("no product selected");
}

// For selecting the quantity of an item to purchase
$quantities = [ "none" => "none",
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => 8,
                9 => 9,
                10 => 10,];

$data = [
  'product' => $product,
  'quantities' => $quantities,
  'quantity' => $quantity,
];
$smarty->assign($data);
$smarty->display("productSelect.tpl");

