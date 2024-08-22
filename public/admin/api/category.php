<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$img        = $_POST['img'];
$title      = $_POST['title'];
$money      = addslashes($_POST['money']);
$note       = $_POST['note'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "WWebsite Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($img) || empty($title) || empty($money) || empty($note)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($money < 1) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Tiền Tối Thiểu Là 1đ"]));
} else {
$ManhDev->insert("category", [
                'code'      => xoadau($title),
                'img'       => $img,
                'title'     => $title,
                'money'     => $money,
                'note'      => $note,
                'status'    => 'on'
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Đã Thêm Sản Phẩm"]));
}
}