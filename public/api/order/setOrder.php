<?php

$db = include '../connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone= $_POST['phone'];

$idProducts = $_POST['idProducts'];
$price = $_POST['price'];

$queryInsertOrder = mysqli_query($db, "INSERT INTO `orders` (`id_user`, `name`, `phone`, `email`, `price`) VALUES ('$id', '$name', '$phone', '$email', '$price')");
//if(!$queryInsertOrder){
//    $res = ['message2'     => 'no', 'info' => $queryInsertOrder];
//    echo json_encode($res);
//}


$checkInfoOrder = mysqli_query($db, "SELECT `id_order` FROM `orders` WHERE `id_user` = '$id'");
$idOrder = mysqli_fetch_all($checkInfoOrder);
$idOrder = $idOrder[count($idOrder) - 1];



$arrIdProducts = explode(',', $idProducts);
foreach($arrIdProducts as &$item){
    $queryInsertOrderProduct = mysqli_query($db, "INSERT INTO `orderingproducts` (`id_order`, `id_product`) VALUES ('$idOrder[0]', '$item')");
}

//

//
$subject = "=?utf-8?B?".base64_encode("Тестовое сообщение")."?=";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html;charset=uft-8\r\n";
$message = "<h3>Здравствуйте $name.</h3> <br/> <p>Спасибо вам за ваш заказ, вы можете запбрать через 10 календарных дней в ближайшем складе от вас. ID вашего заказа: <b>$idOrder[0]</b>. <br/> Заказ на общую сумму: <b>$price ₽</b></p>";
mail($email, $subject, $message, $headers);

$res = ['message' => 'ok', 'idOrder' => $idOrder[0]];
echo json_encode($res);



