<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db = new mysqli('127.0.0.1', 'root', '', 'learn');


//print_r($db);
$result = $db->query("SELECT * FROM `products`");





$arr = [
    't1' => [],
    't2' => [],
    't3' => []
];
$index = 0;
while($data=$result->fetch_object()){

    if($data->type == 1){
        $arr['t1'][] = $data;

    } else if($data->type == 2) {
        $arr['t2'][] = $data;

    } else if($data->type == 3) {
        $arr['t3'][] = $data;

    }

    $index++;
}


echo json_encode($arr);

