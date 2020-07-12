<?php
session_start();
require_once("../server/connect_db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Избранное</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style_news_page.css">
</head>
<body>
	<a href="../index.php" id="back">Назад</a>

<?php
	$sel_sql = "SELECT `u_id`, `n_id` FROM `sel_articles` WHERE `u_id` = '{$_SESSION['id']}'";
	$q_sel = mysqli_query($db, $sel_sql);
	foreach($q_sel as $sel){
		$sql = "SELECT `id`, `name_src`, `title`, `txt`, `link`, `flag` FROM `articles` 
		WHERE `id` = '{$sel['n_id']}' ";

		$query = mysqli_query($db, $sql);

		foreach($query as $news){
				?>
				<div class="post">
					<div class="title_post">
						<?php echo $news['title']; ?>
						<div class="source">
							<?php echo $news['name_src']; ?>
						</div>
					</div>
					<div class="text_post">
						<?php echo $news['txt'];?>
					</div>
					<div class="option">
						<a href="<?php echo $news['link']; ?>" target="_blank">Читать в источнике</a>
						<div class="active" data="<?php echo $news['id']?>"></div>
					</div>
				</div>
				<?php
		}
	}
?>
	<script type="text/javascript" src="../js/star.js"></script>
</body>
</html>