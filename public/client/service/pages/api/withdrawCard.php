<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$ngan_hang = $_POST['banking'];
$ctk       = $_POST['ctk'];
$stk       = $_POST['stk'];
$chi_nhanh = $_POST['chi_nhanh'];
$money     = $_POST['money'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($ngan_hang) || empty($ctk) || empty($stk) || empty($chi_nhanh) || empty($money)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($ManhDev->users('money') < $money) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Đủ Tiền Tạo Lệnh"]));
} else if($money < 50000) {
die(json_encode([
    "status" => "error",
    "msg" => "Rút Tối Thiểu Là 50.000 VND"]));
} else {
$tong_tien = $ManhDev->users('money') - $money;
$tong_cong = $ManhDev->users('tong_tru') + $money;


$ManhDev->insert("withdrawCard", [
                'username'    => $ManhDev->users('username'),
                'banking'     => $ngan_hang,
                'nameBank'    => $ctk,
                'numberBank'  => $stk,
                'branchBank'  => $chi_nhanh,
                'statusBank'  => 'xuly',
                'moneyBank'   => $money,
                'time'        => $time
                ]);

$ManhDev->update("users", [
            'money' => $tong_tien,
            'tong_tru' => $tong_cong
            ], " `username` = '".$ManhDev->users('username')."' ");

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'withdraw',
                'note'       => 'Tạo Lệnh Rút Tiền',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tong_tien."
Kiểu: Rút Tiền Tài Khoản
Note: Tạo Lệnh Rút Tiền: ".$money." Coin";
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));

die(json_encode([
    "status" => "success",
    "msg" => "Tạo Lệnh Rút Tiền Thành Công!"]));
}
}