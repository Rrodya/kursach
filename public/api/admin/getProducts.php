<?php
$db = include '../connect.php';
$str = $_POST['str'];
$check = mysqli_query($db, "SELECT * FROM `products` ORDER BY `id_product` DESC LIMIT 0, $str");

$checkProd = mysqli_fetch_all($check);

$res = ['message' => 'ok', 'info' => $checkProd];
echo json_encode($res);