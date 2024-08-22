<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."/public/client/pages/404.php";
die();
} else {
$phone    = addslashes($_POST['phone']); #Sdt
$apikey   = addslashes($_POST['apikey']); #Api Key

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($phone) || empty($apikey)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("momo_auto", [
            'apikey' => $apikey,
            'phone' => $phone
            ], " `id` = '1' ");

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'momo',
                'note'       => "Thay Đổi Số Điện Thoại Auto Momo",
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Cập Nhật Thành Công"]));
}
}