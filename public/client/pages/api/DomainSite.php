<?php include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
} else {
$domain = $_POST['domain'];
$status_site = $ManhDev->get_row(" SELECT * FROM `ds_sitecon` WHERE `site_con` = '$domain' ");
$dem_acc = mysqli_fetch_assoc($ManhDev->query("SELECT COUNT(*) FROM `ds_sitecon` WHERE `username` = '".$ManhDev->users('username')."' ")) ['COUNT(*)'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($username)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Đăng Nhập Để Thực Hiện"]));
} else if(empty($domain)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Nhập Tên Miền"]));
} else if($ManhDev->users('tong_nap') < 500000) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Cần Nâng Cấp Tài Khoản Để Tạo Site Con"]));
} else if($ManhDev->users('tong_tru') < 500000) {
die(json_encode([
    "status" => "error",
    "msg" => "Bạn Cần Nâng Cấp Tài Khoản Để Tạo Site Con"]));
} else if($dem_acc >= 3) {
die(json_encode([
    "status" => "error",
    "msg" => "Mỗi Tài Khoản Chỉ Được Thay Tối Đa 3 Tên Miền"]));
} else if($status_site) {
die(json_encode([
    "status" => "error",
    "msg" => "Tên Miền Đã Có Trên Hệ Thống"]));
} else {

$check = file_get_contents("https://tenten.vn/api/check/?domain=".$domain);
if($check == "1") {
die(json_encode([
    "status" => "error",
    "msg" => "Tên Miền Chưa Được Mua! Bạn Phải Nhập Tên Miền Đã Mua"]));
} else {

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'site',
                'note'       => 'Đăng Kí Site Con',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
        
$ManhDev->insert("ds_sitecon", [
                'username'   => $username,
                'site_con'   => $domain,
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Thêm Tên Miền Thành Công! Chờ Kick Hoạt"]));
}
}
}