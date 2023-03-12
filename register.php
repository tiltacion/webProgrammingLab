<?php
    $connection = mysqli_connect("https://server42.hosting.reg.ru/", "u1960216_default", "X6z7Y08TBcsaxY3I", "u1960216_default");

    $login = mysqli_real_escape_string($connection, $_POST["login"]);
	$name = mysqli_real_escape_string($connection, $_POST["name"]);
	$pass = mysqli_real_escape_string($connection, $_POST["pass"]);

	// Хешируем пароль
	$pass = md5($pass);

	$result = $connection->query("SELECT * FROM `users` WHERE `login` = '$login'");
	
    if($result->num_rows > 0)
    {
        echo "Данный логин уже используется!";
		exit();
    }

	// Иначе - добавляем юзера в базу и перенаправляем на /
	$connection->query("INSERT INTO `users` (`login`, `password`, `name`) VALUES('$login', '$pass', '$name')");
	$connection->close();

	header('Location: /');
	exit();
?>