<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."/public/client/pages/404.php";
die();
} else {
$key    = addslashes($_POST['key']);
$id    = addslashes($_POST['id']);

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($key) || empty($id)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("options", [
            'value' => $key
            ], " `key_code` = 'key_card' ");
$ManhDev->update("options", [
            'value' => $id
            ], " `key_code` = 'id_card' ");
die(json_encode([
    "status" => "success",
    "msg" => "Cập Nhật Thành Công"]));
}
}