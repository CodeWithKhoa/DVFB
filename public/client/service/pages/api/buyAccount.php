<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$id = addslashes($_POST['id']);
$amount = addslashes($_POST['amount']);

$info_category = $ManhDev->query("SELECT * FROM `category` WHERE `id` = '$id' ")->fetch_array();
$code = $info_category['code'];
$money_ = $info_category['money'];
$query_taikhoan = $ManhDev->query("SELECT * FROM `account` WHERE `code` = '$code' AND `trading` is null ");
$query_category = $ManhDev->query("SELECT * FROM `category` WHERE `code` = '$code' AND `status` = 'on' ");
$tong_tien = $money_ * $amount;

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($amount)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Số Lượng Cần Mua"]));
} else if(empty($id)) {
die(json_encode([
    "status" => "error",
    "msg" => "ID Dịch Vụ Không Được Để Trống"]));
} else if($amount <= 0) {
die(json_encode([
    "status" => "error",
    "msg" => "Mua Tối Thiểu Là 1 Tài Khoản"]));
} else if($soluong > 10000) {
die(json_encode([
    "status" => "error",
    "msg" => "Mua Tối Đa Là 10.000 Tài Khoản"]));
} else if($query_category->num_rows <= 0) {
die(json_encode([
    "status" => "error",
    "msg" => "Không Tồn Tại Sản Phẩm Này"]));
} else if($query_taikhoan->num_rows < $amount) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Nguyên Trên Hệ Thống Không Đủ"]));
} else if($ManhDev->users('money') < $tong_tien) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Không Đủ Số Dư Thanh Toán"]));
} else if($ManhDev->users('bannd') == 1) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Của Bạn Đã Bị Vi Phạm Chính Sách Cộng Đồng Của Chúng Tôi"]));
} else {
$trading = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
$trutientt = $ManhDev->users('money') - $tong_tien;
$congtiendt = $ManhDev->users('tong_tru') + $tong_tien;
$ManhDev->update("users", [
            'money' => $trutientt,
            'tong_tru' => $congtiendt
            ], " `username` = '".$ManhDev->users('username')."' "); #trừ tiền thành viên
$ManhDev->update("account", [
            'trading'  => $trading,
            'username' => $ManhDev->users('username'),
            'time'     => $time
            ], " `username` IS NULL AND `code` = '$code' LIMIT ".$amount." "); #cập nhật người mua acc
$ManhDev->insert("orders", [
                'username'  => $ManhDev->users('username'),
                'title'     => $info_category['title'],
                'amount'    => $amount,
                'money'     => $tong_tien,
                'trading'   => $trading,
                'time'      => $time
                ]);
$ManhDev->insert("log_site", [
                'username'   => $ManhDev->users('username'),
                'type'       => 'account',
                'note'       => 'Thanh Toán Hóa Đơn #'.$trading,
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tong_tien."
Kiểu: Mua Tài Khoản
Note: Thực Hiện Lệnh Mua Tài Khoản: ".$info_category['title']." | Với Giá: ".$tong_tien;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));
die(json_encode([
    "status" => "success",
    "msg" => "Mua Tài Khoản Thành Công"]));
}
}
?>