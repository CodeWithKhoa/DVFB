<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {

$name        = $_POST['name'];
$code        = xoadau($name);
$id_fb       = addslashes($_POST['id_fb']);
$phone       = addslashes($_POST['phone']);
$website1    = $_POST['website'];
$money       = $_POST['money'];
$dich_vu     = $_POST['dich_vu'];
$mo_ta       = $_POST['mo_ta'];

$web = explode('://', $website1)[1];
if($web) {
$website = $web;
} else {
$website = $website1;
}
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "WWebsite Demo Không Thể Sử Dụng Chức Năng Này"]));
}

if(empty($name) || empty($id_fb) || empty($phone) || empty($money) || empty($dich_vu)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($money < 1) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Tiền Bảo Hiểm Tối Thiểu Là 1đ"]));
} else if(strlen($phone) <= 9) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Điện Thoại Không Đúng Định Dạng"]));
} else {
$ManhDev->insert("checkscam_uytin", [
                'code'       => $code,
                'id_fb'      => $id_fb,
                'name'       => $name,
                'phone'      => $phone,
                'website'    => $website,
                'money'      => $money,
                'dich_vu'    => $dich_vu,
                'mo_ta'      => $mo_ta
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Thêm Thông Tin Thành Công"]));
}
}