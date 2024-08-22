<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php'; 
session_start();

// Tạo một chuỗi captcha ngẫu nhiên
function generateRandomString($length = 6) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Tạo captcha mới và lưu vào session
$captchaText = generateRandomString();
$_SESSION['captcha'] = $captchaText;

// Tạo hình ảnh captcha
$width = 120;
$height = 40;
$image = imagecreatetruecolor($width, $height);
if($_SESSION['giaodien'] == 'light'){
    $bgColor = imagecolorallocate($image, 255, 255, 255); // Màu nền trắng
    $textColor = imagecolorallocate($image, 0, 0, 0); // Màu chữ đen
} else {
    $bgColor = imagecolorallocate($image, 53, 65, 90); // Màu nền đen
    $textColor = imagecolorallocate($image, 255, 255, 255); // Màu chữ trắng
}
imagefilledrectangle($image, 0, 0, $width - 1, $height - 1, $bgColor);

// Thêm các ký tự captcha vào hình ảnh
for ($i = 0; $i < strlen($captchaText); $i++) {
    $fontSize = 20;
    $x = ($width - 20) / strlen($captchaText) * $i + 10;
    $y = $height / 2 + $fontSize / 2;
    $angle = rand(-10, 10);
    imagettftext($image, $fontSize, $angle, $x, $y, $textColor, './Arial.ttf', $captchaText[$i]);
}

// Hiển thị hình ảnh captcha
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
