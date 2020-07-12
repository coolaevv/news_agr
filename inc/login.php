<?php
require_once ("../server/connect_db.php");
session_start();

$login = trim(htmlspecialchars($_POST['login']));
$pswd = trim(htmlspecialchars(md5($_POST['pswd'])));
$date = date('d.m.Y'); //дата
$time = date('H:i:s'); //время
$u_ip = $_SERVER['REMOTE_ADDR'];

$sql_check_user = "SELECT `email` FROM `users` WHERE `email` = '$login'";
$check_query = mysqli_query($db, $sql_check_user);

if(mysqli_num_rows($check_query) > 0){
	$sql_check_pswd = "SELECT `pswd` FROM `users` WHERE `pswd` = '$pswd'";
	$check_query_pswd = mysqli_query($db, $sql_check_pswd);

	if(mysqli_num_rows($check_query_pswd) > 0){
		$sql = "SELECT `id`, `name`, `surname`, `email`, `pswd` FROM `users` 
		WHERE `email` = '$login'";
		$query = mysqli_query($db, $sql);

		foreach($query as $query_rows){
			$_SESSION['id'] = $query_rows['id'];
			$_SESSION['name'] = $query_rows['name'];
			$_SESSION['surname'] = $query_rows['surname'];
			$_SESSION['login'] = $query_rows['email'];
		}
		if(isset($_SESSION['id']) || isset($_SESSION['name']) || isset($_SESSION['surname']) || isset($_SESSION['login'])){
			echo "OK";
		}
	}else{
		echo "<div class='error-message'>Неверный пароль!</div>";
	}
}else{
	echo "<div class='error-message'>Такого пользователя не существует!</div>";
}