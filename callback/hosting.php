<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";

$keyapi = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'api_key_host' ")['value'];

$key = $_GET['key'];

if($key == $keyapi) {
$taikhoan =  $_GET['tk'];

$info_host = $ManhDev->get_row("SELECT * FROM `history_Host` WHERE `taikhoan` = '$taikhoan' ");
$username_ = $info_host['username'];
$money_    = $info_host['money'];
$info_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$username_' ");
$tong_tru  = $info_user['tong_tru'] - $money_; #hoàn lại giá tổng tiêu
$money     = $info_user['money'] + $money_; #hoàn lại số tiền hiện có

$ManhDev->update("users", [
            'money'  => $money,
            'tong_tru' => $tong_tru
            ], " `taikhoan` = '".$info_user['username']."' "); #Hoàn tiền username

$ManhDev->insert("log_site", [
                'username'  => $info_user['username'],
                'type'      => "hosting",
                'note'      => "Hoàn Tiền! Hosting Lỗi - Hãy Kiểm Tra Lại",
                'ip'        => getip(),
                'useragent' => $_SERVER["HTTP_USER_AGENT"],
                'time'      => $time
                ]);

$ManhDev->update("history_Host", [
            'status'  => "thatbai"
            ], " `taikhoan` = '$taikhoan' "); #cập nhật trạng thái
}