<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."/public/client/pages/404.php";
die();
} else {
$username  = addslashes($_POST['username']);
$phone     = addslashes($_POST['phone']);
$facebook  = $_POST['facebook'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($username) || empty($phone) || empty($facebook)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {

$json = json_decode(file_get_contents("https://manhcon.site/api/idfb.php?url=".$facebook), true);
if($json['id']) {
$ManhDev->update("settings", [
            'nameAdmin'  => $username,
            'phoneAdmin' => $phone,
            'faceAdmin'  => $json['id'],
            ], " `id` = '1' ");
die(json_encode([
    "status" => "success",
    "msg" => "Cập Nhật Thông Tin Thành Công!"]));
} else {
die(json_encode([
    "status" => "error",
    "msg" => "Link Facebook Die - Hãy Kiểm Tra Lại"]));
}  
}
}