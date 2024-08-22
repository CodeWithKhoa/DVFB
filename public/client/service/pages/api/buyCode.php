<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$idSouce = addslashes($_POST['id']);

$info_sourcer = $ManhDev->query("SELECT * FROM `soucerCode` WHERE `id` = '$idSouce' ")->fetch_array();
$tong_tien = $info_sourcer['money'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($idSouce)) {
die(json_encode([
    "status" => "error",
    "msg" => "Thiếu Dữ Liệu Đầu Vào"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Đủ Tiền Để Thực Hiện"]));
} else {
$trading = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
$trutientt = $ManhDev->users('money') - $tong_tien;
$congtiendt = $ManhDev->users('tong_tru') + $tong_tien;
$congdown = $info_sourcer['download'] + 1;


$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '".$ManhDev->users('username')."' "); #trừ tiền thành viên

$ManhDev->update("soucerCode", [
            'download' => $congdown,
            ], " `id` = '$idSouce' "); #update lượt tải

$ManhDev->insert("history_Code", [
                'username'  => $ManhDev->users('username'),
                'title'     => $info_sourcer['title'],
                'money'     => $tong_tien,
                'trading'   => $trading,
                'link'      => $info_sourcer['linkDown'],
                'time'       => $time
                ]);

$ManhDev->insert("log_site", [
                'username'   => $ManhDev->users('username'),
                'type'       => 'code',
                'note'       => 'Thanh Toán Hóa Đơn Mua Sourcer Code',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tongtien."
Kiểu: Mua Source Code
Note: Thanh Toán Hóa Đơn Mua Sourcer Code: ".$info_sourcer['title']." | Với Giá: ".$tong_tien;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));

die(json_encode([
    "status" => "success",
    "msg" => "Mua Sourcer Code Thành Công"]));
}
}