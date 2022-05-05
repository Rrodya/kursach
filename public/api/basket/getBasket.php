<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$db = include '../connect.php';

//$body = json_decode($_POST['basketInfo']);

$str = $_POST['str'];
$body = explode(',', $str);

$resBody = [];
$index = 0;

foreach($body as &$item){
    $check = mysqli_query($db, "SELECT `id_product`, `name`,  `img`, `description`, `price` FROM `products` WHERE `id_product` = '$item'");
    $checkBasket = mysqli_fetch_array($check);

//    $checkBasket['description'] = substr($checkBasket['description'], 0, 35);
    $resBody[$index] = $checkBasket;
    $index++;
}

$res = ['message' => 'ok', 'info' => $resBody];
echo json_encode($res);



//$res = ['message' => 'ok'];

//$data = json_decode();

//echo json_encode($res);

