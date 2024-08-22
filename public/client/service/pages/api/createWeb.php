<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$idSouce = addslashes($_POST['id']);
$domain  = $_POST['domain'];
$timemua = $_POST['time'];

$thoigian = 30 * $timemua;

$info_sourcer = $ManhDev->query("SELECT * FROM `soucerWeb` WHERE `id` = '$idSouce' ")->fetch_array();

$check_host = $ManhDev->query("SELECT * FROM `history_createWeb` WHERE `domain` = '$domain' ")->fetch_array();

$tong_tien = $info_sourcer['money'] * $timemua;

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($idSouce) || empty($domain) || empty($timemua)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Đủ Tiền Để Thực Hiện"]));
} else if($check_host) {
die(json_encode([
    "status" => "error",
    "msg" => "Tên Miền Đã Tồn Tại Trên Website"]));
} else {
date_default_timezone_set('Asia/Ho_Chi_Minh');
$trading = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
$trutientt = $ManhDev->users('money') - $tong_tien;
$congtiendt = $ManhDev->users('tong_tru') + $tong_tien;
$time_stamp = strtotime($time1);
$date = $time_stamp+(int)$thoigian*24*60*60;

$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '".$ManhDev->users('username')."' "); #trừ tiền thành viên

$ManhDev->insert("history_createWeb", [
                'trading'   => $trading,
                'username'  => $ManhDev->users('username'),
                'title'     => $info_sourcer['title'],
                'money'     => $tong_tien,
                'domain'    => $domain,
                'timemua'   => $timemua,
                'status'    => 'xuly',
                'end'       => $date,
                'note_giahan' => 'Tạo Website Thành Công! Đang Chờ Bạn Duyệt',
                'time'      => date('d-m-Y')
                ]);

$ManhDev->insert("log_site", [
                'username'   => $ManhDev->users('username'),
                'type'       => 'code',
                'note'       => 'Tiến Hành Tạo Website Thời Hạn Là '.$timemua.' Tháng',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tong_tien."
Kiểu: Tạo Website
Note: Tiến Hành Tạo Website Thời Hạn L: ".$timemua." | Với Giá: ".$tong_tien;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));

die(json_encode([
    "status" => "success",
    "msg" => "Tạo Website Thành Công, Chờ Kích Hoạt"]));
}
}