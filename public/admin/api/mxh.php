<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
if($_POST['type'] == "edit_apitoken") {
$token_sgr        = $_POST['token_sgr'];
$autodon          = $_POST['autodon'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($token_sgr)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Token Để Đấu API Nguồn"]));
} else {
$ManhDev->update("options", [
            'value'     => $token_sgr
            ], " `key_code` = 'token_subgiare' ");
            
$ManhDev->update("options", [
            'status'     => $autodon
            ], " `key_code` = 'order_auto' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đã Lưu Api Token Nguồn"]));
}
}


if($_POST['type'] == "edit_sever") {
$title        = $_POST['title_2'];
$sever        = $_POST['sever'];
$money        = $_POST['money'];
$status       = $_POST['status'];
$max          = $_POST['max'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($title) || empty($sever) || empty($money) || empty($status) || empty($max)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("server", [
            'title'     => $title,
            'sever'     => $sever,
            'money'     => $money,
            'status'    => $status,
            'max_buff'  => $max
            ], " `id` = '".$_POST['id']."' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đã Lưu Máy Chủ Số ".$sever]));
}
}


if($_POST['type'] == "add_sever2") {
$type         = $_POST['type2'];
$title        = $_POST['title2'];
$sever        = $_POST['sever2'];
$money        = $_POST['money2'];
$max          = $_POST['max2'];
$code         = $_POST['code33'];
$dislay2      = $_POST['dislay2'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($title) || empty($sever) || empty($money) || empty($max) || empty($code)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($money < 0) {
die(json_encode([
    "status" => "error",
    "msg" => "Giá Tiền Tối Thiểu Là 0"]));
} else {
$ManhDev->insert("server", [
            'code_service' => $code,
            'code_type' => $type,
            'title'     => $title,
            'sever'     => $sever,
            'money'     => $money,
            'status'    => "on",
            'max_buff'  => $max,
            'display'   => $dislay2
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Đã Thêm Máy Chủ Mới"]));
}
}
}