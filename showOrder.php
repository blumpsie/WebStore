<?php
require_once "include/smarty.php";
require_once "include/db.php";
/* 
 * Author: Mark Erickson
 */

$order_id = filter_input(INPUT_GET, 'order_id');

$order = R::load('order', $order_id);
$selections = R::findAll('selection', "order_id=?", [$order_id]);

if($order_id == 0)
{
    die("No order selected.");
}

// Calculate the subtotals for each product in the order
foreach ($selections as $selection)
{
    $subtotals[$selection->id] = $selection->quantity * $selection->product->price;
}

// initialize variable so php doesn't complain
$total = 0;

// Calculate the total price of the order
foreach ($subtotals as $subtotal)
{
    $total += $subtotal;
}
$data = [
    'selections' => $selections,
    'order' => $order,
    'subtotals' => $subtotals,
    'total' => $total,
];
$smarty->assign($data);
$smarty->display("showOrder.tpl");