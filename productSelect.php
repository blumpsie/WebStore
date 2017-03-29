<?php
require_once "include/smarty.php";
require_once "include/db.php";

$product_id = filter_input(INPUT_GET, 'product_id');

$product = R::load('product', $product_id);

// must enter this page with a valid $product_id
if ($product->id == 0) {
  die("no product selected");
}

$data = [
  'product' => $product,
];
$smarty->assign($data);
$smarty->display("productSelect.tpl");

