<?php
     $connection = mysqli_connect("server42.hosting.reg.ru", "u1960216_default", "X6z7Y08TBcsaxY3I", "u1960216_webprogrammingrsreu");
     $connection->query("SET NAMES utf8");

     if (!$connection)
     {
         die("Ошибка подключения: " . mysqli_connect_error());
     }
     $userId = mysqli_real_escape_string($connection, $_COOKIE['userId']);
	
		$result = $connection->query("SELECT Role FROM `users` WHERE `id` = '$userId'");
        $roleId = $result->fetch_assoc()['Role'];

        if (!isset($roleId) || $roleId == 0)
        {
            header('Location: /');
        }
 
     $result = $connection->query("SELECT * FROM `ClassTime`");

     $resultType = $connection->query("SELECT * FROM `LessonTypes`");

     $resultSubjects = $connection->query("SELECT * FROM `Subjects`");


     if ($_SERVER["REQUEST_METHOD"]=="POST")
     {
        $connection = mysqli_connect("server42.hosting.reg.ru", "u1960216_default", "X6z7Y08TBcsaxY3I", "u1960216_webprogrammingrsreu");
        $connection->query("SET NAMES utf8");
    
        $subjectName = mysqli_real_escape_string($connection, $_POST["subject"]);
    
        $result = $connection->query("SELECT * FROM `Subjects` WHERE `SubjectName` = '$subjectName'");
        
        if($result->num_rows > 0)
        {
            $errors['insert'] = "Данный предмет уже существует!";
            $connection->close();
        }
        else
        {
            $connection->query("INSERT INTO `Subjects` (`SubjectName`) VALUES ('$subjectName')");
            header('Location: adminPageAddSubject.php');
            $connection->close();
        }
    }
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Добавление предмета</title>
</head>
<body onload="loadPage()">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="adminPage.php">Главная</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="adminPageAdd.php">Добавление предмета в расписание<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="adminPageAddSubject.php">Добавление предмета<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="exit.php">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Выйти</button>
                </form>
            </div>
        </nav>
        <div class="container mt-4 col-10">
            <div class="row">
                <div class="col">
                    <h1 class="d-flex justify-content-center">Добавление предмета</h1>
                    <form method="post" onsubmit="return validateAddSubjectForm()" name="form">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Название предмета</label>
                        <div class="col-sm-8">
                            <input name="subject" placeholder="Введите название предмета..." class="form-control"/>
                        </div>
                    </div>
                    <div id="groupError" class="alert alert-danger">
					
					</div>
                    <?php if (isset($errors['insert'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $errors['insert'] ?>
                        </div>
						<?php endif; ?>
                        <button type="submit" class="btn btn-outline-primary">Добавить</button>
                    </form>
                 </div>
            </div>
        </div>
    </div>

    <script src="scripts/adminPageAdd.js"></script>
</body>
</html>