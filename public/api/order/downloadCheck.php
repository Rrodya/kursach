<?php

$db = include '../connect.php';
include './PHPExcel-1.8.2/Classes/PHPExcel.php';
include './PHPExcel-1.8.2/Classes/PHPExcel/Writer/Excel2007.php';
include './PHPExcel-1.8.2/Classes/PHPExcel/IOFactory.php';


$checkOrder = mysqli_query($db, "SELECT * FROM `orders`WHERE `id_user` = '$id'");
$orderCheck = mysqli_fetch_array($checkOrder);
echo $orderCheck;
$xls = PHPExcel_IOFactory::load(__DIR__ . '/template/template.xlsx');
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();

$sheet->setCellValue("F2", date("d.m.Y"));
$sheet->setCellValue("A2", $orderCheck['id_order']);
$sheet->setCellValue("B2", $orderCheck['name']);
$sheet->setCellValue("C2", $orderCheck['phone']);
$sheet->setCellValue("D2", $orderCheck['email']);
$sheet->setCellValue("E2", $orderCheck['price']);
//    $sheet->setCellValue("F".$i, $item['articul']);

header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=Отчет пользователя_".$name.".xlsx");

$objWriter = new PHPExcel_Writer_Excel2007($xls);
$objWriter->save('php://output');

header("Location: /");


$res = ['info' => $orderCheck];
echo json_encode($res);


//$orderCheck = mysqli_fetch_all($checkOrder);


$infoOrder = [];
$infoArray = [];

//print_r($orderCheck);
$idOrder = 0;
$index = 0;
//echo json_encode($orderCheck);

//foreach($orderCheck as &$item){
//    if($idOrder != $item[0]){
//        $infoOrder[$index] = $item;
//        $idOrder = $item[0];
//        $index++;
//    }
//}
//$res = ['info' => $orderCheck];
//echo json_encode($res);