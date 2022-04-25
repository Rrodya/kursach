<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//headers.append('Access-Control-Allow-Origin', 'http://localhost:8080');
//headers.append('Access-Control-Allow-Credentials', 'true');


//include '../connect.php';
$db = include '../connect.php';
$response = array();

if(isset($_POST['mail']) && isset($_POST['phone']) && isset($_POST['password'])){
//    $response[0]['message'] = 'ok';
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $name = $_POST['name'];
//    $db->query("INSERT INTO `users` (`mail`, `phone`, `password`, `idOrder`, `isAuth`) VALUES ('$mail', '$phone', '$password', '', '0')");
    $query = mysqli_query($db, "INSERT INTO `users` (`name`, `email`, `phone`, `password`, `idOrder`, `isAuth`) VALUES ('$name', '$mail', '$phone', '$password', null, '0')");

    $idUser = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `users` WHERE `email` = '$mail'"));
    $res = ['id' => $idUser['id'], 'message' => 'ok'];
    $response[0]['id'] = $idUser['id'];

    $response[0]['message'] = 'ok';
    echo json_encode($res);
}

//$reqData = $_POST['mail'];
//$mail = $_POST['mail'];
//$phone = $_POST['phone'];
//$password = $_POST['password'];
//
////$db->query("INSERT INTO `users` (`mail`, `phone`, `password`) VALUES ('$mail', '$phone', '$password')")
//
//    if($mail && $phone && $password){
//        $answer = ['message' => 'ok'];
//        $answer = json_encode($answer);
//
//        echo "$mail, $phone, $password";
//    }



?>