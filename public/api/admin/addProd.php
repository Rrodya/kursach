<?php

$db = include '../connect.php';
$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['description'];
$articul = $_POST['articul'];
$img = $_POST['img'];
$catalog = $_POST['catalog'];

$check = mysqli_query($db, "INSERT INTO `products` (`name`, `price`, `id_catalog`, `articul`, `description`, `img`) VALUES ('$name', '$price', '$catalog', '$articul', '$desc', '$img')");


if($check){
    $res = ['message' => 'ok'];
    echo json_encode($res);
} else {
    $res = ['message' => 'no'];
    echo json_encode($res);

}