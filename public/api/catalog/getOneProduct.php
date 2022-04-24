<?php


$db = include '../connect.php';
$id = $_POST['id'];



$check = mysqli_query($db, "SELECT * FROM `products` WHERE `id_product` = '$id'");

if(!$check){
    die('is empty');
}


$checkOneProduct = mysqli_fetch_array($check);

$res = ['message' => 'ok', 'info' => $checkOneProduct];

echo json_encode($res);