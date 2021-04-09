<?php  
$login = filter_var(trim($_POST['login']),//variabila
         FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
         FILTER_SANITIZE_STRING);

/*$pass = md5($pass."lkiou");*/
$mysql = new mysqli('localhost', 'root','' ,'mybase');
//SELECTAREA DATELOR
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");//(ВЫБИРАЕМ ВСЕ ДАННЫЕ ИЗ ТАБЛИЧКИ ЮЗЕРС WHERE -оператор, по каким критэриям)
// получим данные в формате обьекта, нужно перевести его в масив)
 
$user = $result->fetch_assoc(); //fuctie care converteaza in ;
 
if(is_countable($user) == 0) { //функция коут считает элементы внутри масива, если длина масива равна нулю, говорим о том что пользователь не найден
 
	echo "User not found";  
	exit(); //обработка файла остановится
}
setcookie('user', $user['name'], time() + 3600, "/");
// функция которая выводит масиа обьект на экран
$mysql->close ();
header('Location: index.php');
?>