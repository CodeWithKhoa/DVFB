<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
if($_POST['type'] == "sanh") {
$note = $_POST['note'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($note)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Nội Dung Thông Báo"]));
} else {
$ManhDev->insert("notification", [
                'note'       => $note,
                'time'       => date('d-m-Y')
                ]);
                
die(json_encode([
    "status" => "success",
    "msg" => "Đã Thêm Thông Báo Sảnh"]));
}
}

if($_POST['type'] == "modal") {
$note = $_POST['note'];
$status = $_POST['status'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($note) || empty($status)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("options", [
            'value'  => $note,
            'status' => $status
            ], " `key_code` = 'note_modal' ");

die(json_encode([
    "status" => "success",
    "msg" => "Đã Cập Nhật Thông Báo Modal"]));
}
}
}