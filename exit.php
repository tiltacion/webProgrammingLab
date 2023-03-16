<?php
    setcookie("userId","",time()-3600, "/");
    header('Location: /');
?>