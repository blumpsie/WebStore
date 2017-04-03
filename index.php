<?php
require_once "include/smarty.php";
require_once "include/db.php";

$categoryRecords = R::findAll('category', 'order by name');
$categories[0] = "-- ALL --";
foreach($categoryRecords as $category) {
  $categories[$category->id] = $category->name;
}
// the default ordering for products is by name
//$products = R::findAll('product', "order by name");
//print_r($categories);

if (!isset($session->product_order))
{
    $session->product_order = 'name';
}

if(!isset($session->filterCategory_id))
{
    $session->filterCategory_id = 0;
}

$products = R::findAll('product', "where category_id=$session->filterCategory_id order by $session->product_order");
$data = [
  'products' => $products,
  'categories' => $categories,
];
$smarty->assign($data);
$smarty->display("index.tpl");

