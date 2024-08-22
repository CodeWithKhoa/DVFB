<?php require('../../../../config/config.php');
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
if($_POST['type'] == "login") {
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$userCaptcha = addslashes($_POST['captcha']);
/// check captcha
if ($userCaptcha === ""){
    die(json_encode([
        "status" => "error",
        "msg" => "Vui lòng nhập captcha"]));
} else if ($userCaptcha === $_SESSION['captcha']) {
    $_SESSION['captcha']="";
    // Xử lý logic tiếp theo ở đây
} else {
    die(json_encode([
        "status" => "error",
        "msg" => "Mã captcha sai vui lòng nhập lại"]));
}

$check_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");

if(empty($username) || empty($password)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if(!$check_user) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Không Tồn Tại"]));
} else if($check_user['password'] !== $password) {
die(json_encode([
    "status" => "error",
    "msg" => "Mật Khẩu Không Chính Xác"]));
} else if($check_user['bannd'] > '1') {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Đã Bị Band Vì Vi Phạm Tiêu Chuẩn Cộng Đồng"]));
} else if($check_user['securityEmail'] == "1") {
$ma_xac_thuc = rand(1000, 9999);
$ManhDev->update("users", [
            'otp_code' => $ma_xac_thuc,
            'lastdate' => $time
            ], " `username` = '$username' ");
$note = "Mã Xác Thực Email Của Bạn là: <code>$ma_xac_thuc</code>";
$mail = $check_user['email'];
echo guimail($mail, $note);
die(json_encode([
    "status" => "Mail",
    "msg" => "Vui Lòng Nhập Mã Mà Chúng Tôi Gửi Vào Gmail"]));
} else if($check_user['securityPass'] == "1") {
die(json_encode([
    "status" => "Pass",
    "msg" => "Vui Lòng Nhập Mật Khẩu Cấp 2"]));
} else {

$ManhDev->update("users", [
            'otp_code' => NULL,
            'lastdate' => $time
            ], " `username` = '$username' ");
        
$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'login',
                'note'       => 'Đăng Nhập Vào Hệ Thống',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$_SESSION['username'] = $username;

die(json_encode([
    "status" => "success",
    "msg" => "Đăng Nhập Thành Công!"]));
}
}

