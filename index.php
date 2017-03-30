<?php
require_once "include/smarty.php";
require_once "include/db.php";

$categoryRecords = R::findAll('category', 'order by name');
$categories[0] = "-- ALL --";
foreach($categoryRecords as $category) {
  $categories[$category->id] = $category->name;
}

//print_r($categories);

// the default ordering for products is by name
$products = R::findAll('product', "order by name");

// makes the chosen order stay when the user clicks home
if (isset($session->product_order))
{
    $products = R::findAll('product', "order by $session->product_order");
}

$data = [
  'products' => $products,
  'categories' => $categories,
];
$smarty->assign($data);
$smarty->display("index.tpl");

