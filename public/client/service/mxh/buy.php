<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include$_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
} else {
include $_SERVER['DOCUMENT_ROOT'].'/tds.php';
$code = $_POST['code'];
$type = $_POST['type'];
$uid = $_POST['idpost'];
$server = $_POST['server_order'];
$amount = $_POST['amount'];
$note = $_POST['note'];

$ManhDev__ = $ManhDev->get_row("SELECT * FROM `server` WHERE `sever` = '$server' AND `code_service` = '$code' AND `code_type` = '$type' ");

if(empty($ManhDev->users('username'))) {
die(json_encode([
        "status" => "error",
        "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"
        ]));
} else if(empty($code) || empty($type) || empty($server)) {
die(json_encode([
        "status" => "error",
        "msg" => "Dữ Liệu Truyền Vào Không Chính Xác"
        ]));
} else if(empty($uid)) {
die(json_encode([
        "status" => "error",
        "msg" => "UID Hoặc Link Không Được Để Trống"
        ]));
} else if(empty($amount)) {
die(json_encode([
        "status" => "error",
        "msg" => "Số Lượng Mua Không Được Để Trống"
        ]));
} else {
if($code == "like-post") {
$reaction = $_POST['reaction'];
if(empty($reaction)) {
die(json_encode([
        "status" => "error",
        "msg" => "Dữ Liệu Truyền Vào Không Chính Xác"
        ]));
}
} else if($code == "comment") {
$comment = $_POST['comment'];

if(empty($comment)) {
die(json_encode([
        "status" => "error",
        "msg" => "Nội Dung Comment Không Được Để Trống"
        ]));
}
} else if($code == "eye-live") {
$minutes = $_POST['minutes'];

if(empty($minutes)) {
die(json_encode([
        "status" => "error",
        "msg" => "Số Phút Không Được Để Trống"
        ]));
}

if($minutes < 1) {
die(json_encode([
        "status" => "error",
        "msg" => "Số Phút Tối Thiểu Là 1"
        ]));
}
} else if($code == "view-video") {
$time_video = $_POST['time'];

if(empty($time_video)) {
die(json_encode([
        "status" => "error",
        "msg" => "Dữ Liệu Truyền Vào Không Chính Xác"
        ]));
}


if($time_video == '3' or $time_video == '10' or $time_video == '15') {
} else {
die(json_encode([
        "status" => "error",
        "msg" => "Thời Gian Không Hợp Lệ"
        ]));
}
} else if($code == "vip-like") {
$days = $_POST['days'];

if(empty($days)) {
die(json_encode([
        "status" => "error",
        "msg" => "Dữ Liệu Truyền Vào Không Chính Xác"
        ]));
}

if($days !== '30' or $days !== '60' or $days !== '90') {
} else {
die(json_encode([
        "status" => "error",
        "msg" => "Thời Gian Không Hợp Lệ"
        ]));
}

if($amount !== '100' or $amount !== '150' or $amount !== '200' or $amount !== '300' or $amount !== '500' or $amount !== '600' or $amount !== '700' or $amount !== '800' or $amount !== '900' or $amount !== '1000' or $amount !== '1500' or $amount !== '2000') {
die(json_encode([
        "status" => "error",
        "msg" => "Số Lượng Mua Không Hợp Lệ"
        ]));
}
}

if($code == "like-post") {
$loai='cx-'.$_POST['reaction'];
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "sub-follow") {
$loai='follow';
if($type=='instagram'){
    $loai='instagram_follow';
}
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "like-page") {
$loai='fanpage';
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "comment") {
$loai='comment';
if($type=='instagram'){
    $loai='instagram_comment';
}
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "eye-live") {
$data = json_encode([
    "object_id" => $uid,
    "server_id" => $server,
    'platform' => $type,
    'service' => 'eyes-live',
    'quantity' => $amount,
    'minutes' => $minutes
    ]);
$tongtien = $amount * $ManhDev__['money'] * $minutes;
} else if($code == "view-video") {
$data = json_encode([
    "object_id" => $uid,
    "server_id" => $server,
    'platform' => $type,
    'service' => 'view-video',
    'quantity' => $amount,
    'time' => $time_video
    ]);

$tongtien = $amount * $ManhDev__['money'] * $time_video;
} else if($code == "share") {
$loai='share';
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "member-group") {
$loai='group';
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "view-story") {
$loai='viewstr';
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "vip-like") {
$data = json_encode([
    "object_id" => $uid,
    "server_id" => $server,
    'platform' => $type,
    'service' => 'vip-like',
    'quantity' => $amount
    ]);
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "like") {
if($type=='instagram'){
    $loai='instagram_like';
}
$data = json_encode([
    "object_id" => $uid,
    "server_id" => $server,
    'platform' => $type,
    'service' => 'like',
    'quantity' => $amount
    ]);
$tongtien = $amount * $ManhDev__['money'];
} else if($code == "view") {
$data = json_encode([
    "object_id" => $uid,
    "server_id" => $server,
    'platform' => $type,
    'service' => 'view',
    'quantity' => $amount
    ]);
$tongtien = $amount * $ManhDev__['money'];
} else {
die(json_encode([
        "status" => "error",
        "msg" => "Dữ Liệu Truyền Vào Không Chính Xác"
        ]));
}

if($ManhDev->users('money') < $tongtien) {
die(json_encode([
        "status" => "error",
        "msg" => "Tài Khoản Không Đủ Để Thực Hiện! Hãy Nạp Thêm"
        ]));
} else if($tongtien <= 0) {
    die(json_encode([
        "status" => "error",
        "msg" => "Máy Chủ Đang Lỗi! Thử Lại Sau Vài Lần"
        ]));
} else {



$order_auto = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'order_auto' ")['status'];
if($order_auto == "ON") {
$mua=lendon($loai,$uid,$comment,$amount,$note);
//echo $mua;
if($mua=='success'){
$trading = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
$tru_tien_user = $ManhDev->users('money') - round($tongtien);
$da_tieu_user = $ManhDev->users('tong_tru') + round($tongtien);

$ManhDev->insert("log_site", [
                'username'   => $ManhDev->users('username'),
                'type'       => 'order',
                'note'       => 'Tăng '.$amount.' ở máy chủ ['.$server.'] cho đường dẫn: '.$uid.', trừ '.$tongtien.' coin trong tài khoản',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
                
$ManhDev->update("users", [
            'money' => $tru_tien_user,
            'tong_tru' => $da_tieu_user
            ], " `username` = '".$ManhDev->users('username')."' ");

$ManhDev->insert("history_Dvmxh", [
                'username'  => $ManhDev->users('username'),
                'user_tds' => $_SESSION['usernametds'],
                'trading'   => $trading,
                'type_service' => $type,
                'type_server' => $code,
                'uid'       => $uid,
                'sever'     => $server,
                'amount'    => $amount,
                'money'     => $tongtien,
                'note'      => $note,
                'status'    => 'xuly',
                'time'      => $time
                ]);
                


$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tongtien."
Kiểu: Đơn TĐS
Note: Thực Hiện Tăng ở Dịch Vụ: ".$code." | Mua ".$amount." Tương Tác Tại Máy Chủ ".$server." | Đường Dẫn: ".$uid;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
tele("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));
    die(json_encode([
        "status" => "success",
        "msg" => "Mua Thành Công!"
        ]));
}else if($mua=='ít' and $loai == "like"){
    die(json_encode([
        "status" => "error",
        "msg" => "Bạn Mua Tối Thiểu 20"
        ]));
}else if($mua=='ít'){
    die(json_encode([
        "status" => "error",
        "msg" => "Bạn Mua Tối Thiểu 30"
        ]));
} else {
    die(json_encode([
        "status" => "error",
        "msg" => "Bạn Vui Lòng Bật Công Khai Hoặc Chưa Đúng id"
        ]));
}
///hết tds
} else {
$url = "https://trum24h.pro/api/order/create";
$header = array(
        'Content-Type: application/json',
        'x-api-key: '.$api_subgiare
    );
$curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => $header
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $ketqua = json_decode($response);
    $status = $ketqua->status;
    $message = $ketqua->message;
    
    if(empty($message)) {
    die(json_encode([
    "status" => "error",
    "msg" => "IP Ngoài Không Thể Sử Dụng"]));
    } else if($status == 'error') {
    die(json_encode([
    "status" => "error",
    "msg" => $message]));
    } else {
    
$trading = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
$tru_tien_user = $ManhDev->users('money') - round($tongtien);
$da_tieu_user = $ManhDev->users('tong_tru') + round($tongtien);

$ManhDev->insert("log_site", [
                'username'   => $ManhDev->users('username'),
                'type'       => 'order',
                'note'       => 'Tăng '.$amount.' ở máy chủ ['.$server.'] cho đường dẫn: '.$uid.', trừ '.$tongtien.' coin trong tài khoản',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
                
$ManhDev->update("users", [
            'money' => $tru_tien_user,
            'tong_tru' => $da_tieu_user
            ], " `username` = '".$ManhDev->users('username')."' ");

$ManhDev->insert("history_Dvmxh", [
                'username'  => $ManhDev->users('username'),
                'trading'   => $trading,
                'type_service' => $type,
                'type_server' => $code,
                'uid'       => $uid,
                'sever'     => $server,
                'amount'    => $amount,
                'money'     => $tongtien,
                'note'      => $note,
                'status'    => 'xuly',
                'time'      => $time
                ]);
                
$noidung = "
Thời gian: $time
Tài khoản: ".$ManhDev->users('username')."
Trừ Tiền: ".$tongtien."
Kiểu: Auto Site
Note: Thực Hiện Tăng ở Dịch Vụ: ".$code." | Mua ".$amount." Tương Tác Tại Máy Chủ ".$server." | Đường Dẫn: ".$uid;
$id_tele = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];
file_get_contents("https://api.telegram.org/bot".$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value']."/sendMessage?chat_id=".$id_tele."&text=".urlencode($noidung));
                
    die(json_encode([
        "status" => "success",
        "msg" => "Mua Thành Công!"
        ]));
    }

}
}
}
}
function tele($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: api.telegram.org',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: no-cache',
        'pragma: no-cache',
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
    ]);
    
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}