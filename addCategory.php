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

// get all the categories in alphabetical order
$categoryRecords = R::findAll('category', "order by name");

// put the categories in an array
foreach($categoryRecords as $category)
{
    $categories[$category->id] = $category->name;
}

$data = [
    'name' => null,
    'categories' => $categories,
];
$smarty->assign($data);
$smarty->display("addCategory.tpl");