<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$value=$_GET['value'];
//ketnoi
require_once 'ketnoi.php';
//cau lenh
$lietke_sql = "SELECT * FROM cookiefb order by id";
//thuc thi cau lenh
$result = mysqli_query($ketnoi, $lietke_sql);
//duyet qua result va in ra
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

while ($r = mysqli_fetch_assoc($result)){
$idsql=$r['id'];
$id=$r['idfb'];
$name=$r['name'];
$cookie=$r['cookie'];
$token=$r['token'];
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
$test = fb("https://mbasic.facebook.com/",$hd);
$check= strpos($test,"Đăng xuất");
if($check!=''){
$array=array("status"=>"success", "data"=>array("id"=>"$idfb", "name"=>"$name","cookie"=>"$cookie","token"=>"$token"));
$json=json_encode($array);
echo $json;
}
}
?>