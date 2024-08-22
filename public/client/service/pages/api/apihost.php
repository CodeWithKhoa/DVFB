<?php
# API Hosting Auto Cho Danh Mục Hosting
# Link Của Đường Dẫn Callback Là: https://tên_miền_của_bạn}/api/service/host
# Ví Dụ: https://keyvip.net/api/service/host
# Điền Link Website Của Bạn Vào Chỗ Callback Của Web dailysieure.com Nha
# Api Hosting Được Đấu Qua https://dailysieure.com (Rẻ Nhất và OK Nhất)

include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$keyapi = $key_dlsr; 

$key = addslashes($_GET['key']);

if($key == $keyapi) {
$taikhoan = addslashes($_GET['tk']);

$check_host = $ManhDev->query("SELECT * FROM `history_Host` WHERE `taikhoan` = '$taikhoan' ")->fetch_array();
$username = $check_host['username'];
$tong_tien = $check_host['money'];
$info_user = $ManhDev->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if($check_host) {
$trutientt = $info_user['money'] + $tong_tien;
$congtiendt = $info_user['tong_tru'] - $tong_tien;

$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '$username' ");
$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'hosting',
                'note'       => 'Đac Hủy Host và Hoàn Tiền Lại Tài Khoản',
                'ip'         => '192.168.1.1',
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
$ManhDev->update("history_Host", [
            'status'   => 'thatbai',
            'taikhoan' => '******',
            'matkhau'  => '******',
            ], " `taikhoan` = '$taikhoan' ");
}
}