<?php
require_once "include/smarty.php";

if (isset($session->login)) {
  header("location: .");
  exit();
}

$data = [
];
$smarty->assign( $data );
$smarty->display("login.tpl");
