<?php include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'])) {
include $_SERVER['DOCUMENT_ROOT']."public/client/pages/404.php";
die();
} else {
if($_POST['type'] == "theloai") {
$img          = $_POST['img'];
$title        = $_POST['title'];
$giamgia      = $_POST['giamgia'];


if(empty($img) || empty($title) || empty($giamgia)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->insert("categoriesGame", [
            'code'    => xoadau($title),
            'img'     => $img,
            'title'   => $title,
            'giamgia' => $giamgia
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Thêm Thể Loại Thành Công"]));
}
}

if($_POST['type'] == "accgame") {
$img        = $_POST['img'];
$giagoc     = $_POST['giagoc'];
$giagiam    = $_POST['giagiam'];
$mota       = $_POST['mota'];
$thongtin   = $_POST['thongtin'];
$categories = $_POST['categories'];
$imgDemo    = $_POST['imgDemo'];

if(empty($img) || empty($giagoc) || empty($giagiam) || empty($mota) || empty($thongtin) || empty($imgDemo)) {
die(json_encode([
    "status" => "error",
    "msg" => "Vui Lòng Nhập Đầy Đủ Thông Tin"]));
} else {
$ManhDev->insert("listGame", [
            'code_categories'    => $categories,
            'idGame'     => rand(1000000, 9999999),
            'img'     => $img,
            'giagoc'   => $giagoc,
            'giagiam' => $giagiam,
            'note' => $mota,
            'noteAccount' => $thongtin,
            'imgDemo' => $imgDemo,
            'status' => 'dangban'
                ]);

die(json_encode([
    "status" => "success",
    "msg" => "Thêm Tài Khoản Thành Công"]));
}
}
}