<?php
    if (!isset($_COOKIE['userId']))
    {
        header('Location: login.php');
    }
    else
    {
        //$roleId = получить номер роли
        if ($roleId == 0)
        {
            header('Location: schedule.php');
        }
        else
        {
            header('Location: adminPage.php');
        }
        
    }
?>