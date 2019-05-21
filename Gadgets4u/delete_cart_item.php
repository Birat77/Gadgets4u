<?php
session_start();


$i = $_POST['id'];
$key = array_search($i,$_SESSION['products_id']);

unset($_SESSION['products_id'][$key]);
unset($_SESSION['products_quantity'][$key]);




$command = "<script>window.location.href='viewcart.php';</script>";


echo $command;




