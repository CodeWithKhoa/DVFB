<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$title      = $_POST['title'];
$capacity   = $_POST['capacity'];
$money      = addslashes($_POST['money']);
$note       = $_POST['note'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($title) || empty($capacity) || empty($money) || empty($note)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($money < 1) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Tiền Tối Thiểu Là 1đ"]));
} else if($capacity < 1) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Dung Lượng Thiểu Là 1mb"]));
} else {
$ManhDev->insert("list_Host", [
                'code'      => xoadau($title),
                'capacity'  => $capacity,
                'title'     => $title,
                'money'     => $money,
                'note'      => $note
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Đã Thêm Sản Phẩm"]));
}
}