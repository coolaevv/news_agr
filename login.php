<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Вход</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="login-form">
		<form action="" id="login-form-login">
			<input type="text" id="login" placeholder="Логин/E-Mail">
			<input type="password" id="pswd" placeholder="Пароль">
			<div class="btn-sub-reg">
				<input type="submit" id="submit" value="Войти">
				<a href="reg.php">Создать аккаунт</a>
			</div>
			<div class="sysmessage"></div>
		</form>
	</div>
	<script type="text/javascript" src="js/login.js"></script>
</body>
</html>