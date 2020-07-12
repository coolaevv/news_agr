<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="form-registration">
		<form action="" id="form-reg">
			<input type="text" id="name" placeholder="Имя">
			<input type="text" id="surname" placeholder="Фамилия">
			<input type="text" id="email" placeholder="E-Mail">
			<input type="password" id="pswd-1" placeholder="Пароль">
			<input type="password" id="pswd-2" placeholder="Повторите пароль">
			<div class="usfu">
				<input type="checkbox" id="snopd"><label for="snopd">Соглашаюсь с <a href="">условиями пользования</a></label>
			</div>
			<div class="btn-sub-log">
				<input type="submit" id="submit" value="Создать аккаунт">
				<a href="login.php">Войти</a>
			</div>
		</form>
		<div class="sysmessages"></div>
	</div>
	<script type="text/javascript" src="js/reg.js"></script>
</body>
</html>