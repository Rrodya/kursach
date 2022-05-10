<?php

$db = include '../connect.php';
$str = $_POST['str'];
$checkUsers = mysqli_query($db, "SELECT * FROM `users` LIMIT 0, $str");

$usersInfo = mysqli_fetch_all($checkUsers);



$res = ['message' => 'ok', 'info' => $usersInfo];

echo json_encode($res);
