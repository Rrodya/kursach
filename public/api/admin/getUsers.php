<?php

$db = include '../connect.php';

$checkUsers = mysqli_query($db, "SELECT * FROM `users`");

$usersInfo = mysqli_fetch_all($checkUsers);



$res = ['message' => 'ok', 'info' => $usersInfo];

echo json_encode($res);
