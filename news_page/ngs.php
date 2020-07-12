<?php
require "../server/connect_db.php";
header("Content-type:text/html; charset=utf-8");
$news_name = 'НГС';
$sql = "SELECT `id`, `name_src`, `title`, `txt`, `link` FROM `articles` WHERE `name_src` = '$news_name' ORDER BY `id` DESC";
$query_news = mysqli_query($db, $sql);
	while($show_news = mysqli_fetch_assoc($query_news)){
		$id_new = $show_news['id'];
		$name_new = $show_news['name_src'];
		$title = $show_news['title'];
		$txt = $show_news['txt'];
		echo '<div class="content_news">';
		echo '<h3>'.$name_new.'</h3>';
		echo '<h5>'.$title.'</h5>';
		echo '<div class="full_text">';
		echo $txt;
		echo '</div>';
		echo '<a href="" class="full">Читать полностью</a>';
		echo '</div>';
	}
	echo '<script type="text/javascript" src="../js/full_text.js"></script>';
?>
