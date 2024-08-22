<?php require('../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$password  = addslashes($_POST['password']);
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($password)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Mật Khẩu Cấp 2 Để Setup"]));
} else if($password == $ManhDev->users('password')) {
die(json_encode([
    "status" => "error",
    "msg" => "Mật Khẩu Cấp 2 Phải Khác Mật Khẩu Tài Khoản!"]));
} else {
$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'password',
                'note'       => 'Đã Cập Nhật Mật Khẩu Cấp 2',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
        
$ManhDev->update("users", [
            'password2' => $password,
            ], " `username` = '$username' ");

die(json_encode([
    "status" => "success",
    "msg" => "Cập Nhật Mật Khẩu Thành Công"]));
}
}