<?php
require_once("../server/connect_db.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Источники</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<style type="text/css">
		*{
			font-family: 'Calibri', sans-serif;
			box-sizing: border-box;
		}
		.news_src{
			width: 300px;
			padding: 10px;
			border: 1px solid #dcdde1;
			margin: 20px auto;
		}
		.news_src a{
			display: block;
			padding: 5px;
			margin-bottom: 10px;
			font-size: 18px;
			text-decoration: none;
		}
		.news_src #home{
			border: 1px solid #dcdde1;
			width: 100%;
			text-align: center;
			text-decoration: none;
			font-size: 14px;
			color: #353b48;
		}
	</style>
</head>
<body>
	<?php
	$sql = "SELECT `id`, `name_src`, `title`, `txt`, `link`, `flag` FROM `articles` WHERE 1";
	?>
	<div class="news_src">
		<a href="../index.php" id="home">Главная</a>
		<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">НГС</a>
		<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">The Insider</a>
		<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">Lenta.ru</a>
		<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">ТАСС</a>
		<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">РБК</a>
	</div>
</body>
</html>