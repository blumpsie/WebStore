<?php
require_once "include/smarty.php";
require_once "include/db.php";

/* 
 * Author: Mark Erickson
 */

// Get the user
$user = R::load('user', $session->login->id);

$userOrders = R::findAll('order', "where user_id=$user->id");

$data = [
    'user' => $user,
    'userOrders' => $userOrders,
];
$smarty->assign($data);
$smarty->display("myOrders.tpl");