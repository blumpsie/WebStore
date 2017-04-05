<?php
require_once "include/smarty.php";
require_once "include/db.php";

/* 
 * Author: Mark Erickson
 */

// Get all the orders
$orders = R::findAll('order');

$data = [
    'orders' => $orders,
];
$smarty->assign($data);
$smarty->display("allOrders.tpl");