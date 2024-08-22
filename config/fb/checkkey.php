<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$key=$_GET["key"];
//ketnoi
require_once 'ketnoi.php';
//cau lenh
$lietke_sql = "SELECT * FROM keyngay order by id";
//thuc thi cau lenh

$result = mysqli_query($ketnoi, $lietke_sql);
//duyet qua result va in ra
$nam=date("Y");
$thang=date("m");
$ngay=date("d");

$gio=date("H");
$phut=date("i");
$giay=date("s");

while ($r = mysqli_fetch_assoc($result)){

$idsql=$r['id'];
$keysql=$r['key'];
$songay=$r['songay'];
$ngaytaokey=$r['ngaytao'];
$ngayhankey=$r['ngayhan'];
$link1=$r['rutgon1'];
$link2=$r['rutgon2'];
$ip=$r['ip'];
$ngay1=explode(" ",$ngayhankey)[0];
$gio1=explode(" ",$ngayhankey)[1];
$namhan=explode("-",$ngay1)[0];
$thanghan=explode("-",explode("-",$ngay1)[1])[0];
$ngayhan=explode("-",explode("-",$ngay1)[2])[0];
$giohan=explode(":",$gio1)[0];
$phuthan=explode(":",explode(":",$gio1)[1])[0];
$giayhan=explode(":",explode(":",$gio1)[2])[0];
if($key==""){
$array=array("status"=>"error", "msg"=>"Vui lòng nhập key!!!");
$json=json_encode($array);
echo $json;
exit();
}

if($key==$keysql){
$hethan="$namhan$thanghan$ngayhan$giohan$phuthan$giayhan";
$hientai="$nam$thang$ngay$gio$phut$giay";
$check=$hethan-$hientai;
if($check<=0){
$array=array("status"=>"error", "msg"=>"Link key sai hoặc đã hết hạn?! ");
$json=json_encode($array);
echo $json;
}else{
$array=array("status"=>"success", "rate"=>$songay,"link1"=>$link1,"link2"=>$link2,"create"=>$ngaytaokey,"end"=>$ngayhankey, "ip"=>$ip);
$json=json_encode($array);
echo $json;
}
exit();
}
}
if($key!=$keysql){
$array=array("status"=>"error", "msg"=>"Link key sai hoặc đã hết hạn?!! ");
$json=json_encode($array);
echo $json;
exit();
}
?>
