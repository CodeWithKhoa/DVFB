<?php
session_start();
session_destroy();
setcookie('tg_user', '');
header('location: /');
?>