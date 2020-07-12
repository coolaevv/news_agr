<?php
require_once("../server/connect_db.php");
$post = $_GET['id'];
$title_sql = "SELECT `id`, `name_src`, `title`, `txt`, `link`, `flag` 
FROM `articles` 
WHERE `id` = '$post'";
$title_query = mysqli_query($db, $title_sql);
foreach($title_query as $text){
	$sql_sel = "SELECT `n_id` FROM `sel_articles` WHERE `n_id` = '{$text['id']}' ";
	$query_sel = mysqli_query($db, $sql_sel);
	$rows_sel = mysqli_fetch_array($query_sel);
	if($text['id'] === $rows_sel['n_id']){
		$class = "active";
	}else{
		$class = "options";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $text['title']; ?></title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style_news_page.css">
</head>
<body>
	<a href="../index.php" id="back">Назад</a>
	<div class="post">
		<div class="title_post">
			<?php echo $text['title']; ?>
			<div class="source">
				<?php echo $text['name_src']; ?>
			</div>
		</div>
		<div class="text_post">
			<?php echo $text['txt'];?>
		</div>
		<div class="option">
			<a href="<?php echo $text['link']; ?>" target="_bla">Читать в источнике</a>
			<div class="<?php echo $class; ?>" data="<?php echo $text['id']?>"></div>
		</div>
	</div>
	<script type="text/javascript" src="../js/star.js"></script>
</body>
</html>
	<?php
}
?>