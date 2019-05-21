<?php
session_start();
include 'process.php';
$condition =  $_POST['filter'];

switch($condition)
{
	case 'latestdate':
		echo 'Latest Date';
		$query = "SELECT * FROM orders ORDER BY product_date DESC";
	break;
	case 'maxprice':
		echo 'Max Price';
		$query = "SELECT * FROM orders ORDER BY subtotal_price DESC";
	break;

}

$database = new Database();
$result = $database->link->query($query);
$items  = array();
while($orders = mysqli_fetch_object($result))
{
	array_push($items,$orders);

}

$_SESSION['totalorders'] = $items;

echo '<pre>';
print_r($_SESSION['totalorders']);
header('Location:dashboard.php?parameter=vieworders');


