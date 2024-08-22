<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
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
$hethan="$namhan$thanghan$ngayhan$giohan$phuthan$giayhan";
$hientai="$nam$thang$ngay$gio$phut$giay";
$check=$hethan-$hientai;
if($check<=0){
$array=array("status"=>"success", "id"=>"$idsql", "msg"=>"Đã xoá link key $keysql hết hạn", "start"=>"$ngaytaokey", "end"=>"$ngayhankey");
$json=json_encode($array);
echo $json;
$xoa="DELETE FROM `keyngay` WHERE `keyngay`.`id` = $idsql";
mysqli_query($ketnoi, $xoa);
}}
$array=array("status"=>"end");
$json=json_encode($array);
echo $json;

?>
