<?php

$db = include "../connect.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
//"UPDATE `users` SET `isAuth` = 1 where `email` = '$mail' and `password` = '$password'"
//$check = mysqli_query($db, "UPDATE `users` SET (`email`, `phone`, `password`, `idOrder`, `isAuth`) VALUES ('$email', '$phone', '$password', null, '0')");
$check = mysqli_query($db, "UPDATE `users` SET  `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$password' WHERE `id` = '$id'");

if($check == 1){
    $res = ['message' => 'ok'];
    echo json_encode($res);
}
