<?php
session_start();
require_once("../server/connect_db.php");

if(isset($_POST['id'])){
	$id = trim(htmlspecialchars($_POST['id']));
	$sql_del = "DELETE FROM `sel_articles` WHERE `n_id` = '$id' AND `u_id` = '{$_SESSION['id']}' ";
	mysqli_query($db, $sql_del);
}