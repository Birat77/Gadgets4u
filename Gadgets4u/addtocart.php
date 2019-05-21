<?php
session_start();




if(empty($_SESSION['products_id']))

{
	$_SESSION['products_id'] = array();
	$_SESSION['products_quantity'] = array();
}
if(!in_array($_GET['id'], $_SESSION['products_id']))
{
array_push($_SESSION['products_id'],$_GET['id']);
array_push($_SESSION['products_quantity'],1);
}


echo "<script> window.history.back();</script>";






?>
