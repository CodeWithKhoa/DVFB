<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$api_key = $_POST['api_key'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($api_key)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Api Key Đại Lý Siêu Rẻ"]));
} else {
$ManhDev->update("options", [
            'value'  => $api_key
            ], " `key_code` = 'api_key_host' ");
            
die(json_encode([
    "status" => "success",
    "msg" => "Đã Lưu Api key"]));
}
}