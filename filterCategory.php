<?php
require_once "include/smarty.php";
require_once "include/db.php";

$category = filter_input(INPUT_GET, "category");

$session->filterCategory_id = $category;

$filter = $session->filterCategory_id;
$products = R::findAll('product', "where category_id=$filter");

$data = [
    'products' => $products,
];

$smarty->assign($data);
$smarty->display("index.tpl");