<?php
$db = include "../connect.php";

$id = $_POST['id'];

$check = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$id'");

$checkUserInfo = mysqli_fetch_array($check);

if(!$check){
    $res = ['message' => 'no', 'text' => 'Not found, please clear cache and localstorage'];
}

$res = ['message' => 'ok', 'info' => $checkUserInfo];

echo json_encode($res);