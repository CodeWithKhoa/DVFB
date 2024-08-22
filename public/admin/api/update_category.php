<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$img        = $_POST['img'];
$title      = $_POST['title'];
$money      = $_POST['money'];
$note       = $_POST['note'];
$id        = $_POST['id'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($id) || empty($money) || empty($title) || empty($img)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("category", [
            'img'       => $img,
            'title'     => $title,
            'money'     => $money,
            'note'      => $note
            ], " `id` = '$id' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đã Cập Nhật Sản Phẩm $id "]));
}
}