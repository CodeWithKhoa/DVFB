<?php include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
} else {
if($_POST['type'] == "getuser") {
$username = addslashes($_POST['nguoinhan']);

$check_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");
$ho_ten = $check_user['name'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($username)) { ?>
<td>Tên Tài Khoản:</td>
<td><input class="form-control" placeholder="Vui Lòng Nhập Username Nhận" disabled></td>
<?php
} else if(!$check_user) { ?>
<td>Tên Tài Khoản:</td>
<td><input class="form-control" placeholder="Tài Khoản Nhận Không Tồn Tại" disabled></td>
<?php
} else if($check_user['bannd'] > '1') { ?>
<td>Tên Tài Khoản:</td>
<td><input class="form-control" placeholder="Tài Khoản Này Đã Bị Band Vì Vi Phạm Tiêu Chuẩn Cộng Đồng" disabled></td>
<?php
} else { ?>
<td>Tên Tài Khoản:</td>
<td><input class="form-control" placeholder="<?=$ho_ten;?>" disabled></td>
<?php
}
}

if($_POST['type'] == "chuyentien") {
$usernamen = addslashes($_POST['nguoinhan']);
$money = addslashes($_POST['amount']);
$note = $_POST['note'];

$check_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$usernamen' ");

$tong_tien = $money + 100;
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($usernamen) || empty($money) || empty($note)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Dư Của Bạn Không Đủ Để Thực Hiện"]));
} else if($money > 20000000) {
die(json_encode([
    "status" => "error",
    "msg" => "Chuyển Tối Đa Trong 1 Tháng Là 20.000.000 VND"]));
} else if($money < 10000) {
die(json_encode([
    "status" => "error",
    "msg" => "Tối Thiểu Chuyển Là 10.000đ"]));
} else if(empty($check_user)) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Nhận Không Hợp Lệ"]));
} else if($ManhDev->users('username') == $usernamen) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Nhận Phải Khác Tài Khoản Gửi"]));
} else {
$trans_id = rand(10000, 999999);

$tong_tien = $ManhDev->users('money') - $money;
$tong_cong = $ManhDev->users('tong_tru') + $money;
$nguoingan_money = $check_user['money'] + $money;

$ManhDev->insert("transferMoney", [
                'username' => $ManhDev->users('username'),
                'receiver' => $usernamen,
                'money'    => $money,
                'note'     => $note,
                'time'     => $time
                ]);

$ManhDev->update("users", [
            'money' => $tong_tien,
            'tong_tru' => $tong_cong
            ], " `username` = '".$ManhDev->users('username')."' "); #trừ tiền người chuyển

$ManhDev->update("users", [
            'money' => $nguoingan_money
            ], " `username` = '$usernamen' "); #cộng tiền người nhận

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'transfer',
                'note'       => 'Tạo Lệnh Chuyển Tiền',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tongtien."
Kiểu: Chuyển Tiền
Note: Thực Hiện Lệnh Chuyển ".$nguoingan_money." Tới Username: ".$usernamen;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));

die(json_encode([
    "status" => "success",
    "msg" => "Chuyển Tiền Đến ".$usernamen." Thành Công!"]));
}


}


}