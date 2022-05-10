<?php


$db = include '../connect.php';
$str = $_POST['str'];


//$checkOrder = mysqli_query($db, "SELECT * FROM `orders`, `orderingproducts` WHERE `orders`.`id_order` = `orderingproducts`.`id_order`");
$checkOrder = mysqli_query($db, "SELECT * FROM `orders`, `orderingproducts`, `products` WHERE `orders`.`id_order` = `orderingproducts`.`id_order` AND `orderingproducts`.`id_product` = `products`.`id_product` LIMIT 0, $str");
$orderCheck = mysqli_fetch_all($checkOrder);

$infoOrder = [];
$infoArray = [];

//print_r($orderCheck);
$idOrder = 0;
$index = 0;
//echo json_encode($orderCheck);

foreach($orderCheck as &$item){
    if($idOrder != $item[0]){
        $infoOrder[$index] = $item;
        $idOrder = $item[0];
        $index++;
    }
//    if($idOrder == $item[0]){
//        $infoOrder[$index][6] = $item[7];
//    }
}
$res = ['info' => $infoOrder];
echo json_encode($res);
//$orderIndex = 0;
//
//foreach($orderCheck as &$item){
//
//
//    if($idOrder != $item[0]){
//        $idOrder = $item[0];
//        if(!$infoOrder[$orderIndex]['id']){
//            $infoOrder[$orderIndex]['id'] = $item[0];
//            $infoOrder[$orderIndex]['user']['id'] = $item[2];
//            $infoOrder[$orderIndex]['user']['name'] = $item[2];
//            $infoOrder[$orderIndex]['user']['phone'] = $item[3];
//            $infoOrder[$orderIndex]['user']['email'] = $item[4];
//            $infoOrder[$orderIndex]['price'] = $item[5];
//        }
//    }
//    if($index == 0){
//        $idOrder = $item[0];
//    }
//    $infoOrder[$orderIndex]['products'][$index]['id'] = $item[6];
//    $infoOrder[$orderIndex]['products'][$index]['articul'] = $item[11];
//    if($idOrder != $item[0] || $orderIndex == 0){
//        $orderIndex++;
//    }
//
//
//    echo $orderIndex;
//    $index++;
//
//}



$idOrderList = [];


//foreach($orderCheck as &$item){
//    $idOrder = $item[0];
//    if($idOrder == $item[0]){
//
//        $infoOrder[$idOrder]['products'][$index]['id'] = $item[6];
//        $infoOrder[$idOrder]['products'][$index]['articul'] = $item[11];
//
//        if(!$infoOrder[$idOrder]['id']){
//            array_push($idOrderList, $index);
//
//            $infoOrder[$idOrder]['id'] = $item[0];
//            $infoOrder[$idOrder]['user']['id'] = $item[2];
//            $infoOrder[$idOrder]['user']['name'] = $item[2];
//            $infoOrder[$idOrder]['user']['phone'] = $item[3];
//            $infoOrder[$idOrder]['user']['email'] = $item[4];
//            $infoOrder[$idOrder]['price'] = $item[5];
//        }
//    }
//    $index++;
//}
//
//$res = ['idOrders' => $idOrderList, 'info' => $infoOrder];
//echo json_encode($res);

//foreach($orderCheck as &$item){
//    $idOrder = $item[0];
//
//    $checkOrderProducts = mysqli_query($db, "SELECT * FROM `orderingproducts` WHERE `id_order` = '$idOrder'");
//
//    $productorderingCheck = mysqli_fetch_array($checkOrderProducts);
//
//    print_r($productorderingCheck);
//
//    echo "<br/>";
//    echo "<br/>";
//
//
////    print_r($productorderingCheck[1]);
//
////    foreach($productorderingCheck as &$itemProduct){
////        print_r($itemProduct);
////    }
//}


//
//
//$idProducts = $productorderingCheck['id_products'];
//
//$productsCheck = mysqli_query($db, "SELECT * FROM `products` WHERE `id_products` = '$idProducts'");
//
//$infoProducts = mysqli_fetch_all($productsCheck);


//print_r($orderCheck);
//print_r($infoProducts);
//$res = ['message' => 'ok', 'id_order' => $orderCheck['id']]