<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db = include '../connect.php';
$response = array();

if(isset($_POST['mail']) && isset($_POST['password'])){
    $response[0]['message'] = 'ok';
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $check = mysqli_query($db, "SELECT * FROM `users` where `email` = '$mail' AND `password` = '$password'");

    if (!$check) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }

    $checkResult = mysqli_fetch_array($check);



//    $res[0]['error'] = mysqli_fetch_array($check);
    if($checkResult){
        if($checkResult['is_admin'] == 1){
            $res = ['message' => 'ok', 'id' => $checkResult['id'], 'isAdmin' => $checkResult['is_admin']];
            echo json_encode($res);
        } else {
            $query = mysqli_query($db, "UPDATE `users` SET `isAuth` = 1 where `email` = '$mail' and `password` = '$password'");
            $_SESSION['id'] = $checkResult[0];
            $response = ['id' => mysqli_fetch_array($check)['id'], 'message' => 'ok', 'sessionId' => $_SESSION['id']];
            $res = ['first' => $_SESSION['id'], 'id' => $checkResult['id'], 'message' => 'ok', 'mail' => $checkResult['email'], 'password' => $checkResult['password']];
            echo json_encode($res);
        }

    } else {
        $res= ['message' => 'no'];
        echo json_encode($res);
    }

}

session_destroy();


//if(mysqli_fetch_array($query)[0] == 1){
//    $idUser = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `users` WHERE `email` = '$mail'"));
//    $res = ['id' => $idUser['id'], 'message' => 'ok'];
//    echo json_encode($res);
//} else {
//    $res = ['message' => 'no'];
//    echo json_encode($res);
//}