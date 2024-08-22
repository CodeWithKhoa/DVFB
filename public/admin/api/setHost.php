<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."/public/client/pages/404.php";
die();
} else {

$id        = addslashes($_POST['id']);
$link      = $_POST['link'];
$username  = $_POST['username'];
$password  = $_POST['password'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($id) || empty($link) || empty($username) || empty($password)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("history_Host", [
            'login' => $link,
            'taikhoan' => $username,
            'matkhau' => $password,
            'status' => 'hoantat'
            ], " `id` = '$id' ");

die(json_encode([
    "status" => "success",
    "msg" => "Cập Nhật Thành Công"]));
}
}