<?php
require_once "include/smarty.php";
require_once "include/db.php";

/* 
 * Author: Mark Erickson 
 */

// Checks if user is logged in
if (!isset($session->login))
{
    header("location: login.php");
    exit();
}

// Checks if user is an admin
if (!$session->login->is_admin)
{
    die("Prohibited");
}

// Get the categories and put them in an array
$categoryRecords = R::findAll('category', "order by name");
$categories[0] = "-- SELECT --";
foreach ($categoryRecords as $category)
{
    $categories[$category->id] = $category->name;
}

// Get the image names and place them in an array
$photoRecords = R::findAll('photo', "order by name");
$photos[0] = "-- NO IMAGE --";
foreach ($photoRecords as $photo)
{
    $photos[$photo->id] = $photo->name;
}

// Setup the cancel button
$cancel = filter_input(INPUT_POST, 'cancel');
if (!is_null($cancel))
{
    header("location: .");
    exit();
}

// Get the data
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');
$description = filter_input(INPUT_POST, 'description');
$category = filter_input(INPUT_POST, 'category');
$photo = filter_input(INPUT_POST, 'photo');

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
    
    if (!is_null($productWithName))
    {
        throw new Exception("Product with that name already exists");
    }
    
    $trim_price = trim($price);
    
    // Test for price
    if (!preg_match("/\d+\.\d{0,2}/", $trim_price))
    {
        throw new Exception("The price must be either an integer or a decimal with 0-2 places");
    }
    
    // Test for category
    if ($category == 0)
    {
        throw new Exception("Must select a category for the product");
    }
    
    // product is good
    // so add to database
    $product = R::dispense('product');
    
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
    
    'categories' => $categories,
    'photos' => $photos,
    
    'message' => $message,
];
$smarty->assign($data);
$smarty->display("addProduct.tpl");