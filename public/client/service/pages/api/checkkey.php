<?php require('../../../../../config/config.php');
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include('../../../../public/client/pages/404.php');
die();
} else {
$key = $_POST['key'];

date_default_timezone_set('Asia/Ho_Chi_Minh');
$kt_key = $ManhDev->query("SELECT * FROM `key_log` WHERE `key_code` = '$key' ")->fetch_array();
$key_code = $kt_key['key_code'];
$name = $kt_key["name"];
$trangthai = $kt_key['status'];
$ngaytao1 = $kt_key["start"];
$ketthuc1 = $kt_key["end"];
$hienntai = strtotime(date("d-m-Y"));
$giai_start = date('d-m-Y', $ngaytao1);
$giai_end = date('d-m-Y', $ketthuc1);


if(empty($key)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Key Tool"]));
} else if($key_code !== $key) {
die(json_encode([
    "status" => "error",
    "msg" => "Key Không Tồn Tại"]));
} else if($trangthai == "off") {
die(json_encode([
    "status" => "error",
    "msg" => "Key Đã Hết Hạn! Hãy Mua Lại Key"]));
} else {
if($ketthuc1 <= $hienntai) {
$ManhDev->update("key_log", [
            'status' => 'off'
            ], " `key_code` = '$key' ");

die(json_encode([
    "status" => "error",
    "msg" => "Key Đã Hết Hạn! Hãy Mua Key Mới"]));
} else {
die(json_encode([
    "status" => "success",
    "name"   => $name,
    "create" => $giai_start,
    "end"    => $giai_end,
    "user"   => $kt_key['username'],
    "amount" => $kt_key['amount']
    ]));
}
}
}