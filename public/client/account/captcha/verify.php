<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userCaptcha = $_POST['key-captcha'];
    if ($userCaptcha === $_SESSION['captcha']) {
        echo "Captcha matched!";
        $_SESSION['captcha']="";
        // Xử lý logic tiếp theo ở đây
    } else {
        echo "Captcha not matched. Please try again!";
    }
}
?>
