<?php
require('../config/config.php');

$callback_sign = md5($Partner_KEY.$_GET['code'].$_GET['serial']);

if($_GET['callback_sign'] == $callback_sign) {
$getdata['status'] = $_GET['status'];
$getdata['message'] = $_GET['message'];
$getdata['request_id'] = $_GET['request_id'];
$getdata['trans_id'] = $_GET['trans_id'];
$getdata['declared_value'] = $_GET['declared_value'];
$getdata['value'] = $_GET['value'];
$getdata['amount'] = $_GET['amount'];
$getdata['code'] = $_GET['code'];
$getdata['serial'] = $_GET['serial'];
$getdata['telco'] = $_GET['telco'];
$code =  $_GET['code'];  
$seri =  $_GET['serial']; 

$card = $ManhDev->get_row("SELECT * FROM `cards` WHERE `seri` = '$seri' AND `pin` = '$code' ");
if($_GET['status'] == "1") {
$thucnhan  = $card['thucnhan'];
$usern     = $card['username'];
$us_       = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$usern' "); #kiểm tra username
$tong_nap  = $us_['tong_nap'] + $thucnhan;
$tong_tien = $us_['money'] + $thucnhan;

$ManhDev->update("cards", [
            'status'  => "hoantat",
            'note' => "Nạp Thẻ Thành Công"
            ], " `seri` = '$seri' AND `pin` = '$code' ");

$ManhDev->update("users", [
            'tong_nap'  => $tong_nap,
            'money'     => $tong_tien
            ], " `username` = '".$us_['username']."' ");

$ManhDev->insert("log_site", [
                'username'  => $us_['username'],
                'type'      => "cards",
                'note'      => "Nạp Thẻ Cào Thành Công Và Nhận Được ".tien($thucnhan)." Coin",
                'ip'        => getip(),
                'useragent' => $_SERVER["HTTP_USER_AGENT"],
                'time'      => $time
                ]);

} else {
$ManhDev->update("cards", [
            'status'  => "thatbai",
            'note' => "Nạp Thẻ Thất Bại"
            ], " `seri` = '$seri' AND `pin` = '$code' ");

$ManhDev->insert("log_site", [
                'username'  => $card['username'],
                'type'      => "cards",
                'note'      => "Nạp Thẻ Cào Thất Bại Và Nhận Được 0 Coin",
                'ip'        => getip(),
                'useragent' => $_SERVER["HTTP_USER_AGENT"],
                'time'      => $time
                ]);
}
} else {
echo json_encode([
    "status" => "error",
    "mesenger" => "Tạo 1 Website Hoàn Hảo Khi Liên Hệ Với Tôi"
    ]);
}


