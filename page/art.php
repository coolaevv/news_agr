<?php
require_once("../server/connect_db.php");
$flag = "Культура";
$sql = "SELECT `id`, `name_src`, `title`, `txt`, `link`, `flag` FROM `articles` 
WHERE `flag` = '$flag' ORDER BY ID DESC LIMIT 20";
$query = mysqli_query($db, $sql);
foreach($query as $news){
	$sql_sel = "SELECT `n_id` FROM `sel_articles` WHERE `n_id` = '{$news['id']}' ";
	$query_sel = mysqli_query($db, $sql_sel);
	$rows_sel = mysqli_fetch_array($query_sel);
	if($news['id'] === $rows_sel['n_id']){
		$class = "active";
	}else{
		$class = "options";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Политика</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style_news_page.css">
</head>
<body>
	<a href="../index.php" id="back">Назад</a>
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
			<a href="<?php echo $news['link']; ?>" target="_bla">Читать в источнике</a>
			<div class="<?php echo $class; ?>" data="<?php echo $news['id']?>"></div>
		</div>
	</div>
	<script type="text/javascript" src="../js/star.js"></script>
	<script type="text/javascript">
		var count = 20;
		window.onscroll = function (){
			let clientHeight = document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight;
			let documentHeight = document.documentElement.scrollHeight ? document.documentElement.scrollHeight : document.body.scrollHeight;
			let scrollTop = window.pageYOffset ? window.pageYOffset : (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);

			if((documentHeight - clientHeight) <= scrollTop){
				$('body').append('<div class="next">Ещё</div>');
			}

			$('.next').click(function(){
				let res = count + 20;
				console.log(res);
			});

			let scrollPos = 0;
				$(window).scroll(function(){
				let st = $(this).scrollTop();
			   	if (st < scrollPos){
					$('.next').fadeOut();
			   	}
			   	scrollPos = st;
		   });
		}
	</script>
</body>
</html>
	<?php
}