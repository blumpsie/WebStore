<?php
chdir(__DIR__);
require_once "../include/db.php";

$productRecords = R::findAll('product');

$categoryRecords = R::findAll('category', 'order by name');

foreach ($categoryRecords as $category) {
  echo "$category->id: $category->name\n";
}

echo "\n-------------------------\n\n";

foreach ($productRecords as $product) {
  echo "$product->id: $product->name\n";
}
