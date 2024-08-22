<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$amount   = $_POST['amount'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($amount)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Giá Key Tool"]));
} else {
$ManhDev->update("options", [
            'value' => $amount
            ], " `key_code` = 'money_key' ");
die(json_encode([
    "status" => "success",
    "msg" => "Đã Cập Nhật Giá Key"]));
}
}