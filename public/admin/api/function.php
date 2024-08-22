<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$account   = $_POST['account'];
$card      = $_POST['card'];
$domain    = $_POST['domain'];
$hosting   = $_POST['hosting'];
$coder     = $_POST['coder'];
$keytool   = $_POST['keytool'];
$mxh       = $_POST['mxh'];
$checkscam = $_POST['checkscam'];
$website   = $_POST['website'];
$accgame   = $_POST['accgame'];


if(empty($account) || empty($card) || empty($domain) || empty($hosting) || empty($coder) || empty($keytool) || empty($mxh) || empty($checkscam) || empty($website) || empty($accgame)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("options", [
            'status' => $account
            ], " `key_code` = 'account' ");
$ManhDev->update("options", [
            'status' => $card
            ], " `key_code` = 'card' ");
$ManhDev->update("options", [
            'status' => $domain
            ], " `key_code` = 'domain' ");
$ManhDev->update("options", [
            'status' => $hosting
            ], " `key_code` = 'hosting' ");
$ManhDev->update("options", [
            'status' => $coder
            ], " `key_code` = 'coder' ");
$ManhDev->update("options", [
            'status' => $keytool
            ], " `key_code` = 'keytool' ");
$ManhDev->update("options", [
            'status' => $mxh
            ], " `key_code` = 'mxh' ");
$ManhDev->update("options", [
            'status' => $checkscam
            ], " `key_code` = 'checkscam' ");
            
$ManhDev->update("options", [
            'status' => $website
            ], " `key_code` = 'website' ");
            
$ManhDev->update("options", [
            'status' => $accgame
            ], " `key_code` = 'nickgame' ");
            
die(json_encode([
    "status" => "success",
    "msg" => "Đã Cập Nhật Chức Năng"]));
}
}