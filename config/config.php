<?php

session_start();
ob_start('minify_output');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$namews = $_SERVER['SERVER_NAME'];
error_reporting(0);
define('SERVERNAME', getenv('DB_HOST') ?: 'localhost');
define('USERNAME', getenv('DB_USERNAME') ?: 'your_db_user');
define('PASSWORD', getenv('DB_PASSWORD') ?: 'your_db_password');
define('DATABASE', getenv('DB_NAME') ?: 'your_db_name');

class ManhDev {
    private $ketnoi;
    function connect() {
        if (!$this->ketnoi) {
            $this->ketnoi = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE) or die ('Lỗi Liên Kết SQL! Vui Lòng Liền Hệ Zalo: 0936763612 Để Được Hỗ Trợ');
            mysqli_query($this->ketnoi, "set names 'utf8'");
        }
    }
    function dis_connect() {
        if ($this->ketnoi) {
            mysqli_close($this->ketnoi);
        }
    }

    function site($data) {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `settings` ")->fetch_array();
        return $row[$data];
    }
    
     function check_ip($data) {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `band_ip` WHERE `ip_band` = '$data' ")->fetch_array();
        return $row['status'];
    }
    
    function users($data) {
        $this->connect();
        $row = $this->ketnoi->query("SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ")->fetch_array();
        return $row[$data];
    }
    
    function query($sql) {
        $this->connect();
        $row = $this->ketnoi->query($sql);
        return $row;
    }
    function cong($table, $data, $sotien, $where) {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` + '$sotien' WHERE $where ");
        return $row;
    }
    function tru($table, $data, $sotien, $where) {
        $this->connect();
        $row = $this->ketnoi->query("UPDATE `$table` SET `$data` = `$data` - '$sotien' WHERE $where ");
        return $row;
    }
    
    function insert($table, $data) {
        $this->connect();
        $field_list = '';
        $value_list = '';
        foreach ($data as $key => $value) {
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_real_escape_string($this->ketnoi, $value)."'";
        }
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->ketnoi, $sql);
    }
    
    function update($table, $data, $where) {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value) {
            $sql .= "$key = '".mysqli_real_escape_string($this->ketnoi, $value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
        return mysqli_query($this->ketnoi, $sql);
    }
    
    function update_value($table, $data, $where, $value1) {
        $this->connect();
        $sql = '';
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysqli_real_escape_string($this->ketnoi, $value)."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where.' LIMIT '.$value1;
        return mysqli_query($this->ketnoi, $sql);
    }
    
    function xoa($table, $where) {
        $this->connect();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->ketnoi, $sql);
    }
    
    function get_list($sql) {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Lỗi kết nối database ');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    
    function get_row($sql) {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die ('Lỗi kết nối database 2');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row)
        {
            return $row;
        }
        return false;
    }
    
    function num_rows($sql) {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result)
        {
            die ('Lỗi kết nối database 2');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
}



if(isset($_SESSION['username'])) { 
    $ManhDev = new ManhDev;
    $getUser = $ManhDev->get_row(" SELECT * FROM `users` WHERE username = '".$_SESSION['username']."' ");
    $my_username = $getUser['username'];
    $id  = $getUser['id'];
    $my_user  = $getUser['username'];
    $username = $getUser['username'];
    $my_email  = $getUser['email'];
    $my_money = $getUser['money'];
    $my_level = $getUser['capbac'];
    $my_capbac = $getUser['capbac'];
    if(!$getUser) {
        session_start();
        session_destroy();
        header('location: /');
    }
    
    if($getUser['bannd'] >= 1){
        die('Bạn đã bị bannd vĩnh viễn vì đã vi phạm chính sách cộng đồng của chúng tôi');
        exit;
    }
    
    if ($getUser['money'] < 0) {
        $ManhDev->update("users", array(
            'bannd' => 1
        ), "username = '$my_user' ");
        session_start();
        session_destroy();
        header('location: /');
        die();
    }

} else {
    $my_level = NULL;
    $my_money = 0;
}

$ManhDev = new ManhDev;
$base_url = 'https://'.$_SERVER['SERVER_NAME'].'/';
$url_site_name=strtoupper($_SERVER['SERVER_NAME']);
$ten_web = "DICHVUQUARE.NET";
$Partner_KEY = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'key_card' ")['value'];
$Partner_ID = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_card' ")['value'];
$api_subgiare = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_subgiare' ")['value'];
$demo_website = "off";

/***
<h5>Các Chức Năng Của Website</h5>
<h4>I. Chức Năng Admin</h4>
<li>Quản Lý Thành Viên</li>
<li>Cộng - Trừ Tiền Webite</li>
<li>Quản Lý Danh Sách Nạp Thẻ</li>
<li>Thêm Tài Khoản Ngân Hàng</li>
<li>Setup Auto Bank Momo</li>
<li>Thêm Thông Báo Website</li>
<li>Danh Sách Chức Năng, Bán Dịch Vụ Nào Bật Dịch Vụ Đó</li>
<li>Sửa Thông Tin Quản Trị</li>
<li>Thêm Thông Tin Suppost</li>
<li>Cài Đặt Website...</li>
<h4>II. Chức Năng Của Website</h4>
<li>Bán Clone - Gmail...</li>
<li>Gạch Thẻ - Rút Tiền - Chuyển Tiền - API</li>
<li>Bán Hosting Cpanel Auto</li>
<li>Bán Key Tool</li>
<li>Kiểm Tra Tên Miền</li>
<li>Dịch Vụ Mạng xã Hội: Fb, TikTok, Instagram... Tự Thêm Trong Admin</li>
<li>Quỹ Bảo Hiểm Website</li>
<font class="text-danger">Lưu Ý: Website Có Thể Bật Chức Năng Và Tắt Chức Năng Theo Kinh Doanh Của Bạn</font>
***/


$time = date("H:i d-m-Y");



function tach_time($time){
    return date("d-m-Y H:i:s", $time);
}

function level($number){
    if($number == '0'){
        return 'Thành Viên';
    }else if($number == '1'){
        return 'Cộng Tác Viên';
    }else if($number == '2'){
        return 'Đại Lý';
    }else if($number == '3'){
        return 'Quản Trị Viên';
    }else{
        return 'Khác';
    }
}

$list_loaithe = [
    'VIETTEL',
    'VINAPHONE',
    'MOBIFONE',
    'ZING',
    'VNMB',
    'GARENA2',
    'GATE',
    'VCOIN'
];

function msg_success($msg) {
    return '<script>Swal.fire("Thông Báo", "'.$msg.'", "success");</script>';
}

function msg_error($msg) {
    return '<script>Swal.fire("Thông Báo", "'.$msg.'", "error");</script>';
}

function statru_user($number){
    if($number == 0){
        return '<span class="badge badge-success">Online</span>';
    }else {
        return '<span class="badge badge-danger">Offline</span>';
    }
}

function accgame($number){
    if($number == 'dangban'){
        return '<span class="badge badge-success">Đang Bán</span>';
    }else {
        return '<span class="badge badge-danger">Đã Bán</span>';
    }
}

function status_user($number){
    if($number == 0){
        return 'Active';
    }else {
        return 'Temporary';
    }
}

function onoff($number){
    if($number == 1){
        return 'On';
    }else {
        return 'Off';
    }
}

function napthe($data){
    if($data == "xuly"){
        return '<span class="badge badge-warning badge-sm">Đang Kiểm Tra</span>';
    } else if($data == "hoantat") {
        return '<span class="badge badge-success badge-sm">Thành Công</span>';
    } else if($data == "thatbai") {
        return '<span class="badge badge-danger badge-sm">Thất Bại</span>';
    } else {
        return '<span class="badge badge-info badge-sm">Khác</span>';
    }
}

function taoweb($data){
    if($data == "xuly"){
        return '<span class="badge badge-warning badge-sm">Chờ Kích Hoạt</span>';
    } else if($data == "hoantat") {
        return '<span class="badge badge-success badge-sm">Hoạt Động</span>';
    } else if($data == "thatbai") {
        return '<span class="badge badge-danger badge-sm">Thất Bại</span>';
    } else if($data == "hethan") {
        return '<span class="badge badge-danger badge-sm">Hết Hạn</span>';
    } else if($data == "giahan") {
        return '<span class="badge badge-success badge-sm">Đã Gia Hạn</span>';
    } else {
        return '<span class="badge badge-info badge-sm">Khác</span>';
    }
}

function ruttien($data){
    if($data == "xuly"){
        return '<span class="badge badge-warning sm dim">Đang Thực Hiện</span>';
    } else if($data == "hoantat") {
        return '<span class="badge badge-success sm dim">Hoàn Tất</span>';
    } else if($data == "thatbai") {
        return '<span class="badge badge-danger sm dim">Thất Bại</span>';
    } else {
        return '<span class="badge info sm dim">Khác</span>';
    }
}

function keytool($data){
    if($data == "on"){
        return '<span class="badge badge-success">On</span>';
    } else if($data == "off") {
        return '<span class="badge badge-danger">Off</span>';
    } else {
        return '<span class="badge badge-info">Khác</span>';
    }
}

function host($data){
    if($data == "xuly"){
        return '<span class="badge badge-warning">Đang Chờ Tạo</span>';
    } else if($data == "hoantat") {
        return '<span class="badge badge-success">Hoạt Động</span>';
    } else if($data == "thatbai") {
        return '<span class="badge badge-danger">Đã Hủy</span>';
    } else {
        return '<span class="badge badge-info">Khác</span>';
    }
}

function BASE_URL($url) {
    global $base_url;
    return $base_url.$url;
}

function check_string($data) {
    return (trim(htmlspecialchars(addslashes($data))));
}

function tien($price) {
    return str_replace(",", ".", number_format($price));
}


function curl_get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}

function random($string, $int) {  
    return substr(str_shuffle($string), 0, $int);
}

function check_url($url) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLOPT_NOBODY, 1);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
    if(!curl_exec($c))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function getip() {
return $_SERVER['REMOTE_ADDR'];
}

function api_token() {
$api_token = random('QWERTYUIOPASDFGHJKLZXCVBNM', '4')."-".random('QWERTYUIOPASDFGHJKLZXCVBNM', '4')."-".random('QWERTYUIOPASDFGHJKLZXCVBNM', '4')."-".random('QWERTYUIOPASDFGHJKLZXCVBNM', '4');
return $api_token;
}


include_once('smtpmail/class.smtp.php');
include_once('smtpmail/PHPMailerAutoload.php');
include_once('smtpmail/class.phpmailer.php');

function guimail($gmail, $noidung) {
$mail = new PHPMailer();
try {
$mail->SMTPDebug = 0;
$mail->isSMTP();  
$mail->CharSet  = "utf-8";
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$nguoigui = getenv('SMTP_USER') ?: '';
$matkhau = getenv('SMTP_PASS') ?: '';
$tennguoigui = ''.$url_site_name;
$mail->Username = $nguoigui;
$mail->Password = $matkhau;
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom($nguoigui, $tennguoigui); 
$to_name = ''.$url_site_name;
$mail->addAddress($gmail, $to_name);
$mail->isHTML(true);
$mail->Subject = 'Hệ Thống Dịch Vụ Mạng Xã Hội';
$mail->Body = $noidung;
$mail->smtpConnect(array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
        "allow_self_signed" => true
    )
));
$send = $mail->send();
//return $send;
} catch (Exception $e) {
return $mail->ErrorInfo;
}
}

function enc($plaintext, $key, $iv) {
    $ciphertext = openssl_encrypt($plaintext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $ciphertext);
}

function dec($encrypted, $key, $iv) {
    $data = base64_decode($encrypted);
    $ciphertext = substr($data, 16);
    return openssl_decrypt($ciphertext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
}

function xoadau($strTitle) {
$strTitle=strtolower($strTitle);
$strTitle=trim($strTitle);
$strTitle=str_replace(' ','-',$strTitle);
$strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$strTitle);
$strTitle=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'y',$strTitle);
$strTitle=str_replace('đ','d',$strTitle);
$strTitle=str_replace('Đ','d',$strTitle);
$strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
return $strTitle;
}

function status_order($data) {
if($data == "on") {
return '<b class="text-success">(Hoạt Động)</b>';
} else {
return '<b class="text-danger">(Bảo Trì)</b>';
}
}

function giaodien(){
    if(!$_SESSION['giaodien']){
        $gio=date("H");
        if($gio>=6 and $gio<=18){
            $_SESSION['giaodien']="light";
        } else {
            $_SESSION['giaodien']="dark";
        }
    }
}
giaodien();
$key_dlsr = getenv('KEY_DLSR') ?: '';

/***
$gia_key = $ManhDev->site('gia_key');
$api_site_me = $ManhDev->site('api_tk');
$noidungbank = $ManhDev->site('noidungbank');
$chiet_khau_card = $ManhDev->site('site_ck_card');



$ManhDev->insert("server", [
                'id'   => '1'
                ]);
***/