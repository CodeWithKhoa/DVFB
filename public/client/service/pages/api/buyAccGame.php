<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$idGame = addslashes($_POST['id']);

$info_accgame = $ManhDev->query("SELECT * FROM `listGame` WHERE `idGame` = '$idGame' ")->fetch_array();
$tong_tien = $info_accgame['giagiam'];
$service = $info_accgame['code_categories'];
$info_categories = $ManhDev->get_row("SELECT * FROM `categoriesGame` WHERE `code` = '$service' ");

if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($idGame)) {
die(json_encode([
    "status" => "error",
    "msg" => "Thiếu Dữ Liệu Đầu Vào"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Đủ Tiền Để Thực Hiện"]));
} else if(empty($info_accgame)) {
die(json_encode([
    "status" => "error",
    "msg" => "Thiếu Dữ Liệu Đầu Vào"]));
} else {
$trading = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
$trutientt = $ManhDev->users('money') - $tong_tien;
$congtiendt = $ManhDev->users('tong_tru') + $tong_tien;

$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '".$ManhDev->users('username')."' "); #trừ tiền thành viên
            
$ManhDev->update("listGame", [
            'trading' => $trading,
            'status' => "daban"
            ], " `idGame` = '$idGame' ");

$ManhDev->insert("history_accGame", [
                'username'  => $ManhDev->users('username'),
                'title'     => $info_categories['title'],
                'idGame'    => $idGame,
                'money'     => $tong_tien,
                'trading'   => $trading,
                'noteAcc'   => $info_accgame['noteAccount'],
                'time'      => $time
                ]);

$ManhDev->insert("log_site", [
                'username'   => $ManhDev->users('username'),
                'type'       => 'code',
                'note'       => 'Thanh Toán Hóa Đơn Mua Tài Khoản Game',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tong_tien."
Kiểu: Mua Tài Khoản Game
Note: Thực Hiện Lệnh Mua Tài Khoản Game Với Gia: ".$tong_tien;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));
die(json_encode([
    "status" => "success",
    "msg" => "Mua Thành Công"]));
}
}