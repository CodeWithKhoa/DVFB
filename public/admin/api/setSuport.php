<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."/public/client/pages/404.php";
die();
} else {
$title = $_POST['title'];
$url   = $_POST['url'];


$check_note = $ManhDev->get_row("SELECT * FROM `support` WHERE `url` = '$url' ");
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($title) || empty($url)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($check_note) {
die(json_encode([
    "status" => "error",
    "msg" => "Đường Dẫn Đã Tồn Tại"]));
} else {

$ManhDev->insert("support", [
                'title'   => $title,
                'url'     => $url,
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Thêm Thông Tin Hỗ Trợ Thành Công"]));

}
}