if($_POST['type'] == "signup") {
$name     = addslashes($_POST['name']);
$phone    = addslashes($_POST['phone']);
$email    = $_POST['email'];
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$api_token = api_token();
$captcha = $_POST['captcha'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}

$check_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");

$check_phone = $ManhDev->get_row("SELECT * FROM `users` WHERE `phone` = '$phone' ");

$check_email = $ManhDev->get_row("SELECT * FROM `users` WHERE `email` = '$email' ");
$secretkey=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'secret-key-captcha' ")['value'];
$response = json_decode(checkcaptcha($secretkey,$captcha),true);
if(empty($username) || empty($password) || empty($name) || empty($phone) || empty($email)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if(empty($captcha)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Captcha!"]));
} else if($response['success']==false){
die(json_encode([
    "status" => "error",
    "msg" => "Mã captcha không hợp lệ"]));
} else if($check_user) {
die(json_encode([
    "status" => "error",
    "msg" => "Tài Khoản Đã Tồn Tại Trên Hệ Thống"]));
} else if($check_email) {
die(json_encode([
    "status" => "error",
    "msg" => "Email Đã Tồn Tại Trên Hệ Thống"]));
} else if($check_phone) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Điện Thoại Đã Tồn Tại Trên Hệ Thống"]));
} else {
        
$ManhDev->insert("users", [
                'username'      => $username,
                'password'      => $password,
                'email'         => $email,
                'name'          => $name,
                'phone'         => $phone,
                'tong_nap'      => '0',
                'money'         => '0',
                'tong_tru'      => '0',
                'level'         => '0',
                'securityEmail' => '0',
                'securityPass'  => '0',
                'otp_code'      => NULL,
                'bannd'         => '0',
                'apitoken'      => $api_token,
                'lastdate'      => $time,
                'time'          => $time
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Đăng Ký Tài Khoản Thành Công!"]));
}
}

#Form Xác Nhận Mã Email
if($_POST['type'] == "xacnhanmail") {
$username = addslashes($_POST['username']);
$otp = addslashes($_POST['macode']);

$check_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");

if(empty($username) || empty($otp)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if(!$check_user) {
die(json_encode([
    "status" => "error",
    "msg" => "Username Không Tồn Tại"]));
} else if($check_user['otp_code'] !== $otp) {
die(json_encode([
    "status" => "error",
    "msg" => "Mã Xác Thực Không Chính Xác"]));
} else {
$ManhDev->update("users", [
            'otp_code' => NULL,
            'lastdate' => $time
            ], " `username` = '$username' ");
        
$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'login',
                'note'       => 'Đăng Nhập Vào Hệ Thống',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$_SESSION['username'] = $username;

die(json_encode([
    "status" => "success",
    "msg" => "Đăng Nhập Thành Công!"]));
}
}

#Form Xác Nhận Mật Khẩu Cấp 2
if($_POST['type'] == "xacnhanpass") {
$username = addslashes($_POST['username']);
$password2 = addslashes($_POST['mkc2']);

$check_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$username' ");

if(empty($username) || empty($password2)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if(!$check_user) {
die(json_encode([
    "status" => "error",
    "msg" => "Username Không Tồn Tại"]));
} else if($check_user['password2'] !== $password2) {
die(json_encode([
    "status" => "error",
    "msg" => "Mật Khẩu Cấp 2 Không Chính Xác"]));
} else {
$ManhDev->update("users", [
            'lastdate' => $time
            ], " `username` = '$username' ");
        
$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'login',
                'note'       => 'Đăng Nhập Vào Hệ Thống',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);

$_SESSION['username'] = $username;

die(json_encode([
    "status" => "success",
    "msg" => "Đăng Nhập Thành Công!"]));
}
}


}
function checkcaptcha($secretkey,$captcha){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$captcha.'&remoteip='.$_SERVER['REMOTE_ADDR']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: www.google.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: no-cache',
        'pragma: no-cache',
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-arch: "x86"',
        'sec-ch-ua-bitness: "64"',
        'sec-ch-ua-full-version: "115.0.5790.102"',
        'sec-ch-ua-full-version-list: "Not/A)Brand";v="99.0.0.0", "Google Chrome";v="115.0.5790.102", "Chromium";v="115.0.5790.102"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-model: ""',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-ch-ua-wow64: ?0',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'x-client-data: CK61yQEIl7bJAQijtskBCImSygEIqZ3KAQi3gssBCJKhywEIhaDNAQjGsc0BCNq0zQEI3L3NAQi8vs0BCODEzQEI78TNAQijxc0BCMLFzQEYjKfNAQ==',
       // 'accept-encoding: gzip',
    ]);
    ///curl_setopt($ch, CURLOPT_COOKIE, 'HSID=ADwLCj9lA0AZc4IBe; SSID=Aoc4N4vmBailPGS9u; APISID=BWoXiygXu4aOD8IX/ASzq2lz2uLyq24-3P; SAPISID=nh8wZ-UFc4lnH0_S/AzZcg-9wZ_yldtZ1s; __Secure-1PAPISID=nh8wZ-UFc4lnH0_S/AzZcg-9wZ_yldtZ1s; __Secure-3PAPISID=nh8wZ-UFc4lnH0_S/AzZcg-9wZ_yldtZ1s; SEARCH_SAMESITE=CgQIqpgB; __Secure-ENID=12.SE=F3-Qeff-HxcVb7BdmL9INSvUcr6ylAuhuqpXrBmuhl2V8CwXb77KJ58G2itTeY3sSROMpjpenBsLmlX1TBhs8Kt7HhLATkFqgQHHsojCujhBm3i2RVS73sbKeCraqqv4kicbdcJTJxZV6GR1BgMs1r4UUGzHklFH1qbiNhj8X5tBFXW_n57pqGcsC_f3nhwTidyauniTbzNnSS_KAYA0_E5NrTEF2aYOt8o1TDTETfC8hagzEWhDrO0-C2LvFtGQk6b34Lcco-pYTYcHsG-2dsw1; S=billing-ui-v3=0NctqOva-wLAOM40o6lThV5marJd6Fga:billing-ui-v3-efe=0NctqOva-wLAOM40o6lThV5marJd6Fga:antipasti_server_prod=tQoLsJvnDwNvyx4T0URIN1WXoqrh7cP1FjDovsKxdBc; OTZ=7120120_28_28__28_; SID=YwjUeO4I_3yoI4BrfFwFn5JdoDjqwlqjNeYc58qhRInS2DUrfMyou58Nn6OGfaof2LEe_Q.; __Secure-1PSID=YwjUeO4I_3yoI4BrfFwFn5JdoDjqwlqjNeYc58qhRInS2DUrsUrcr7dvqrhwaKm5XlIqoA.; __Secure-3PSID=YwjUeO4I_3yoI4BrfFwFn5JdoDjqwlqjNeYc58qhRInS2DUrH8flYE5_lVjkU8yScfk_8w.; AEC=Ad49MVFO46APtTZ4iEtxHoOl-d90X9Gmj3E-rYAXFyMhyWNbC9g4s_GdRAM; 1P_JAR=2023-07-21-10; NID=511=cVcfHiZpaGKXaiyP2RVMivfWDj07u7P-74VN8vvLTuIbFxYykTOHUJvTuKf5jMnD44MlEJ-ZtC1nxmTc745yNr_rVj6sWQtuGZhE1exabbUc6XzDs5y-7EjQag_lSyV6RVi9dMUw5O8vLhDcAa9SIbC9PWgqw8V2utNfiSe7sqBoxjEYUSnEh838j3y1sICWNSGVDecj23Lqg6FCbuO5aXEvP5TkMp7DsjMX_FtnSJSHeyIo_WEkXYQAuWEvnXYYAKgwcPmvWOkwT_HTKJOi18XNE9ycHmsopEkmGxXF0oTFWGntP_26xlIc6DUiNm_9BINnxBc; UULE=a+cm9sZTogMQpwcm9kdWNlcjogMTIKdGltZXN0YW1wOiAxNjg5OTM1ODg3ODgyMDAwCmxhdGxuZyB7CiAgbGF0aXR1ZGVfZTc6IDIwNjk2MjY4OAogIGxvbmdpdHVkZV9lNzogMTA2MDc2NTY5Ngp9CnJhZGl1czogOTQ0NDM4LjY2MDg3MTIyNDEKcHJvdmVuYW5jZTogNgo=; __Secure-1PSIDTS=sidts-CjIBPu3jIWOha28I_WCRxcW3hxse1tid4EwQY1XjLFHoEV-PYNlDfpDPMEuKOgf85jaO_hAA; __Secure-3PSIDTS=sidts-CjIBPu3jIWOha28I_WCRxcW3hxse1tid4EwQY1XjLFHoEV-PYNlDfpDPMEuKOgf85jaO_hAA; SIDCC=APoG2W8kFbz4lVjpf7-9bwgOlE-_aGSgjrxlr3drnGhoXgymbXwpDE8N7uHsZFLm5xmdYH5CBoOH; __Secure-1PSIDCC=APoG2W8CeW0lHW36KjSYhLnzOai6Hu1Y9kJXhVJegeBhZITKBCXBwv2Fgq8kaDW4nFY7PxD4tvg; __Secure-3PSIDCC=APoG2W9aKSRwNpSrWqa0LvuVwX2jkW3i50q2YbwzY30N-Wt9gikpWqSL-xpLZVwCLg8Jrrwe-M8');
    
    $response = curl_exec($ch);
    
    curl_close($ch);
    return $response;
}