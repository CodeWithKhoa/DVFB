<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$ip = $_SERVER['HTTP_CLIENT_IP']; 
if($ip==""){
$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
 }
return $str;
}
$url=$_SERVER['HTTP_HOST'];
$url='dichvuquare.com';
$key = rand_string( 10 );
$ngaytao=date("Y-m-d");
$giotao=date("H:i:s");
$han=date("d");
$cong1ngay = strtotime('+1 day');
$cong1 = date('Y-m-d H:i:s', $cong1ngay);
$giohan=date("H:i:s");
$thoigiantao="$ngaytao $giotao";
$thoigianhan=$cong1;

$long_url = "https://$url/key.php?key=$key";
$api_tokenlink1 = 'e65962a273968941a32fc0e61cd90c27f205e6c7';
$api_tokenlink2="9a9aaa97b06e8580ebdd58add8b07281aea4531c";
$api_urllink1 = "https://mneylink.com/api?api={$api_tokenlink1}&url={$long_url}";
$api_urllink2 = "https://traffic1s.com/api?api={$api_tokenlink2}&url={$long_url}";
//mneylink.com
$ket_noi=getapi($api_urllink1);
if($ket_noi){
$json = json_decode($ket_noi,TRUE);
$link_key1= $json["shortenedUrl"];
}else{
print"Vui Lòng Xem Lại Đường Truyền";
  die();
}
#link1s.com

$ket_noi=getapi($api_urllink2);
if($ket_noi){
$json = json_decode($ket_noi,TRUE);
$link_key2= $json["shortenedUrl"];
}else{
print"Vui Lòng Xem Lại Đường Truyền";
  die();
}


//ket noi csdl
require_once 'ketnoi.php';
$themkey="INSERT INTO `keyngay` (`id`, `key`, `songay`, `ngaytao`, `ngayhan`, `rutgon1`, `rutgon2`, `ip`) VALUES (NULL, '$key', '1', '$thoigiantao', '$thoigianhan', '$link_key1', '$link_key2', '$ip');";

$array=array("status"=>"success","linkkey1"=>$link_key1,"linkkey2"=>$link_key2,"start"=>$thoigiantao,"end"=>$thoigianhan);
echo json_encode($array);
//thuc thi cau lenh them
mysqli_query($ketnoi, $themkey);
function getapi($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $headers = array();
    $headers[] = 'User-Agent:TOOL TĐK';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Vui lòng kiểm tra lại kết nối hoặc có thể do lỗi máy chủ!';
    }
    curl_close($ch);
    return $result;
}
?>
