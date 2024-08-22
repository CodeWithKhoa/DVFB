<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."/public/client/pages/404.php";
die();
} else {
$username = addslashes($_POST['username']); #Tài Khoản
$type     = addslashes($_POST['type']); #1+ 2-
$money    = addslashes($_POST['amount']); #số tiền
$note     = $_POST['note'];
$check_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($username) || empty($type) || empty($money)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($money < 1) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Tiền Tối Thiểu Là 1đ"]));
} else if(!$check_user) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Website Không Tồn Tại"]));
} else if($check_user['bannd'] > '1') {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Đã Bị Band! Không Thể Thực Hiện"]));
} else {
if($type == "1") {
$cong_tien_user = $check_user['money'] + $money;
$cong_nap_user = $check_user['tong_nap'] + $money;
$ManhDev->update("users", [
            'money' => $cong_tien_user,
            'tong_nap' => $cong_nap_user
            ], " `username` = '$username' ");
if($note) {
$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'money',
                'note'       => "Cộng Tiền Cho Bạn! Lý Do:".$note,
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
}
die(json_encode([
    "status" => "success",
    "msg" => "Cộng Tiền Thành Công"]));
} else if($type == "2") {
if($money > $check_user['money']) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui  Lòng Trừ Lớn Hơn Số Tiền Hiện Có Của Username"]));
} else {
$tru_tien_user = $check_user['money'] - $money;
if($note) {
$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'money',
                'note'       => "Trừ Tiền Của Bạn! Lý Do:".$note,
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
}
$ManhDev->update("users", [
            'money' => $tru_tien_user
            ], " `username` = '$username' ");
die(json_encode([
    "status" => "success",
    "msg" => "Trừ Tiền Thành Công"]));
}
} else {
die(json_encode([
    "status" => "error",
    "msg" => "Loại Thực Thi Không Xác Định"]));
}
}
}