<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$id     = addslashes($_POST['id']);
$amount = addslashes($_POST['timemua']);

$check_web = $ManhDev->query("SELECT * FROM `history_createWeb` WHERE `id` = '$id' ")->fetch_array();
$end_k = $check_web['end'];

$thoigian = 30 * $amount;
$tong_tien = 30000 * $amount;

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($id) || empty($amount)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin!"]));
} else if($amount <= 0) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Không Nhập 0"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Đủ Số Dư Để Gia Hạn"]));
} else if(!$check_web) {
die(json_encode([
    "status" => "error",
    "msg" => "Website Không Tồn Tại Để Gia Hạn"]));
} else {
$trutientt = $ManhDev->users('money') - $tong_tien;
$congtiendt = $ManhDev->users('tong_tru') + $tong_tien;

$date = $end_k+(int)$thoigian*24*60*60; #end

$ManhDev->update("history_createWeb", [
            'status' => 'giahan',
            'note_giahan' => $ManhDev->users('username')." Đã Gia Hạn ".tien($amount)." Tháng Với Số Tiền Là ".tien($tong_tien)." Coin, Ngày Hết Hạn Sẽ Là: ".date('d-m-Y', $date),
            'end' => $date
            ], " `id` = '$id' ");

$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '".$ManhDev->users('username')."' ");

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'web',
                'note'       => 'Gia Hạn Website Thành Công',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tong_tien."
Kiểu: Gia Hạn Website
Note: Gia Hạn Website, Ngày Hết Hạn Sẽ Là: ".date('d-m-Y', $date)." | Với Giá: ".$tong_tien;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));

die(json_encode([
    "status" => "success",
    "msg" => "Gia Hạn Website Thành Công!"
    ]));
}
}