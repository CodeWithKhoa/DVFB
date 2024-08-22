<?php include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
} else {
$loaithe = check_string($_POST['loaithe']);
$menhgia = check_string($_POST['menhgia']);
$seri = check_string($_POST['seri']);
$pin = check_string($_POST['pin']);
$code1 = check_string($_POST['request']);
$thucnhan = $menhgia - $menhgia * $ManhDev->site('discountWeb') / 100;

if(empty($username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($loaithe)  || empty($menhgia) || empty($seri) || empty($pin)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if(strlen($seri) < 5 || strlen($pin) < 5) {
die(json_encode([
    "status" => "error",
    "msg" => "Độ Dài Mã Thẻ Hoặc Số Seri Không Hợp Lệ!"]));
} else {
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
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
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
                    'taskId'    => 'TĐK | Zalo:0936763612',
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
                  
            die(json_encode([
                    "status" => "success",
                    "msg" => "Hệ Thống Đang Check Thẻ Cào Của Bạn"]));
        } else {
            if($msg=='charging.card_existed'){
                die(json_encode([
                "status" => "error",
                "msg" => 'Thẻ cào đã tồn tại  trên hệ thống.']));
            }
            if($msg=='REQUEST_ID_EXISTED'){
                die(json_encode([
                "status" => "error",
                "msg" => 'Bạn vui lòng thử lại.']));
            }
            if($msg=='charging.invalid_card_code'){
                   die(json_encode([
                "status" => "error",
                "msg" => 'Nạp mã thẻ không hợp lệ.'])); 
            }
            
            die(json_encode([
                "status" => "error",
                "msg" => $msg]));
                
        }
}
}