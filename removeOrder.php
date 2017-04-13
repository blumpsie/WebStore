<?php
require_once "include/session.php";
require_once "include/db.php";
/* 
 * Author: Mark Erickson
 */

if (!isset($session->login))
{
    header("location: login.php");
    exit();
}

if (!$session->login->is_admin)
{
    die("Prohibited");
}

$order_id = filter_input(INPUT_GET, 'order_id');
$confirm =filter_input(INPUT_GET, 'confirm');

$order = R::load('order', $order_id);
$selections = R::findAll('selection', "order_id=?", [$order_id]);

if (!$confirm)
{
    // confirm the remove
    $session->message = "Press again to confirm removal";
    $session->button_title = "Confirm Remove";
    $session->confirm = 1;
    header("location: showOrder.php?order_id=$order_id");
    exit();
}

// Remove the product selections from the selection table
foreach ($selections as $selection)
{
    R::trash($selection);
}

// Remove the order from the order table
R::trash($order);
$session->message = "Order #$order_id was successfully removed.";
header("location: allOrders.php");