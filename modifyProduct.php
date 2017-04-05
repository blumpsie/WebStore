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

// Get the categories and place them in an array
$categoryRecords = R::findAll('category', "order by name");
$categories[0] = "-- SELECT --";
foreach ($categoryRecords as $category)
{
    $categories[$category->id] = $category->name;
}

// Get all the photos and place them in an array
$photoRecords = R::findAll('photo', "order by name");
$photos[0] = "-- NO IMAGE --";
foreach ($photoRecords as $photo)
{
    $photos[$photo->id] = $photo->name;
}

$data = [
    'name' => $product->name,
    'price' => $product->price,
    'description' => $product->description,
    'category' => $product->category->name,
    'photo' => $product->photo_id,
    'product_id' => $product_id,
    
    'categories' => $categories,
    'photos' => $photos,
];
$smarty->assign($data);
$smarty->display("modifyProduct.tpl");