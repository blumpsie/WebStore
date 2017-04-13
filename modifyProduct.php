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
if (!$session->login->is_admin)
{
    die("prohibited");
}

$product_id = filter_input(INPUT_GET, 'product_id');
 
$product = R::load('product', $product_id);

// Get all the photos and place them in an array
$photoRecords = R::findAll('photo', "order by name");
$photos[0] = "-- NO IMAGE --";
foreach ($photoRecords as $photo)
{
    $photos[$photo->id] = $photo->name;
}
/*
try
{
// Test to see if there are any orders with the product in it
$productSelectionRecords = R::findAll('selection', "product_id=?",[$product_id]);

echo $productSelectionRecords;
if (!is_null($productSelectionRecords))
{
    foreach ($productSelectionRecords as $selection)
    {
        $orderToRemove[] = $selection->order_id;
    }
        throw new Exception("You must remove order(s): ");
    }
} catch (Exception $ex)
{
    $message = $ex->getMessage();
    header("location: productSelect.php?product_id=$product_id");
    exit();
}
*/
$data = [
    'name' => $product->name,
    'price' => $product->price,
    'description' => $product->description,
    'category' => $product->category->name,
    'photo' => $product->photo_id,
    'product_id' => $product_id,
    'photos' => $photos,
    //'message' => $message,
];
$smarty->assign($data);
$smarty->display("modifyProduct.tpl");