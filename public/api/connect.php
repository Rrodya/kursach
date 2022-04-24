<?php
header('Access-Control-Allow-Origin: *');

$db = mysqli_connect('127.0.0.1', 'root', '', 'hokki');
return $db;
?>