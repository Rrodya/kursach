<?php

$db = include '../connect.php';

$check = mysqli_query($db, "SELECT * FROM `catalog`");

$checkCatalog = mysqli_fetch_all($check, 1);

$res = ['message' => 'ok', 'info' => $checkCatalog];

echo json_encode($res);