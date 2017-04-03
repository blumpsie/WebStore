<?php
require_once "include/smarty.php";
require_once "include/db.php";

/* 
 * Author: Mark Erickson
 */

// make sure the user is logged in
if(!isset($session->login))
{
    header("location: login.php");
    exit();
}

// make sure the user is an admin
if(!$session->login->is_admin)
{
    die("Prohibited");
}

$cancel = filter_input(INPUT_POST, 'cancel');
if (!is_null($cancel))
{
    header("location: .");
    exit();
}

// grab the name of the new category
$name = filter_input(INPUT_POST, 'name');

// get all the categories in alphabetical order
$categoryRecords = R::findAll('category', "order by name");

// put the categories in an array
foreach($categoryRecords as $category)
{
    $categories[$category->id] = $category->name;
}

try
{
    $trim_name = trim($name);
    
    // tests for the name of the new category
    if(strlen($trim_name) < 1)
    {
        throw new Exception("Name of the category must be non-empty.");
    }
    
    if(preg_match("/\d/", $trim_name))
    {
        throw new Exception("Name of the category must only be letters.");
    }
    
    $categoryExists = R::findOne('category', "name=?", [$trim_name]);
    
    if(!is_null($categoryExists))
    {
        throw new Exception("That category already exists.");
    }
    
    // everything's good, create the new category
    $category = R::dispense('category');
    
    $category->name = $trim_name;
    $id = R::store($category);
    header("location: .");
    exit();
} catch (Exception $ex) {
    $message = $ex->getMessage();
}

$data = [
    'name' => $name,
    'categories' => $categories,
    
    'message' => $message,
];
$smarty->assign($data);
$smarty->display("addCategory.tpl");