<?php
    if (!isset($_COOKIE['userId']))
    {
        header('Location: login.php');
    }
    else
    {
        header('Location: schedule.php');
    }
?>