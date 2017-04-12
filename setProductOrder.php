<?php
require_once "include/smarty.php";
require_once "include/db.php";

/* 
 * Author: Mark Erickson
 */

// get the field for ordering
$field = filter_input(INPUT_GET, 'field');

// assign the field to the product_order
$session->product_order = $field;

$order = $session->product_order;

// show all the products using which order the user has selected
$products = R::findAll('product', "where category_id=$session->filterCategory_id order by $order");

if($session->filterCategory_id == 0)
{
    $products = R::findAll('product', "order by $session->product_order");
}
// get all the categories
$categoryRecords = R::findAll('category', "order by name");

// put all the categories into an array
// but first!!! insert the ALL category into the array
$categories[0] = "-- ALL --";
foreach ($categoryRecords as $category)
{
    $categories[$category->id] = $category->name;
}

// send the data back to the smarty templates
$data = [
    'products' => $products,
    'categories' => $categories,
];
$smarty->assign($data);
$smarty->display("index.tpl");