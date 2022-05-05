<?php
$db = include '../connect.php';

include './PHPExcel-1.8.2/Classes/PHPExcel.php';
include './PHPExcel-1.8.2/Classes/PHPExcel/Writer/Excel2007.php';
include './PHPExcel-1.8.2/Classes/PHPExcel/IOFactory.php';
$id = $_POST['id'];
$checkOrder = mysqli_query($db, "SELECT * FROM `orders`WHERE `id_user` = '$id'");
$orderCheck = mysqli_fetch_array($checkOrder);
//if($_POST['username']!=""){
    $xls = PHPExcel_IOFactory::load(__DIR__ . '/template.xlsx');
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();


    $sheet->setCellValue("B1", date("d.m.Y"));
    $idx = 0;

    foreach($orderCheck as $item){
        $sheet->setCellValue("D3", $item['id_order']);
        $sheet->setCellValue("A".$idx, $item['name']);
        $sheet->setCellValue("B".$idx, $item['phone']);
        $sheet->setCellValue("С".$idx, $item['email']);
        $sheet->setCellValue("E".$idx, $item['price']);
    //    $sheet->setCellValue("F".$i, $item['articul']);
        $idx++;
    }

//    $name = str_replace(" ","_",$_POST['username']);

    header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=Отчет пользователя_".$name.".xlsx");

    $objWriter = new PHPExcel_Writer_Excel2007($xls);
    $objWriter->save('php://output');

    header("Location: /");
//}
