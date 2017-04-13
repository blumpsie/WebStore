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
$productSelectionRecords = R::findAll('selection', "product_id=?", [$product->id]);
$count = 0;

if (($productSelectionRecords) != null)
{
    foreach ($productSelectionRecords as $selection)
    {
        $ordersToRemove .= (String)$selection->order_id;
        if($count < count($productSelectionRecords)-1)
        {
            $ordersToRemove .= ", ";
        }
        $count++;
    }
    
    $session->message = "You must remove order(s): $ordersToRemove";
    header("location: productSelect.php?product_id=$product_id");
    exit();
}

$data = [
    'name' => $product->name,
    'price' => $product->price,
    'description' => $product->description,
    'category' => $product->category->name,
    'photo' => $product->photo_id,
    'product_id' => $product_id,
    'photos' => $photos,
];
$smarty->assign($data);
$smarty->display("modifyProduct.tpl");