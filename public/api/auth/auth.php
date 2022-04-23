<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db = include '../connect.php';
$response = array();

if(isset($_POST['mail']) && isset($_POST['password'])){
    $response[0]['message'] = 'ok';
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $query = mysqli_query($db, "SELECT count(*) FROM `users` where `login` = '$login' AND `password` = '$password'");

}

if(mysqli_fetch_array($query)[0] == 1){
    $idUser = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `users` WHERE `email` = '$mail'"));
    $res = ['id' => $idUser['id'], 'message' => 'ok'];
    echo json_encode($res);
} else {
    $res = ['message' => 'no'];
    echo json_encode($res);
}