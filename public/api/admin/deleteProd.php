<?php

$db = include "../connect.php";
$id = $_POST['id'];

$idOrder = mysqli_query($db, "SELECT `id_order` FROM `orderingproducts` WHERE `id_product` = '$id'");
$idOrder = mysqli_fetch_array($idOrder)[0];
$deleteOrder = mysqli_query($db, "DELETE FROM `orders` WHERE `id_order` = '$idOrder'");

$checkOrderingProd = mysqli_query($db, "DELETE FROM `orderingproducts` WHERE `id_product` = '$id'");



$check = mysqli_query($db, "DELETE FROM `products` WHERE `id_product` = '$id'");


$res = ['check' => $check];

echo json_encode($res);
