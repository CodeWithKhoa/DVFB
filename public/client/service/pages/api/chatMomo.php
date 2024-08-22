<?php require($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include($_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php');
die();
} else {
$note = addslashes($_POST['note']);

if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($note)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->insert("box_caht_momo", [
                'username'   => $ManhDev->users('username'),
                'note'       => $note,
                'time'       => $time
                ]);

die(json_encode([
    "status" => "success",
    "msg" => ""]));
}
}