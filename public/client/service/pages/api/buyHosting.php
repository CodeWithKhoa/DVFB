<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$mien = $_POST['domain']; #tên miền
$goi = $_POST['typeHost']; #loại host

$check_host = $ManhDev->query("SELECT * FROM `history_Host` WHERE `domain` = '$mien' ")->fetch_array();

$check_buy_host = $ManhDev->query("SELECT * FROM `list_Host` WHERE `code` = '$goi' ")->fetch_array(); #list hosting
$tong_tien = $check_buy_host['money'];

$get_admin = $ManhDev->query("SELECT * FROM `users` WHERE `level` = '3' ")->fetch_array();
$mail_admin = $get_admin['email'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($mien) || empty($goi)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin!"]));
} else if(empty($check_buy_host) or !$check_buy_host) {
die(json_encode([
    "status" => "error",
    "msg" => "Gói Hosting Không Tồn Tại"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Đủ ".tien($tong_tien)."đ Để Mua Host"]));
} else if($check_host) {
die(json_encode([
    "status" => "error",
    "msg" => "Miền Đã Tồn Tại Trên Hệ Thống"]));
} else {
$trutientt = $ManhDev->users('money') - $tong_tien;
$congtiendt = $ManhDev->users('tong_tru') + $tong_tien;

$time1 = date("d-m-Y");
$time_stamp = strtotime($time1);
$date = $time_stamp+(int)30*24*60*60;

$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '".$ManhDev->users('username')."' ");

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'hosting',
                'note'       => 'Đăng Kí Hosting Thành Công',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$ManhDev->insert("history_Host", [
                'username'   => $ManhDev->users('username'),
                'goi'        => $check_buy_host['title'],
                'taikhoan'   => null,
                'matkhau'    => null,
                'ngaymua'    => $time_stamp,
                'ngayhet'    => $date,
                'domain'     => $mien,
                'money'      => $tong_tien,
                'status'     => 'xuly'
                ]);

$note_mail = "Tài Khoản ".$ManhDev->users('username')." Đăng Kí Gói Hosting ".$goi." Với Giá ".tien($tong_tien)." Coin, Vui Lòng Vào Trang Quản Trị Tiến Hành Bấm Duyệt!";
guimail($mail_admin, $note_mail);

$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tong_tien."
Kiểu: Mua Hosting 
Note: Đăng Kí Gói Hosting: ".$goi." | Với Giá: ".$tong_tien." | Vui Lòng Vào Trang Quản Trị Tiến Hành Bấm Duyệt!";
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));


die(json_encode([
    "status" => "success",
    "msg" => "Đăng Kí Hosting Thành Công!"
    ]));
}
}