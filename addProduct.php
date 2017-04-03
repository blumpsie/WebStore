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

$data = [
    'name' => null,
    'price' => null,
    'description' => null,
    'category_id' => null,
    'photo_id' => null,
    
    'categories' => $categories,
    'photos' => $photos,
];
$smarty->assign($data);
$smarty->display("addProduct.tpl");