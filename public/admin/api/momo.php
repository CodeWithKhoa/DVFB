<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$momo        = $_POST['momo'];
$mbbank      = $_POST['mbbank'];
$vietcombank = $_POST['vietcombank'];
$note        = $_POST['note'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($momo) || empty($mbbank) || empty($vietcombank) || empty($note)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("options", [
            'value'  => $momo,
            ], " `key_code` = 'api_key_momo' ");

$ManhDev->update("options", [
            'value'  => $mbbank,
            ], " `key_code` = 'api_key_mbbank' ");

$ManhDev->update("options", [
            'value'  => $vietcombank,
            ], " `key_code` = 'api_key_vcb' ");

$ManhDev->update("options", [
            'value'  => $note,
            ], " `key_code` = 'nd_bank' ");

die(json_encode([
    "status" => "success",
    "msg" => "Cập Nhật Thành Công"]));
}
}