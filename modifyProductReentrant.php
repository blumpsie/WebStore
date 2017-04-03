<?php
require_once "include/smarty.php";
require_once "include/db.php";
/* 
 * Author: Mark Erickson
 */

if (isset($session->login))
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
$category = filter_input(INPUT_POST, 'cstegory');
$price = filter_input(INPUT_POST, 'price');
$description = filter_input(INPUT_POST, 'description');
$photo = filter_input(INPUT_POST, 'photo');

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
    
    if (!is_null($productWithName) && $productWithTitle->id != $book->id)
    {
        throw new Exception("Product with that name already exists");
    }
    
    $trim_price = trim($price);
    
    // Test for price
    if (!preg_match("/(?:\d*\.)?\d+/", $trim_price))
    {
        throw new Exception("The price must be a non-negative number");
    }
    
    // Test for category
    if (is_null($category))
    {
        throw new Exception("Must select a category for the product");
    }
    
    $product->name = $trim_name;
    $product->category_id = $category;
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
    'category' => $category,
    'price' => $price,
    'description' => $description,
    'photo' => $photo,
    'product_id' => $product_id,
    
    'categories' => $categories,
    'photos' => $photos,
    
    'message' => $message,
];
$smarty->assign($data);
$smarty->display("modifyProduct.tpl");