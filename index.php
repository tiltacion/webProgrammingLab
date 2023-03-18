<?php
    if (!isset($_COOKIE['userId']))
    {
        header('Location: login.php');
    }
    else
    {
        $connection = mysqli_connect("server42.hosting.reg.ru", "u1960216_default", "X6z7Y08TBcsaxY3I", "u1960216_webprogrammingrsreu");
		$connection->query("SET NAMES utf8");

		if (!$connection)
		{
			die("Ошибка подключения: " . mysqli_connect_error());
		}
	
		$userId = mysqli_real_escape_string($connection, $_COOKIE['userId']);
	
		$result = $connection->query("SELECT Role FROM `users` WHERE `id` = '$userId'");
        $roleId = $result->fetch_assoc()['Role'];
        if (!isset($roleId))
        {
            header('Location: schedule.php');
        }
        else
        {
            if ($roleId == 0) {
                header('Location: schedule.php');
            }
            else {
                header('Location: adminPage.php');
            }
        }        
    }
?>