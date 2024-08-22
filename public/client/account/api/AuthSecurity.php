<?php require('../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
#Form Veri EMAIL
if($_POST['type'] == "batemail") {

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}

if(empty($username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if($ManhDev->users('securityPass') == "1") {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Vui Lòng Tắt 1 Phương Thức Bảo Mật"]));
} else {
if($_POST['onoff'] == "on") {
$ManhDev->update("users", [
            'securityEmail' => '1',
            ], " `username` = '$username' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đã Bật Xác Thực Email"]));
} else {
$ManhDev->update("users", [
            'securityEmail' => '0',
            ], " `username` = '$username' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đã Tắt Xác Thực Email"]));
}
}
} #END

#Form Veri Password Level 2
if($_POST['type'] == "batpass") {
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if($ManhDev->users('securityEmail') == "1") {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Vui Lòng Tắt 1 Phương Thức Bảo Mật"]));
} else {
if($_POST['onoff'] == "on") {
$ManhDev->update("users", [
            'securityPass' => '1',
            ], " `username` = '$username' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đã Bật Xác Thực Mật Khẩu Cấp 2"]));
} else {
$ManhDev->update("users", [
            'securityPass' => '0',
            ], " `username` = '$username' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đã Tắt Xác Thực Mật Khẩu Cấp 2"]));
}
}
} #END


}