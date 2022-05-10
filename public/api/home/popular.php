<?php
$db = include '../connect.php';

$str = $_POST['str'];
//$strMax = $str * 20;
//$strMin = $strMax  - 19;

$check = mysqli_query($db, "SELECT `id_product`, `img` FROM `products` WHERE `isPopular` = '1'");
if(empty($check)){
    die('is empty');
}
$checkProd = mysqli_fetch_all($check, 1);

if($checkProd[0]){
    $res = ['message' => 'ok', 'info' => $checkProd];
    echo json_encode($res);
}