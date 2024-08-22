<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/api/ig.php');
$loai=$_GET['loai'];
$cookie=$_GET["cookie"];
if($cookie==""){
    exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
} else {
    $thongtin=thongtin($cookie);
    if(!$thongtin){
        exit(json_encode(array(
        "status"=>"error",
        "message"=> "Cookie die"
        )));
    }
    $_SESSION["username"]=$thongtin;
}
if($loai==""){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
} else if($loai=='follow' or $loai=="FOLLOW"){
    $id=$_GET['id'];
    if($id==''){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $a=follow($id,$cookie);
    if($a=="success"){
        echo(json_encode(array(
            "status"=>"success",
            "message"=>"Đã Follow thành công."
        )));
    } else if($a=="checkpoint"){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Tài khoản của bạn đã bị khóa !!!"
        )));
    } else {
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Cookie die !!!"
        )));
    }
} else if($loai=="tym" or $loai=="TYM") {
    $id=$_GET['id'];
    if($id==''){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $a=tym($id,$cookie);
    if($a=="success"){
        exit(json_encode(array(
            "status"=>"success",
            "message"=>"Đã Tym thành công."
        )));
    } else {
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Lỗi bất định !!!"
        )));
    }
} else if($loai=="comment" or $loai=="COMMENT"){
    $id=$_GET["id"];
    $noidung=$_GET["noidung"];
    if($id=="" or $noidung==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $a=comment($id,$noidung,$cookie);
    if($a=="success"){
        exit(json_encode(array(
            "status"=>"success",
            "message"=>"Đã Comment thành công."
        )));
    } else {
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Lỗi bất định !!!"
        )));
    }
} else if($loai=='thongtin' or $loai=='THONGTIN'){
    $thongtin= get_info_ig($cookie);
    if($thongtin=="Cookie die"){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Cookie die"
        )));
    }
    $id=explode('|',$thongtin)[0];
    $name=explode('|',$thongtin)[1];
    echo (json_encode(array(
        "status"=>"success",
        "message"=> array(
            'name'=>$name,
            'id'=>$id
            ))));
} else{
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
}