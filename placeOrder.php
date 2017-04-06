<?php
require_once "include/smarty.php";
require_once "include/db.php";

/* 
 * Author: Mark Erickson
 */

if (!isset($session->login))
{
    header("location: login.php");
    exit();
}

$user = R::load('user', $session->login->id);
$theCart = $session->cart;

// Store the order in the database
$order = R::dispense('order');
$order->user_id = $user->id;
$order->created_at = date("Y-m-d", time());
$id = R::store($order);

// Store the selections in the database
foreach ($session->cart as $key => $value)
{
    $selection = R::dispense('selection');
    $selection->order_id = $id;
    $selection->product_id = $key;
    $selection->quantity = $value;
    R::store($selection);
}

$session->cart = [];

header("location: myOrders.php");
exit();
