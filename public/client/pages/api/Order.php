<?php include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
} else {
$code_type     = $_POST['code']; #code của dịch vụ đó
$idpost        = $_POST['idpost']; #id cần buff
$server_order  = $_POST['server_order']; #sever cần mua
$amount        = $_POST['amount']; #số lượng cần mua
$note          = $_POST['note']; #ghi chú nếu có
$comment       = $_POST['comment']; #nội dung bình luận nếu buff cmt

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
$ManhDev_ = $ManhDev->get_row("SELECT * FROM `type` WHERE `code` = '$code_type' ");
$ManhDev__ = $ManhDev->get_row("SELECT * FROM `server` WHERE `sever` = '$server_order' ");

$tong_tien = $ManhDev__['money'] * $amount;

if(empty($username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($idpost)) {
die(json_encode([
    "status" => "error",
    "msg" => "UID Không Được Để Trống"]));
} else if(empty($server_order)) {
die(json_encode([
    "status" => "error",
    "msg" => "Sever Mua Không Được Để Trống"]));
} else if(empty($amount)) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Lượng Không Được Để Trống"]));
} else if(!$ManhDev_) {
die(json_encode([
    "status" => "error",
    "msg" => "Dịch Vụ Mua Không Tồn Tại"]));
} else if(!$ManhDev__) {
die(json_encode([
    "status" => "error",
    "msg" => "Server Mua Không Tồn Tại"]));
} else if($amount > $ManhDev__['max_buff']) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Lượng Mua Vượt Quá Mức Cho Phép"]));
} else if($ManhDev__['status'] == "off") {
die(json_encode([
    "status" => "error",
    "msg" => "Server Đang Bảo Trì"]));
} else if($ManhDev_['type'] == "cmt") {
if(empty($comment)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Nội Dung Bình Luận"]));
}
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Đủ Tiền Để Thực Hiện Dịch Vụ"]));
} else {
$trading = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
$tru_tien_user = $ManhDev->users('money') - $tong_tien;
$da_tieu_user = $ManhDev->users('tong_tru') + $tong_tien;

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'order',
                'note'       => 'Tạo Đơn Dịch Vụ '.$ManhDev_['type_service'].' '.$tong_tien.'đ ',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$ManhDev->update("users", [
            'money' => $tru_tien_user,
            'tong_tru' => $da_tieu_user
            ], " `username` = '".$ManhDev->users('username')."' ");

$ManhDev->insert("history_Dvmxh", [
                'username'  => $username,
                'trading'   => $trading,
                'type_service' => $ManhDev_['type_service'],
                'uid'       => $idpost,
                'sever'     => 'Sever '.$server_order,
                'amount'    => $amount,
                'money'     => $tong_tien,
                'cmt'       => $comment,
                'type'      => $ManhDev_['type'],
                'note'      => $note,
                'status'    => 'xuly',
                'time'      => $time
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Tạo Đơn Hàng Dịch Vụ Thành Công"]));
}
}