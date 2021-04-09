<?php 
/* $login = $_POST['login']; variabila login/ luam de la name
echo $login; verificam daca lucreaza ne afisaza in brauzer*/
$login = filter_var(trim($_POST['login']), //FILTREAZA CA IN LOGIN SA NU FIE SIMBOLURI HTML
         FILTER_SANITIZE_STRING); //tipul filtrarii filtram ca pe o fraza obisnuita
$name = filter_var(trim($_POST['name']),
         FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
         FILTER_SANITIZE_STRING);
// || логический оператор или eng. or rom sau
if(mb_strlen($login) <5 || mb_strlen($login) > 10) { //mb_strlen — Получает длину строки
	echo "invalid login";
	exit(); //functia exit codul de mai depate nu va functiona
} else if (mb_strlen($name) < 3 || mb_strlen($name) > 10) {
	echo "invalid name";
	exit();
} else if (mb_strlen($pass) < 2 || mb_strlen($pass) > 10) {
	echo "invalid pass";
	exit();
}
//хэширование пароля in ascundem in bd sa nu se vada
//scrim asta dupa header
/*$pass = md5($pass."lkiou");*///la parola adaugam simboluri


// datele sunt valabile ne conectam la bd
$mysql = new mysqli('localhost', 'root','' ,'mybase');//root имя пользователя, пароль не указываем, numele tabelului
 $mysql->query ("SET NAMES 'utf8'");//query запрос, interogare

 $mysql->query ("INSERT INTO `users` (`login`, `password`,`name`) VALUES ('$login', '$pass', '$name')"); 

$mysql->close();// inchidem cu ajutorul functiei close
//migrare de pe pagina check
header('Location: index.php'); // slash ne duce pe pagina principala
?>