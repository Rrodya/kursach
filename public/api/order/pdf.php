<?php
$id = $_GET['id'];

$db = include '../connect.php';

$getInfo = mysqli_query($db, "SELECT * FROM `orders` WHERE `id_user` = '$id'");
$infoOorder = mysqli_fetch_all($getInfo);
$infoOrder = $infoOorder[count($infoOorder) - 1];
$id_order = $infoOrder[0];
$getInfoProducts = mysqli_query($db, "SELECT * FROM `productsorder` WHERE `id_order` = '$id_order'");

$infoProductsOrder = mysqli_fetch_all($getInfoProducts);
$name = $infoOrder[2];
$phone = $infoOrder[3];
$email = $infoOrder[4];
$totalPrice = $infoOrder[5];


// подключаем шрифты
define('FPDF_FONTPATH',"fpdf/font/");
// подключаем библиотеку
require('fpdf/fpdf.php');

// создаем PDF документ
$pdf=new FPDF();
// устанавливаем заголовок документа
$pdf->SetTitle("Info order");

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

// добавляем текст
$pdf->SetFontSize(25);

$pdf->SetXY(150,10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Чек заказа"));
$pdf->SetFontSize(15);

$pdf->SetXY(10,10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Номер заказа: $id_order"));
$pdf->SetXY(10,20);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Имя заказчика: $name"));
$pdf->SetXY(10,30);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Номер телефона: $phone"));
$pdf->SetXY(10, 40);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Почтовый адрес: $email"));
$pdf->SetFontSize(20);
$pdf->SetXY(10, 60);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Инфомрация о товарах"));
$pdf->SetFontSize(10);
$height = 80;
$width = 10;
$arrInfoTop = [
    'name' => 'Название',
    'articul' => 'Артикул',
    'price' => 'Цена',
    'count' => 'Кол-во'
];
$arrInfo = ['Название', 'Артикул', 'Цена(руб)', 'Кол-во'];
for($i = 0; $i < 4; $i++){
    $pdf->SetXY($width, 70);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"$arrInfo[$i]"));
    $width = $width + 50;
}
$arrayCount = [3, 2, 4, 5];
for($i = 0; $i < count($infoProductsOrder); $i++){
    $width = 10;
    $arr = $infoProductsOrder[$i];
    foreach($arrayCount as &$idx){
        $pdf->SetXY($width, $height);
        $pdf->Write(0,iconv('utf-8', 'windows-1251',"$arr[$idx]"));
        $width = $width + 50;
    }
    $height = $height + 10;
}

$pdf->SetFontSize(15);
$pdf->SetXY(10, $height + 10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Итоговая цена: $totalPrice рублей"));



// добавляем на страницу изображение
//$pdf->Image(dirname(__FILE__) .'/logo.jpg', 100, 250, 100, 49, 'JPG');

// выводим документа в браузере
$pdf->Output('iskspb.ru.pdf','I');

// сохранение документ в папку save
//$pdf->Output('save/'.date("Y-m-d H:i:s").' - iskspb.ru.pdf','F');

?>