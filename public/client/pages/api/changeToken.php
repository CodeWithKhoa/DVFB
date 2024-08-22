<?php include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
} else {
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else {
$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'token',
                'note'       => 'Đã Đổi Token Tài Khoản',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
        
$ManhDev->update("users", [
            'apitoken' => api_token(),
            ], " `username` = '$username' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đổi API Token Thành Công"]));
}
}