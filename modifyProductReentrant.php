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

$product_id = filter_input(INPUT_POST, 'product_id');
$cancel =filter_input(INPUT_POST, 'cancel');

if (!is_null($cancel))
{
    header("location: productSelect.php?product_id=$product_id");
    exit();
}

$product = R::load('product', $product_id);

$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');
$description = filter_input(INPUT_POST, 'description');
$photo = filter_input(INPUT_POST, 'photo');

$category = R::load('category', $product->category_id);

// Get all the photos and place them in an array
$photoRecords = R::findAll('photo', "order by name");
$photos[0] = "-- NO IMAGE --";
foreach ($photoRecords as $photoA)
{
    $photos[$photoA->id] = $photoA->name;
}

try
{
    $trim_name = trim($name);
    
    // Tests for the name of the product
    if (strlen($trim_name) < 3)
    {
        throw new Exception("Name of the Product must be at least 3 "
                            . "characters in length");
    }
    
    $productWithName = R::findOne('product', "name=?", [$trim_name]);
    
    if (!is_null($productWithName) && $productWithName->id != $product->id)
    {
        throw new Exception("Product with that name already exists");
    }
    
    // Test for the price of the product
    $trim_price = trim($price);
    
    // Test for price
    if (!preg_match("/(?:\d*\.)?\d+/", $trim_price))
    {
        throw new Exception("The price must be a non-negative number");
    }
    
    // Test to see if there are any orders with the product in it
    $productSelectionRecords = R::findAll('selection', "product_id=?",[$product->id]);
    
    if (!is_null($productSelectionRecords))
    {
        foreach ($productSelectionRecords as $selection)
        {
            $orderToRemove[] = $selection->order_id;
        }
        throw new Exception("You must remove order(s): ");
    }
    $product->name = $trim_name;
    $product->category_id = $category->id;
    $product->price = $trim_price;
    $product->description = $description;
    $product->photo_id = $photo;
    
    // show the page for the added product
    $id = R::store($product);
    header("location: productSelect.php?product_id=$id");
    exit();
    
} catch (Exception $ex) {
    $message = $ex->getMessage();
}

$data = [
    'name' => $name,
    'category' => $category->name,
    'price' => $price,
    'description' => $description,
    'photo' => $photo,
    'product_id' => $product_id,
    
    'photos' => $photos,
    
    'message' => $message,
];
$smarty->assign($data);
$smarty->display("modifyProduct.tpl");