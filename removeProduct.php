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

$product_id = filter_input(INPUT_GET, 'product_id');
$confirm = filter_input(INPUT_GET, 'confirm');

$product = R::load('product', $product_id);

if (!$confirm)
{
    // confirm the remove
    $session->message = "Press again to confirm removal";
    $session->button_title = "Confirm Remove";
    $session->confirm = 1;
    header("location: productSelect.php?product_id=$product_id");
    exit();
}

R::trash($product);
header("location: .");