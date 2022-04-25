<?php
$db = include "../connect.php";

$id = $_POST['id'];

$check = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$id'");

if(!$check){
    dir('not found');
}

$checkUserInfo = mysqli_fetch_array($check);

$res = ['message' => 'ok', 'info' => $checkUserInfo];

echo json_encode($res);