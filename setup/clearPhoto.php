<?php
chdir(__DIR__);
require_once "../include/db.php";

echo "product id (empty to skip): ";
$product_id = trim(readline()); 
if (empty($product_id)) {
  exit();
}

$product = R::load('product', $product_id);

if ($product->id == 0) {
  die("invalid product id\n");
}

$product->photo_id = 0;
R::store($product);
