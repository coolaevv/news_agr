<?php
require_once("server/connect_db.php");
session_start();
mb_internal_encoding("UTF-8");
$substr = 80;
$substr_2 = 150;
if(isset($_SESSION['id'])){
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Новости</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
	<header>
		<div class="nav"></div>
		<div class="logo"><a href="">News Portal</a></div>
		<div class="user"><?php echo $_SESSION['name']." ".$_SESSION['surname']?></div>
		<div class="user-window">
			<a href="page/selected_news.php">Избранное</a>
			<a href="page/source_news.php">Источники</a>
			<a href="logout.php" class="logout">Выйти</a>
		</div>
	</header>
	<div class="content">
		<?php
			$sql_articles = "SELECT `id`, `name_src`, `title`, `txt`, `link`, `flag` 
			FROM `articles` 
			WHERE `flag` = 'Политика' ORDER BY ID DESC LIMIT 1";

			$query = mysqli_query($db, $sql_articles);

			foreach ($query as $news){
				$sql_sel = "SELECT `n_id` FROM `sel_articles` WHERE `n_id` = '{$news['id']}' ";
				$query_sel = mysqli_query($db, $sql_sel);
				$rows_sel = mysqli_fetch_array($query_sel);
				if($news['id'] === $rows_sel['n_id']){
					$class = "active";
				}else{
					$class = "options";
				}
				?>
				<div class="box-1">
					<a href="page/politics.php"><img src="img/political.svg">Политика</a>
					<div class="title"><?php echo mb_substr($news['title'], 0, $substr) ;?></div>
					<div class="articles">
						<?php echo mb_substr($news['txt'], 0, $substr_2) ;?>
						<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">
							Показать полностью
						</a>
						<div class="<?php echo $class; ?>" data="<?php echo $news['id']?>">
							
						</div>
					</div>
					<!--<div class="img-logo-articles">
						<img src="img/1.jpg" alt="">
					</div>-->
				</div>
				<?php
			}
		?>

		<?php
			$sql_articles = "SELECT `id`, `name_src`, `title`, `txt`, `link`, `flag` 
			FROM `articles` 
			WHERE `flag` = 'IT' ORDER BY ID DESC LIMIT 1";

			$query = mysqli_query($db, $sql_articles);

			foreach ($query as $news) {
				$sql_sel = "SELECT `n_id` FROM `sel_articles` WHERE `n_id` = '{$news['id']}' ";
				$query_sel = mysqli_query($db, $sql_sel);
				$rows_sel = mysqli_fetch_array($query_sel);
				if($news['id'] === $rows_sel['n_id']){
					$class = "active";
				}else{
					$class = "options";
				}
				?>
				<div class="box-2">
					<a href="page/technologies.php"><img src="img/technologies.svg">Технологии</a>
					<div class="title"><?php echo mb_substr($news['title'], 0, $substr) ;?></div>
					<div class="articles">
						<?php echo mb_substr($news['txt'], 0, $substr_2) ;?>
						<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">
							Показать полностью
						</a>
						<div class="<?php echo $class; ?>" data="<?php echo $news['id']?>">
							
						</div>
					</div>
					<!--<div class="img-logo-articles">
						<img src="img/1.jpg" alt="">
					</div>-->
				</div>
				<?php
			}
		?>
		
		<?php
			$sql_articles = "SELECT `id`, `name_src`, `title`, `txt`, `link`, `flag` 
			FROM `articles` 
			WHERE `flag` = 'Общество' ORDER BY ID DESC LIMIT 1";

			$query = mysqli_query($db, $sql_articles);

			foreach ($query as $news) {
				$sql_sel = "SELECT `n_id` FROM `sel_articles` WHERE `n_id` = '{$news['id']}' ";
				$query_sel = mysqli_query($db, $sql_sel);
				$rows_sel = mysqli_fetch_array($query_sel);
				if($news['id'] === $rows_sel['n_id']){
					$class = "active";
				}else{
					$class = "options";
				}
				?>
				<div class="box-3">
					<a href="page/world.php"><img src="img/world.svg">Мир</a>
					<div class="title"><?php echo mb_substr($news['title'], 0, $substr) ;?></div>
					<div class="articles">
						<?php echo mb_substr($news['txt'], 0, $substr_2) ;?>
						<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">
							Показать полностью
						</a>
						<div class="<?php echo $class; ?>" data="<?php echo $news['id']?>">
							
						</div>
					</div>
					<!--<div class="img-logo-articles">
						<img src="img/1.jpg" alt="">
					</div>-->
				</div>
				<?php
			}
		?>
		
		<?php
			$sql_articles = "SELECT `id`, `name_src`, `title`, `txt`, `link`, `flag` 
			FROM `articles` 
			WHERE `flag` = 'Культура' ORDER BY ID DESC LIMIT 1";

			$query = mysqli_query($db, $sql_articles);

			foreach ($query as $news) {
				$sql_sel = "SELECT `n_id` FROM `sel_articles` WHERE `n_id` = '{$news['id']}' ";
				$query_sel = mysqli_query($db, $sql_sel);
				$rows_sel = mysqli_fetch_array($query_sel);
				if($news['id'] === $rows_sel['n_id']){
					$class = "active";
				}else{
					$class = "options";
				}
				?>
				<div class="box-4">
					<a href="page/art.php"><img src="img/art.svg">Искусство</a>
					<div class="title"><?php echo mb_substr($news['title'], 0, $substr) ;?></div>
					<div class="articles">
						<?php echo mb_substr($news['txt'], 0, $substr_2) ;?>
						<a href="<?php echo 'page/news_post.php?id='.$news['id']; ?>">
							Показать полностью
						</a>
						<div class="<?php echo $class; ?>" data="<?php echo $news['id']?>">
							
						</div>
					</div>
					<!--<div class="img-logo-articles">
						<img src="img/1.jpg" alt="">
					</div>-->
				</div>
				<?php
			}
		?>
	</div>
	<script type="text/javascript" src="js/user_window.js"></script>
	<script type="text/javascript" src="js/star.js"></script>
</body>
</html>
	<?php
}else{
	header("Location: login.php");
}
?>

