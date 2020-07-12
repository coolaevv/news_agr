<?php
session_start();
require_once("../server/connect_db.php");

if(isset($_POST['id'])){
	$id = trim(htmlspecialchars($_POST['id']));

	$sql_check = "SELECT `id`, `u_id`, `n_id` FROM `sel_articles` WHERE `n_id` = '$id' ";

	$q_check = mysqli_query($db, $sql_check);

	if(mysqli_num_rows($q_check) > 0){
		echo "Запись добавлена ранее!";
	}else{
		$sql = "INSERT INTO `sel_articles`(`id`, `u_id`, `n_id`) 
		VALUES ('',{$_SESSION['id']},'$id')";
		mysqli_query($db, $sql);
	}
}