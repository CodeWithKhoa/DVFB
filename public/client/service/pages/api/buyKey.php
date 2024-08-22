<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
date_default_timezone_set('Asia/Ho_Chi_Minh');
$name = addslashes($_POST['name']);
$key_code = addslashes($_POST['key']);
$amount = addslashes($_POST['amount']);

$check_key = $ManhDev->query("SELECT * FROM `key_log` WHERE `key_code` = '$key_code' ")->fetch_array();

$tong_tien = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'money_key' ")['value'] * $amount;

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($name) || empty($key_code) || empty($amount)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin!"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Đủ ".tien($tong_tien)."đ Để Thực Hiện Giao Dịch"]));
} else if($amount < 2) {
die(json_encode([
    "status" => "error",
    "msg" => "Mua Tối Thiểu Là 2 Ngày"]));
} else if($amount <= 0) {
die(json_encode([
    "status" => "error",
    "msg" => "Không Được Nhập 0"]));
} else if($check_key) {
die(json_encode([
    "status" => "error",
    "msg" => "Key Này Bị Vi Phạm! Mua Key Khác"]));
} else {

$trutientt = $ManhDev->users('money') - $tong_tien;
$congtiendt = $ManhDev->users('tong_tru') + $tong_tien;

$time1 = date("d-m-Y");
$time_stamp = strtotime($time1);
$date = $time_stamp+(int)$amount*24*60*60;

$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '".$ManhDev->users('username')."' ");

$ManhDev->insert("key_log", [
                'username'    => $username,
                'name'        => $name,
                'key_code'    => $key_code,
                'amount'      => $amount,
                'start'       => $time_stamp,
                'end'         => $date,
                'status'      => 'on'
                ]);

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'key',
                'note'       => 'Mua Key Thành Công',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tong_tien."
Kiểu: Mua Key Tool
Note: Mua Key Tool Với Giá: ".$tong_tien;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));

die(json_encode([
    "status" => "success",
    "msg" => "Mua Key Thành Công!"
    ]));
}
}