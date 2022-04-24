<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
session_start();
$db = include '../connect.php';



//if(isset($_POST['id']) && isset($_POST['mail']) && isset($_POST['password'])){

    $id = $_POST['id'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $check = mysqli_query($db, "SELECT * FROM `users` where `id` = '$id' AND `email` = '$mail' AND `password` = '$password'");

    $checkAuth = mysqli_fetch_array($check);

    if($checkAuth[0]){
        $res = ['id' => $checkAuth['id'], 'message' => 'ok'];
        echo json_encode($res);
    } else {
        $res = ['message' => 'no'];
        echo json_encode($res);
    }

//}

session_destroy();

//if($_SESSION['id']){
//    $res = ['message' => 'ok', 'id' => $_SESSION['id']];
//    echo json_encode($res);
//} else {
//    $res = ['message' => 'no', 'id' => $_SESSION['id']];
//    echo json_encode($res);
//}

//if($_SESSION['isAuthIdUser'] == $_POST['id']){
//    $res = ['message' => 'ok'];
//    echo json_encode($res);
//
//} else {
//    $res = ['message' => 'no', 'id' => $_SESSION['isAuthIdUser'], 'nowId' => $_POST['id']];
//    echo json_encode($res);
//}