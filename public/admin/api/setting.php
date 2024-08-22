<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
$color         = $_POST['colorWeb'];
$title         = $_POST['title'];
$logo          = $_POST['logo'];
$bia           = $_POST['bia'];
$faviconWeb    = $_POST['faviconWeb'];
$noteWeb       = $_POST['noteWeb'];
$keywordWeb    = $_POST['keywordWeb'];
$idPage        = $_POST['idPage'];
$chietkhauweb  = $_POST['chietkhauweb'];
$traitimweb    = $_POST['traitimweb'];
$telegr        = $_POST['telegr'];
$tokentelegr   = $_POST['tokentelegr'];

if($demo_website == "on") {
die(json_encode([
    "status" => "error",
    "msg" => "Website Demo Không Thể Sử Dụng Chức Năng Này"]));
}
if(empty($title) || empty($logo) || empty($bia) || empty($faviconWeb) || empty($noteWeb) || empty($keywordWeb) || empty($idPage) || empty($chietkhauweb) || empty($traitimweb)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->update("settings", [
            'nameWeb'     => $title,
            'logoWeb'     => $logo,
            'biaWeb'      => $bia,
            'faviWeb'     => $faviconWeb,
            'motaWeb'     => $noteWeb,
            'tukhoaWeb'   => $keywordWeb,
            'idPage'      => $idPage,
            'discountWeb' => $chietkhauweb,
            'heartWeb'    => $traitimweb,
            'colorWeb'    => $color
            ], " `id` = '1' ");

$ManhDev->update("options", [
            'value'     => $telegr
            ], " `key_code` = 'id_tele' ");
            
$ManhDev->update("options", [
            'value'     => $tokentelegr
            ], " `key_code` = 'token_tele' ");

die(json_encode([
    "status" => "success",
    "msg" => "Lưu Cài Đặt Thành Công"]));
}
}