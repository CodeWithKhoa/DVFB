<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$key_code = addslashes($_POST['key']);
$amount = addslashes($_POST['amount']);

$check_key = $ManhDev->query("SELECT * FROM `key_log` WHERE `key_code` = '$key_code' ")->fetch_array();
$end_k = $check_key['end'];

$tong_tien = 500 * $amount;

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($key_code) || empty($amount)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin!"]));
} else if($amount <= 0) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Không Nhập 0"]));
} else if($amount < 2) {
die(json_encode([
    "status" => "error",
    "msg" => "Gia Hạn 2 Ngày Trở Lên"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Đủ Số Dư Để Gia Hạn"]));
} else if(!$check_key) {
die(json_encode([
    "status" => "error",
    "msg" => "Key Không Tồn Tại Để Gia Hạn"]));
} else {
$trutientt = $ManhDev->users('money') - $tong_tien;
$congtiendt = $ManhDev->users('tong_tru') + $tong_tien;

$date = $end_k+(int)$amount*24*60*60; #end

$ManhDev->update("key_log", [
            'status' => 'on',
            'end' => $date
            ], " `key_code` = '$key_code' ");

$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '".$ManhDev->users('username')."' ");

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'key',
                'note'       => 'Gia Hạn Key Thành Công',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Gia Hạn Key Thành Công!"
    ]));
}
}