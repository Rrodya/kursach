<?php
header('Access-Control-Allow-Origin: *');

$db = mysqli_connect('localhost', 'root', '', 'hokki');
return $db;
?>