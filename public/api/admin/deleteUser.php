<?php

$db = include '../connect.php';
$id = $_POST['id'];

$check = mysqli_query($db, "DELETE FROM `users` WHERE `id` = '$id'");

$res = ['check' => $check];

echo json_encode($res);
