<?php
$db = mysqli_connect("localhost", "root", "", "news");
header('Content-type: text/html; charset=utf-8');
mysqli_set_charset($db, 'utf8');
if(!$db){
	echo "Ошибка подключения к базе данных!";
}
$url_site = "http://news/";
?>
