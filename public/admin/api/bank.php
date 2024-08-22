<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$logo       = $_POST['logo']; #Logo ngân hàng
$name       = addslashes($_POST['name']); #Tên ngân hàng
$ctk        = addslashes($_POST['ctk']); #Chủ tk
$stk        = addslashes($_POST['stk']); #Số tk
$toi_thieu  = addslashes($_POST['toi_thieu']);
$check_bank = $ManhDev->get_row("SELECT * FROM `bank` WHERE `stk` = '$stk' ");
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "WWebsite Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($logo) || empty($ctk) || empty($stk) || empty($toi_thieu) || empty($name)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else if($toi_thieu < 1) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Tiền Tối Thiểu Là 1đ"]));
} else if($check_bank) {
die(json_encode([
    "status" => "error",
    "msg" => "Số Tài Khoản Đã Tồn Tại"]));
} else {
$ManhDev->insert("bank", [
                'img'       => $logo,
                'name'      => $name,
                'ctk'       => $ctk,
                'stk'       => $stk,
                'toi_thieu' => $toi_thieu
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Đã Thêm Ngân Hàng Bank"]));
}
}