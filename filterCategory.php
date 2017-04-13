<?php
require_once "include/smarty.php";
require_once "include/db.php";

/*
 * Author: MArk Erickson
 */
$category = filter_input(INPUT_GET, "category");

$session->filterCategory_id = $category;

$filter = $session->filterCategory_id;
$products = R::findAll('product', "where category_id=$filter order by $session->product_order");

if($filter == 0)
{
    $products = R::findAll('product', "order by $session->product_order");
}

// get all the categories
$categoryRecords = R::findAll('category', 'order by name');

// put all the categories into an array
// but first!!! insert the ALL category into the array
$categories[0] = "-- ALL --";
foreach ($categoryRecords as $category)
{
    $categories[$category->id] = $category->name;
}

$data = [
    'products' => $products,
    'categories' => $categories,
];

$smarty->assign($data);
$smarty->display("index.tpl");