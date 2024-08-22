<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$listclone  = $_POST['listclone'];
$loai       = $_POST['loai'];
if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "WWebsite Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($listclone) || empty($loai)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$clone = explode(PHP_EOL,$listclone); 
$countupdate = 0;
$countadd = 0;
foreach($clone as $row) {
$get_string_clone = explode("|", $row);
$check_trung_clone = $ManhDev->query("SELECT * FROM `account` WHERE `id_fb` = '".$get_string_clone[0]."' ");
if(mysqli_num_rows($check_trung_clone)  > 0) {
$ManhDev->update("account", [
            'code'  => $loai,
            'id_fb' => $get_string_clone[0],
            'note' => $row,
            'time' => $time
            ], " `id_fb` = '".$get_string_clone[0]."' ");
$countupdate++;
} else {
$ManhDev->insert("account", [
            'code'  => $loai,
            'id_fb' => $get_string_clone[0],
            'note' => $row,
            'time' => $time
                ]);
$countadd++;
}
}
die(json_encode([
    "status" => "success",
    "msg" => "Đã Thêm Tài Khoản Đăng Bán"]));
}
}