<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Форма регистрации</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-4">
		<!-- сначало стр в html потом в php и пишем тут куки -->
	<!-- 	форма выводится когда значение куки равно пустой строке -->
		<?php 
        if(!isset($_COOKIE['user'])):
		?>
		<div class="row"> <!-- создаём после как проверили форму регистрации -->
			<div class="col"><!-- создаём после как проверили форму регистрации -->
				<h1>Форма регистрации</h1>
	  <form action="check.php" method="post"><!-- пишем название файла после создание таблицы myAdmin -->
	  	<input type="text" class="form-control" name="login" id="login" placeholder="Log"><br>
	  	<input type="text" class="form-control" name="name" id="name" placeholder="Name"><br>
	  	<input type="password" class="form-control" name="pass" id="pass" placeholder="Pass"><br>
	  	<button class="btn btn-success" type="submit">Register</button> <!-- submit данные отправляются на сервер методом post -->
	  </form>
			</div>
			<div class="col">
				<h1>Форма авторизации</h1><!-- создаём после как проверили форму регистрации -->
	  <form action="auth.php" method="post"><!-- пишем название файла после создание таблицы myAdmin -->
	  	<input type="text" class="form-control" name="login" id="login" placeholder="Log"><br>
	  	<input type="password" class="form-control" name="pass" id="pass" placeholder="Pass"><br>
	  	<button class="btn btn-success" type="submit">Enter</button> <!-- submit данные отправляются на сервер методом post -->
	  </form>
			</div>
			<!-- если куки не пустой -->
           <?php else: ?>
            <p>Hi <?=$_COOKIE['user']?>. For exit click <a href="exit.php">here</a>.</p>
			<?php endif;?>
		</div>
	  </div>
</body>
</html>