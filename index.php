<?php
require_once "include/smarty.php";
require_once "include/db.php";

$categoryRecords = R::findAll('category', 'order by name');
$categories[0] = "-- ALL --";
foreach($categoryRecords as $category) {
  $categories[$category->id] = $category->name;
}

//print_r($categories);

$products = R::findAll('product');

$data = [
  'products' => $products,
  'categories' => $categories,
];
$smarty->assign($data);
$smarty->display("index.tpl");

