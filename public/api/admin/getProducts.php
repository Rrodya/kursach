<?php
$db = include '../connect.php';

$check = mysqli_query($db, "SELECT * FROM `products`");

$checkProd = mysqli_fetch_all($check);

$res = ['message' => 'ok', 'info' => $checkProd];
echo json_encode($res);