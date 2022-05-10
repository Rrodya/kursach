<?php
$db = include '../connect.php';
define('FPDF_FONTPATH',"fpdf/font/");

require('fpdf/fpdf.php');

// создаем PDF документ
$pdf=new FPDF();
// устанавливаем заголовок документа
$pdf->SetTitle("Info orders last month");

// создаем страницу
$pdf->AddPage('P');
//$pdf->SetDisplayMode('real','default');

// добавляем шрифт ариал
$pdf->AddFont('Arial','','arial.php');
// устанавливаем шрифт Ариал
$pdf->SetFont('Arial');
// устанавливаем цвет шрифта
$pdf->SetTextColor(0,0,0);
// устанавливаем размер шрифта
$pdf->SetFontSize(7);

// добавляем текст



$pdf->SetXY(10, 10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"id"));
$pdf->SetXY(10, 12);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"заказа"));
$pdf->SetXY(20, 10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"id"));
$pdf->SetXY(20, 12);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"покупателя"));
$pdf->SetXY(35, 10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Имя"));
$pdf->SetXY(60, 10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Телефон"));
$pdf->SetXY(90, 10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Почтовый адрес"));
$pdf->SetXY(130, 10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Сумма покупки"));
$pdf->SetXY(160, 10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Дата заказа"));



$queryInfoOrder = mysqli_query($db, "SELECT * FROM  `orders`
WHERE `dateDay` >= now() - interval 1 month");

$orders = mysqli_fetch_all($queryInfoOrder);
$totalPrice = 0;
$height = 25;
foreach($orders as &$order){
    $idOrder = $order[0];
    $idUser = $order[1];
    $name = $order[2];
    $phone = $order[3];
    $email = $order[4];
    $price = $order[5];
    $date = $order[6];
    $totalPrice = $totalPrice + $price;
    $pdf->SetXY(10,$height);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"$idOrder"));
    $pdf->SetXY(20,$height);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"$idUser"));
    $pdf->SetXY(35,$height);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"$name"));
    $pdf->SetXY(60,$height);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"$phone"));
    $pdf->SetXY(90,$height);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"$email"));
    $pdf->SetXY(130,$height);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"$price руб."));
    $pdf->SetXY(160,$height);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"$date"));
    $height = $height + 10;
}
$pdf->SetFontSize(15);
$height = $height + 20;
$totalPrice = number_format($totalPrice, 0, '', ' ');
$pdf->SetXY(10,$height);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Общая сумма продаж за последний месяц:"));
$height = $height + 10;
$pdf->SetFontSize(20);

$pdf->SetXY(10,$height);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"$totalPrice руб."));



$queryInfoProducts = mysqli_query($db, "SELECT * FROM `productsorder` WHERE `id_order` = '$idOrder'");

$products = mysqli_fetch_all($queryInfoProducts);

$articul = $products[2];
$nameProd = $products[3];
$priceProd = $products[4];
$countProd = $products[5];

$pdf->Output('iskspb.ru.pdf','I');
