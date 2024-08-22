<?php require('../../../../../config/config.php');

if(empty($_POST['token'])) {
echo msg_error("Trường Api Token Không Được Để Trống");
}

foreach($_POST['data'] as $data) {
$token = check_string($_POST['token']);
$loaithe = check_string($data['loaithe']);
$menhgia = check_string($data['menhgia']);
$seri = check_string($data['serial']);
$pin = check_string($data['pin']);
$code1 = random('123456789', 4).time();

if($demo_website == "on") {
echo msg_error("Website Demo Không Thể Sử Dụng Chức Năng Này");
}

if(empty($loaithe)) {
echo msg_error("Trường Loại Thẻ Không Được Thiế");
continue;
}

if(empty($menhgia)) {
echo msg_error("Trường Mệnh Giá Không Được Thiếu");
continue;
}

if(empty($seri)) {
echo msg_error("Trường Seri Không Được Thiếu");
continue;
}


if(empty($pin)) {
echo msg_error("Trường Mã Thẻ Không Được Thiếu");
continue;
}

if (strlen($seri) < 5 || strlen($pin) < 5) {
echo msg_error("Mã thẻ hoặc seri không đúng định dạng!");
continue;
}

$getUser = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '".$ManhDev->users('username')."' ");
if(!$getUser) {
echo msg_error("Vui Lòng Đăng Nhập Để Sử Dụng Dịch Vụ");
continue;
}

if($ManhDev->get_row("SELECT * FROM `cards` WHERE `seri` = '$seri' AND `pin` = '$pin' AND `loaithe` = '$loaithe' ")) {
echo msg_error("Thẻ Này Đã Tồn Tại Trong Hệ Thống");
continue;
}

if($ManhDev->num_rows("SELECT * FROM `cards` WHERE `status` = 'xuly' AND `username` = '".$ManhDev->users('username')."'  ") >= 10) {
echo msg_error("Bạn Đang Có Nhiều TherDdang Xử Lí, Vui Lòng Chờ 1 Lát Để hệ Thống Xử Lí");
continue;
}

$thucnhan = $menhgia - $menhgia * $ManhDev->site('discountWeb') / 100;

$data = array(
    "telco" => $loaithe,
    "code" => $pin,
    "serial" => $seri,
    "amount" => $menhgia,
    "request_id" => $code1,
    "partner_id" => $Partner_ID,
    "sign" => md5($Partner_KEY.$pin.$seri),
    "command" => "charging"
);

$data_string = json_encode($data);
$ch = curl_init('https://gachthe1s.com/chargingws/v2');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json')
);
$result = curl_exec($ch);
$obj = json_decode($result, true);
$msg = $obj['message'];
if($obj['status'] == '99') {
$ManhDev->insert("cards", [
                'code'      => $code1,
                'taskId'    => 'TRAN DANG KHOA',
                'seri'      => $seri,
                'pin'       => $pin,
                'loaithe'   => $loaithe,
                'menhgia'   => $menhgia,
                'thucnhan'  => $thucnhan,
                'username'  => $ManhDev->users('username'),
                'status'    => 'xuly',
                'note'      => "Đang Kiểm Tra",
                'time'      => $time
                ]);

$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tong_tien."
Kiểu: Gạch Thẻ Cào
Note: Gạch Thẻ Cào: ".$loaithe." | Mệnh Giá: ".$menhgia;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));

        echo msg_success("Hệ Thống Đang Check Thẻ Cào Của Bạn");
        continue;
        } else {
        echo msg_error($msg);
        continue;
        }
}
