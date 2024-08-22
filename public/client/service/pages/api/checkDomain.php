<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$mien = $_POST['domain'];
$checkhttp = explode('://',$mien)[1]; #link https

if($checkhttp) {
$website = $checkhttp;
} else {
$website = $mien;
}
function checkmien($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'Accept-Language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'Cache-Control: no-cache',
        'Connection: keep-alive',
        'Pragma: no-cache',
        'Sec-Fetch-Dest: document',
        'Sec-Fetch-Mode: navigate',
        'Sec-Fetch-Site: none',
        'Sec-Fetch-User: ?1',
        'Upgrade-Insecure-Requests: 1',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, 'muid_mly=NnqHSofMuCk7BSi+yzRvsjX9cz2/7Ej/lIYQFo2/prpBWZrOzp7+Gw4cGOFaI4cAG2ce0UHdKo1F8MyzbIEy8ev2xvQSXrF3/o79pnbG3JfA1bOuH96Ny2BFwzCnHtD/y+WWjG0PrpAG; CAKEPHP=7addf6e2e62c13c0f7133b7dd4d86ba2');
    
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
$tenmien = explode('.',$website)[0]; #tên miền
$duoimien = explode('.',$website)[1]; #đuôi miền

if(empty($ManhDev->users('username'))) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($mien)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Tên Miền Cần Check"]));
} else if(empty($tenmien)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Tên Miền Cần Check"]));
} else if(empty($duoimien)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đuôi Miền Cần Check"]));
} else {
$check = checkmien("https://tenten.vn/api/check/?domain=".$website);
if($check == "1") {
die(json_encode([
    "status" => "success",
    "msg" => "Tên Miền Này Có Thể Mua! Liên Hệ ADMIN Để Mua Ngay!"]));
} else {
die(json_encode([
    "status" => "error",
    "msg" => "Tên Miền Này Đã Có Người Mua "]));
}
}
}