<?php


$db = include "../connect.php";
$id = $_POST['id'];

$check = mysqli_query($db, "SELECT `id_product`, `price`, `img`, `name` FROM `products` WHERE `id_catalog` = '$id'");
$catlog = mysqli_query($db, "SELECT `name` FROM `catalog` WHERE `id_catalog` = '$id'");

$catalogName = mysqli_fetch_array($catlog);

if(empty($check)){
    die('is empty');
}
$checkProductList = mysqli_fetch_all($check, 1);

$res = ['message' => 'ok', 'info' => $checkProductList, 'nameCatalog' => $catalogName[0]];

echo json_encode($res);