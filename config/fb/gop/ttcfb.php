<?php
header('Content-Type: text/html; charset=utf-8');
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if($userAgent=="TOOL TĐK"){
} else if($userAgent==""){
} else {
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
    die;
}
?>
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
/***[ Color ]***/
$xnhac = "\033[1;36m";
$do = "\033[1;31m";
$luc = "\033[1;32m";
$vang = "\033[1;33m";
$xduong = "\033[1;34m";
$hong = "\033[1;35m";
$trang = "\033[1;37m";
/***[ USERAGENT ]***/
$_SESSION['useragent'] = 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36';
/***[ Delay ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
	$_SESSION['load'] = 1500;
	$_SESSION['delay'] = 2000;
} else {
	$_SESSION['load'] = 0;
	$_SESSION['delay'] = 1000;
}
banner();
while (true){
    if (file_exists("configttc.txt")){
	    if(file_get_contents("configttc.txt") == ''){
		    unlink("configttc.txt"); continue;
	    }
	    $_SESSION['token'] = fread(fopen("configttc.txt", "r"), filesize("configttc.txt"));
    	$login = logintoken();
	    if($login == false){
            unlink("configttc.txt"); continue;
	    }
	    echo $daucau.$luc."Nhập ".$vang."[".$trang."1".$vang."] ".$luc."Giữ Lại Tài Khoản ".$vang.$_SESSION['user']."\n";
	    echo $daucau.$luc."Nhập ".$vang."[".$trang."2".$vang."] ".$luc."Nhập Access_Token TTC Mới \n";
	    echo $daucau.$luc."Nhập ".$trang."===>: $vang";
    	    $chon_tk = trim(fgets(STDIN));
        if ($chon_tk == "2") {
            unlink("configttc.txt");
            chay(35);
	    } else if ($chon_tk == "1") {
        } else {
		    echo $do." Lựa chọn không xác định !!!\n"; 
		    chay(35); continue;
        }
    }
    if(!file_exists("configttc.txt")){
        echo $luc."Lấy Access_Token TTC Tại: ".$trang."https://tuongtaccheo.com/api/ \n";
        echo $daucau.$luc."Nhập Access_Token TTC: $vang";
	        $tokenacc = trim(fgets(STDIN));
        fwrite(fopen("configttc.txt", "w+"), $tokenacc);
    }
    $_SESSION['token'] = fread(fopen("configttc.txt", "r"), filesize("configttc.txt"));
	$login = logintoken();
	if($login == true){
		break;
	} else {
		//echo $do." Access_Token TTC Sai \n";
		unlink("configttc.txt");;
		chay(35);
	}
}
echo"\033[1;92m ══════════════════════════════════════════════════════════════\n";
$khock = [];
$list_id = [];
$list_name = [];
if (file_exists('cookiettc.txt')){
    echo $daucau.$luc."Nhập ".$do."[".$vang."1".$do."]".$luc." Sử Dụng List Cookie Facebook Đã Lưu \n";
    echo $daucau.$luc."Nhập ".$do."[".$vang."2".$do."]".$luc." Nhập Cookie Facebook Mới \n";
    echo $daucau.$luc."Nhập Lựa Chọn: $vang";
	    $nhap = trim(fgets(STDIN));
    if($nhap == '1'){
	    echo $trang."=> ".$xnhac."Đang Lấy Dữ Liệu Đã Lưu \n"; sleep (1);
    } else {
	    unlink('cookiettc.txt');
	    unlink('listids.txt');
	    unlink('listnames.txt');
	    echo"\033[1;92m ══════════════════════════════════════════════════════════════\n";
    }
}
if (!file_exists('cookiettc.txt')){
	$x = 0;
    while (true) { $x++;
        echo $daucau.$luc."Nhập Cookie Facebook Thứ $x: $vang";
            $cookie = trim(fgets(STDIN));
        if ($cookie == '' ){ break; }
        $name = namefb($cookie);
        if($name !== 'die'){
            echo $luc."Tên Facebook: ".$xduong.$name."\n";
            array_push($khock, $cookie);
            array_push($list_id, $idfb);
		    array_push($list_name, $name);
        } else {
            echo $do." Cookie Sai ! Vui Lòng Nhập Lại !!! \n"; $x--;
        }
    }
    fwrite(fopen("cookiettc.txt","a+"), json_encode($khock));
    fwrite(fopen("listids.txt","a+"), json_encode($list_id));
    fwrite(fopen("listnames.txt","a+"), json_encode($list_name));
}
$khock = json_decode(fread(fopen("cookiettc.txt","r"),filesize("cookiettc.txt")),true);
$list_id = json_decode(fread(fopen("listids.txt","r"),filesize("listids.txt")),true);
$list_name = json_decode(fread(fopen("listnames.txt","r"),filesize("listnames.txt")),true);
$xu = coin($daucau);
@system('clear');
banner();
echo $daucau.$luc."Tên Tài Khoản: ".$vang.$_SESSION['user']."\n";
echo $daucau.$luc."Xu hiện tại: ".$vang.$xu."\n";
echo $daucau.$luc."Số Cookie Facebook: ".$vang.count($khock)."\n";
echo"\033[1;92m ══════════════════════════════════════════════════════════════\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."1".$do."]".$luc." Nhiệm Vụ Like\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."2".$do."]".$luc." Nhiệm Vụ Follow\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."3".$do."]".$luc." Nhiệm Vụ Comment\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."4".$do."]".$luc." Nhiệm Vụ Share   \n";
echo $daucau.$luc."Nhập ".$do."[".$vang."5".$do."]".$luc." Nhiệm Vụ Cảm Xúc  \n";
echo $daucau.$luc."Nhập ".$do."[".$vang."6".$do."]".$luc." Nhiệm Vụ Cảm Xúc Comment  \n";
echo $daucau.$luc."Nhập ".$do."[".$vang."7".$do."]".$luc." Nhiệm Vụ Like Page  \n";
echo $daucau.$luc."Nhập ".$do."[".$vang."8".$do."]".$luc." Nhiệm Vụ Join Group \n";
echo $thanhngang;
echo $daucau.$xnhac."Có Thể Chọn Nhiều Nhiệm Vụ (Ví Dụ 2+4) \n";
echo $daucau.$luc."Nhập Số Để Chạy Nhiệm Vụ: $vang";
$nhiemvu = trim(fgets(STDIN));
echo $daucau.$luc."Nhập Delay: $vang";
	$delay = trim(fgets(STDIN));
echo $daucau.$luc."Sau ____ Nhiệm Vụ Thì Kích Hoạt Chống Block.     \r".$daucau.$luc."Sau $vang";
	$dungblock = trim(fgets(STDIN));
echo $daucau.$luc."Sau ".$vang.$dungblock.$luc." Nhiệm Vụ Nghỉ Ngơi ____ Giây       \r".$daucau.$luc."Sau ".$vang.$dungblock.$luc." Nhiệm Vụ Nghỉ Ngơi $vang";
	$delaybl = trim(fgets(STDIN));
echo $daucau.$luc."Sau Bao Nhiêu Nhiệm Vụ Thì Đổi Nick: $vang";
	$chuyen = trim(fgets(STDIN));
echo $daucau.$luc."Sau Bao Nhiêu Nhiệm Vụ Thì Dừng Tool: $vang";
	$dungtool = trim(fgets(STDIN));
$dem = 0;

while(true) {
	if (count($khock) == 0 ){
		chay(35);
		unlink('cookiettc.txt');
		unlink('listids.txt');
		unlink('listnames.txt');
        echo $do."Đã Xoá Tất Cả Cookie, Vui Lòng Nhập Lại  \n";
        unset($x);
        $list_id = [];
        $list_name = [];
    	while (true) { $x++;
            echo $daucau.$luc."Nhập Cookie Facebook Thứ $x: $vang";
	            $cookie = trim(fgets(STDIN));
	        if ($cookie == '' ){ break; }
            $name = namefb($cookie);
			if($name !== 'die'){
				echo $luc."Tên Facebook: ".$xduong.$name."\n";
                array_push($khock, $cookie);
                array_push($list_id, $idfb);
		        array_push($list_name, $name);
            } else {
                echo $do." Cookie Sai ! Vui Lòng Nhập Lại !!! \n"; $x--;
            }
        }
	    fwrite(fopen("cookiettc.txt","a+"), json_encode($khock));
        fwrite(fopen("listids.txt","a+"), json_encode($list_id));
        fwrite(fopen("listnames.txt","a+"), json_encode($list_name));
        chay(35);
    }
    for ($tr = 0; $tr < count($khock) ; $tr++){
	    $cookie = $khock[$tr];
	    $name = namefb($cookie);
        if($name == 'die'){
        	echo $do." Cookie Đã Bị Out.             \n";
        	array_splice($khock, $tr, 1);
        	continue;
        }
	    $idfb = explode (';', explode ('c_user=', $cookie)[1])[0];
        $datnick = cauhinh($idfb);
        if($datnick == '1') {
	        echo $vang."==========================================================\n";
                    echo $vang."Đang Cấu Hình ID: ".$luc.$idfb." ".$vang."Tên FB: ".$luc.$name."\n";
                    echo $vang."==========================================================\n";
        } else {
            echo $do." Cấu Hình Thất Bại, Vui Lòng Thêm Nick $name Vào Cấu Hình \r"; continue;
        }
        $stool = 0;
        while (true){
            if($stool == 1){ break; }
            if (strpos($nhiemvu, '1') !== false) { $nvlike = 1; }
            if (strpos($nhiemvu, '2') !== false) { $nvsub = 1; }
            if (strpos($nhiemvu, '3') !== false) { $nvcmt = 1; }
            if (strpos($nhiemvu, '4') !== false) { $nvshare = 1; }
            if (strpos($nhiemvu, '5') !== false) { $nvcx = 1; }
            if (strpos($nhiemvu, '6') !== false) { $nvcxcmt = 1; }
            if (strpos($nhiemvu, '7') !== false) { $nvpage = 1; }
            if (strpos($nhiemvu, '8') !== false) { $nvgr = 1; }
            if($nvlike == 1){
	            $listpost = getnv("");
	            if(count($listpost) == 0){ $nvlike = 0; }
            } else {
                $listpost = [];
            }

            if($nvsub == 1){
	            $listsub = getnv("/subcheo");
	            if(count($listsub) == 0){ $nvsub = 0; }
            } else {
                $listsub = [];
            }

            if($nvcmt== 1){
	            $listcmt = getnv("/cmtcheo");
	            if(count($listcmt) == 0){ $nvcmt = 0; }
            } else {
                $listcmt = [];
            }

            if($nvshare == 1){
	            $listshare= getnv("/sharecheo");
	            if(count($listshare) == 0){ $nvshare = 0; }
            } else {
                $listshare = [];
            }

            if($nvcx == 1){
	            $listcx = getnv("/camxuccheo");
	            if(count($listcx) == 0){ $nvcx = 0; }
            } else {
                $listcx = [];
            }

            if($nvcxcmt == 1){
            	$listcxcmt = getnv("/camxuccheobinhluan");
	            if(count($listcxcmt) == 0){ $nvcxcmt = 0; }
            } else {
                $listcxcmt = [];
            }

            if($nvpage== 1){
	            $listpage = getnv("/likepagecheo");
	            if(count($listpage) == 0){ $nvpage = 0; }
            } else {
                $listpage = [];
            }

            if($nvgr == 1){
	            $listgr = getnv("/thamgianhomcheo");
	            if(count($listgr) == 0){ $nvgr = 0; }
            } else {
                $listgr = [];
            }

            if(($nvlike + $nvsub + $nvcmt + $nvshare + $nvcx + $nvcxcmt + $nvpage + $nvgr) == 0){
	            for ($i = 10; $i > 0; $i--) { echo "\033[1;37m Tất Cả Các Nhiệm Vụ Đã Hết, Vui Lòng Chờ $i giây"; sleep(1); echo "\r                                                     \r"; }
	            continue;
            }
            for($lap = 0; $lap < 15; $lap++){
                if($nvlike == 1){
                    $id = $listpost[$lap]["idpost"];
                    if (isset($id)){
                        echo $id."                                         \r";
                        $g = json_decode(dvfb("like",$id,null,$cookie),true);
                        if ($g["status"]=="error"){
                            if($g["message"]=="Bạn đã bị block !!!"){
                                echo $do." Tài Khoản $name Đã Bị Block Like !!!					\n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                            if($g["message"]=="Cookie die"){
                                echo $do."  Cookie Tài Khoản $name Đã Bị Out !!!                \n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                        }
                        $hoanthanh = nhantien($id, "");
			            $xus = coin($daucau);
	                    if ($hoanthanh["mess"] and $xus !== $xu) {
		                    $xu = $xus;
                            $dem++;
                            $xujob = "+400";
                            hoanthanh($dem, ' LIKE ', $id, $xujob, $xu);
                            if($dem >= $dungtool){
                                chay(35);
		                        echo $daucau.$luc."Bạn Có Muốn Tiếp Tục Không (y/n): $vang";
			                        $nhap_stop = trim(fgets(STDIN));
	                            if (strtolower($nhap_stop) == 'y'){
		                            echo $daucau.$luc."Bạn Thực Hiện Thêm Bao Nhiêu Nhiệm Vụ Nữa: $vang";
			                            $them = trim(fgets(STDIN));
			                        $dungtool = $dungtool + $them;
		                            echo $daucau.$luc."Bạn Muốn Nhập Cookie Mới Không (y/n): $vang";
			                            $nhap_ck = trim(fgets(STDIN));
			                        if (strtolower($nhap_ck) == 'y') { 
				                        $khock = []; $stool = 1; break; 
			                        } else {
				                        chay(35);
				                        $stool = 1; break;
			                        }
	                            } else {
		                            exit($luc." Cảm Ơn Bạn Đã Sử Dụng Tool By ".$xnhac."An Orin \n"); 
	                            } 
	                        }
  	                        if ($dem % $chuyen == 0 ) { $stool = 1; break; }
                            if ($dem % $dungblock == 0 ){
                                delaybl($delaybl);
                            } else {
                                delay($delay);
                            }
 		                } 
   	  		        } else { echo $do." Hết Nhiệm Vụ Like !!!      \r"; sleep (1); }
                } 
                if ($nvsub == 1){
                    $id = $listsub[$lap]["idpost"];
                    if (isset($id)){
                        echo $id."                                         \r";
                        $g = json_decode(dvfb("follow",$id,null,$cookie),true);
                        if ($g["status"]=="error"){
                            if($g["message"]=="Bạn đã bị block !!!"){
                                echo $do." Tài Khoản $name Đã Bị Block Follow !!!					\n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                            if($g["message"]=="Cookie die"){
                                echo $do."  Cookie Tài Khoản $name Đã Bị Out !!!                \n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                        }
                        $hoanthanh = nhantien($id, "/subcheo");
                        $xus = coin($daucau);
		                if ($hoanthanh["mess"] and $xus !== $xu) {
			                $xu = $xus;
                            $dem++;
                            $xujob = "+600";
                            $id = substr($id, 0, 15);
                            hoanthanh($dem, 'FOLLOW', $id, $xujob, $xu);
                            if($dem >= $dungtool){
		                        chay(35);
		                        echo $daucau.$luc."Bạn Có Muốn Tiếp Tục Không (y/n): $vang";
			                        $nhap_stop = trim(fgets(STDIN));
	                            if (strtolower($nhap_stop) == 'y'){
		                            echo $daucau.$luc."Bạn Thực Hiện Thêm Bao Nhiêu Nhiệm Vụ Nữa: $vang";
			                            $them = trim(fgets(STDIN));
			                        $dungtool = $dungtool + $them;
                                    echo $daucau.$luc."Bạn Muốn Nhập Cookie Mới Không (y/n): $vang";
			                            $nhap_ck = trim(fgets(STDIN));
			                        if (strtolower($nhap_ck) == 'y') { 
                                        $khock = []; $stool = 1; break; 
			                        } else {
				                        chay(35);
				                        $stool = 1; break;
			                        }
	                            } else {
		                            exit($luc." Cảm Ơn Bạn Đã Sử Dụng Tool By ".$xnhac."An Orin\n"); 
	                            } 
	                        }
                            if ($dem % $chuyen == 0 ) { $stool = 1; break; }
                            if ($dem % $dungblock == 0 ){ delaybl($delaybl); } else { delay($delay); }
                        } 
				    } else { echo $do." Hết Nhiệm Vụ Follow !!!      \r"; sleep (1);}
                } 
                if ($nvcmt == 1) {
                    $id = $listcmt[$lap]["idpost"];
                    $nd = $listcmt[$lap]["nd"];
                    $json = json_decode($nd, true);
                    $msg = $json["0"];
                    if (isset($id)){
                        echo $id."                                         \r";
                        $g = json_decode(dvfb("comment",$id,null,$cookie),true);
                        if ($g["status"]=="error"){
                            if($g["message"]=="Bạn đã bị block !!!"){
                                echo $do." Tài Khoản $name Đã Bị Block Comment !!!					\r";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                            if($g["message"]=="Cookie die"){
                                echo $do."  Cookie Tài Khoản $name Đã Bị Out !!!                \n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                        }
                        $hoanthanh = nhantien($id, "/cmtcheo");
                        $xus = coin($daucau);
		                if ($hoanthanh["mess"] and $xus !== $xu) {
			                $xu = $xus;
                            $dem++;
                            $xujob = "+600";
                            hoanthanh($dem, 'COMMENT', $id, $xujob, $xu);
                            fwrite (fopen($idfb, "a+"), $msg."\n");
                            if($dem >= $dungtool){
                                chay(35);
                                echo $daucau.$luc."Bạn Có Muốn Tiếp Tục Không (y/n): $vang";
                                    $nhap_stop = trim(fgets(STDIN));
                                if (strtolower($nhap_stop) == 'y'){
                                    echo $daucau.$luc."Bạn Thực Hiện Thêm Bao Nhiêu Nhiệm Vụ Nữa: $vang";
                                        $them = trim(fgets(STDIN));
                                    $dungtool = $dungtool + $them;
                                    echo $daucau.$luc."Bạn Muốn Nhập Cookie Mới Không (y/n): $vang";
                                        $nhap_ck = trim(fgets(STDIN));
                                    if (strtolower($nhap_ck) == 'y') { 
				                        $khock = []; $stool = 1; break; 
			                        } else {
				                        chay(35);
				                        $stool = 1; break;
			                        }
                                } else {
		                            exit($luc." Cảm Ơn Bạn Đã Sử Dụng Tool By ".$xnhac."An Orin \n"); 
	                            } 
	                        }
	                        if ($dem % $chuyen == 0 ) { $stool = 1; break; }
	                        if ($dem % $dungblock == 0 ){ delaybl($delaybl); } else { delay($delay); }
                        } 
                    } else { echo $do." Hết Nhiệm Vụ Comment !!!      \r"; sleep (1); }
                } 
                if ($nvshare == 1) {
                    $id = $listshare[$lap]["idpost"];
                    if (isset($id)){
                        echo $id."                                         \r";
                        $g = json_decode(dvfb("share",$id,null,$cookie),true);
                        if ($g["status"]=="error"){
                            if($g["message"]=="Bạn đã bị block !!!"){
                                echo $do." Tài Khoản $name Đã Bị Block Like !!!					\n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                            if($g["message"]=="Cookie die"){
                                echo $do."  Cookie Tài Khoản $name Đã Bị Out !!!                \n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                        }
                        $hoanthanh = nhantien($id, "/sharecheo");
                        $xus = coin($daucau);
		                if ($hoanthanh["mess"] and $xus !== $xu) {
			                $xu = $xus;
                            $dem++;
                            $xujob = "+600";
                            $id = substr($id, 0, 15);
                            hoanthanh($dem, 'SHARE ', $id, $xujob, $xu);
                            if($dem >= $dungtool){
		                        chay(35);
		                        echo $daucau.$luc."Bạn Có Muốn Tiếp Tục Không (y/n): $vang";
			                        $nhap_stop = trim(fgets(STDIN));
	                            if (strtolower($nhap_stop) == 'y'){
		                            echo $daucau.$luc."Bạn Thực Hiện Thêm Bao Nhiêu Nhiệm Vụ Nữa: $vang";
			                            $them = trim(fgets(STDIN));
			                        $dungtool = $dungtool + $them;
		                            echo $daucau.$luc."Bạn Muốn Nhập Cookie Mới Không (y/n): $vang";
			                            $nhap_ck = trim(fgets(STDIN));
			                        if (strtolower($nhap_ck) == 'y') { 
				                        $khock = []; $stool = 1; break; 
			                        } else {
				                        chay(35);
				                        $stool = 1; break;
			                        }
	                            } else {
		                            exit($luc." Cảm Ơn Bạn Đã Sử Dụng Tool By ".$xnhac."An \n"); 
                                } 
                            }
                            if ($dem % $chuyen == 0 ) { $stool = 1; break; }
                            if ($dem % $dungblock == 0 ){ delaybl($delaybl); } else { delay($delay); }
                        } 
                    } else { echo $do." Hết Nhiệm Vụ Share !!!      \r"; sleep (1); }
                } 
                if ($nvcx == 1) {
			        $idcx = $listcx[$lap]["idpost"];
                    echo $id."                                         \r";
			        $type = $listcx[$lap]["loaicx"];
                    if ($idcx !== '' and isset($idcx)){
                        $g = json_decode(dvfb($type,$idcx,null,$cookie),true);
                        if ($g["status"]=="error"){
                            if($g["message"]=="Bạn đã bị block !!!"){
                                echo $do." Tài Khoản $name Đã Bị Block Cảm Xúc !!!					\n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                            if($g["message"]=="Cookie die"){
                                echo $do."  Cookie Tài Khoản $name Đã Bị Out !!!                \n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                        }
		                $hoanthanh = nhantiencx($idcx, $type);
		                $xus = coin($daucau);
		                if ($hoanthanh["mess"] and $xus !== $xu) {
			                $xu = $xus;
                            $dem++;
                            $xujob = "+400";
                            hoanthanh($dem, ' '.$type.' ', $idcx, $xujob, $xu);
                            if($dem >= $dungtool){
		                        chay(35);
		                        echo $daucau.$luc."Bạn Có Muốn Tiếp Tục Không (y/n): $vang";
			                        $nhap_stop = trim(fgets(STDIN));
	                            if (strtolower($nhap_stop) == 'y'){
		                            echo $daucau.$luc."Bạn Thực Hiện Thêm Bao Nhiêu Nhiệm Vụ Nữa: $vang";
			                            $them = trim(fgets(STDIN));
			                        $dungtool = $dungtool + $them;
		                            echo $daucau.$luc."Bạn Muốn Nhập Cookie Mới Không (y/n): $vang";
			                            $nhap_ck = trim(fgets(STDIN));
			                        if (strtolower($nhap_ck) == 'y') { 
				                        $khock = []; $stool = 1; break; 
			                        } else {
				                        chay(35);
				                        $stool = 1; break;
			                        }
	                            } else {
		                            exit($luc." Cảm Ơn Bạn Đã Sử Dụng Tool By ".$xnhac."An Orin \n"); 
	                            } 
	                        }
   	                        if ($dem % $chuyen == 0 ) { $stool = 1; break; }
                            if ($dem % $dungblock == 0 ){ delaybl($delaybl); } else { delay($delay); }
                        } 
                    } else { echo $do." Hết Nhiệm Vụ Cảm Xúc !!!      \r"; sleep (1); }
                }
                if ($nvcxcmt == 1) {
			        $idcxcmt = $listcxcmt[$lap]["idpost"];
			        $type = $listcxcmt[$lap]["loaicx"];
			        if ($idcxcmt !== '' and isset($idcxcmt)){
                        $g = json_decode(dvfb($type."CMT",$idcxcmt,null,$cookie),true);
                        if ($g["status"]=="error"){
                            if($g["message"]=="Bạn đã bị block !!!"){
                                echo $do." Tài Khoản $name Đã Bị Block Cx CMT !!!					\n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                            if($g["message"]=="Cookie die"){
                                echo $do."  Cookie Tài Khoản $name Đã Bị Out !!!                \n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                        }
		                $hoanthanh = nhantiencxcmt($idcxcmt, $type);
		                $xus = coin($daucau);
	                    if ($hoanthanh["mess"] and $xus !== $xu) {
		                    $xu = $xus;
                            $dem++;
                            $xujob = "+600";
                            hoanthanh($dem, $type.' CMT', $idcxcmt, $xujob, $xu);
                            if($dem >= $dungtool){
		                        chay(35);
		                        echo $daucau.$luc."Bạn Có Muốn Tiếp Tục Không (y/n): $vang";
			                        $nhap_stop = trim(fgets(STDIN));
	                            if (strtolower($nhap_stop) == 'y'){
		                            echo $daucau.$luc."Bạn Thực Hiện Thêm Bao Nhiêu Nhiệm Vụ Nữa: $vang";
			                            $them = trim(fgets(STDIN));
			                            $dungtool = $dungtool + $them;
		                            echo $daucau.$luc."Bạn Muốn Nhập Cookie Mới Không (y/n): $vang";
			                            $nhap_ck = trim(fgets(STDIN));
			                        if (strtolower($nhap_ck) == 'y') { 
				                        $khock = []; $stool = 1; break; 
			                        } else {
				                        chay(35);
				                        $stool = 1; break;
			                        }
	                            } else {
		                            exit($luc." Cảm Ơn Bạn Đã Sử Dụng Tool By ".$xnhac."An Orin \n"); 
	                            } 
	                        }
   	                        if ($dem % $chuyen == 0 ) { break; }
                            if ($dem % $dungblock == 0 ){ delaybl($delaybl); } else { delay($delay); }
                        } 
                    } else { echo $do." Hết Nhiệm Vụ Cảm Xúc Comment !!!      \r"; sleep (1);}
                }
                if ($nvpage == 1) {
                    $id = $listpage[$lap]["idpost"];
                    if ($id !== '' and isset($id)){
                        echo $id."                                         \r";
                        $g = json_decode(dvfb("likepage",$id,null,$cookie),true);
                        if ($g["status"]=="error"){
                            if($g["message"]=="Bạn đã bị block !!!"){
                                echo $do." Tài Khoản $name Đã Bị Block Like Page !!!					\n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                            if($g["message"]=="Cookie die"){
                                echo $do."  Cookie Tài Khoản $name Đã Bị Out !!!                \n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                        }
		                $hoanthanh = nhantien($id,"/likepagecheo");
		                $xus = coin($daucau);
		                if ($hoanthanh["mess"] and $xus !== $xu) {
			                $xu = $xus;
                            $dem++;
                            $xujob = "+700";
                            hoanthanh($dem, ' PAGE ', $id, $xujob, $xu);
                            if($dem >= $dungtool){
		                        chay(35);
		                        echo $daucau.$luc."Bạn Có Muốn Tiếp Tục Không (y/n): $vang";
			                        $nhap_stop = trim(fgets(STDIN));
	                            if (strtolower($nhap_stop) == 'y'){
		                            echo $daucau.$luc."Bạn Thực Hiện Thêm Bao Nhiêu Nhiệm Vụ Nữa: $vang";
			                            $them = trim(fgets(STDIN));
			                            $dungtool = $dungtool + $them;
		                            echo $daucau.$luc."Bạn Muốn Nhập Cookie Mới Không (y/n): $vang";
			                            $nhap_ck = trim(fgets(STDIN));
			                        if (strtolower($nhap_ck) == 'y') { 
				                        $khock = []; $stool = 1; break; 
			                        } else {
				                        chay(35);
			                        	$stool = 1; break;
			                        }
	                            } else {
		                            exit($luc." Cảm Ơn Bạn Đã Sử Dụng Tool By ".$xnhac."An Orin \n"); 
	                            } 
	                        }
   	                        if ($dem % $chuyen == 0 ) { $stool = 1; break; }
                            if ($dem % $dungblock == 0 ){ delaybl($delaybl); } else { delay($delay); }
                        } 
                    } else { echo $do." Hết Nhiệm Vụ Like Page !!!!                                \r"; }
                }
                if ($nvgr== 1) {
                    $id = $listgr[$lap]["idpost"];
                    if ($id !== '' and isset($id)){
                        echo $id."                                         \r";
                        $g = json_decode(dvfb("joingroup",$id,null,$cookie),true);
                        if ($g["status"]=="error"){
                            if($g["message"]=="Bạn đã bị block !!!"){
                                echo $do." Tài Khoản $name Đã Bị Block joingroup !!!					\n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                            if($g["message"]=="Cookie die"){
                                echo $do."  Cookie Tài Khoản $name Đã Bị Out !!!                \n";
                                array_splice($khock, $tr, 1); $stool = 1; break;
                            }
                        }
		                $hoanthanh = nhantien($id,"/thamgianhomcheo");
		                $xus = coin($daucau);
		                if ($hoanthanh["mess"] and $xus !== $xu) {
			                $xu = $xus;
                            $dem++;
                            $xujob = "+1200";
                            hoanthanh($dem, 'GROUP', $id, $xujob, $xu);
                            if($dem >= $dungtool){
                                chay(35);
		                        echo $daucau.$luc."Bạn Có Muốn Tiếp Tục Không (y/n): $vang";
			                        $nhap_stop = trim(fgets(STDIN));
	                            if (strtolower($nhap_stop) == 'y'){
		                            echo $daucau.$luc."Bạn Thực Hiện Thêm Bao Nhiêu Nhiệm Vụ Nữa: $vang";
			                            $them = trim(fgets(STDIN));
		                        	$dungtool = $dungtool + $them;
		                            echo $daucau.$luc."Bạn Muốn Nhập Cookie Mới Không (y/n): $vang";
			                            $nhap_ck = trim(fgets(STDIN));
			                        if (strtolower($nhap_ck) == 'y') { 
				                        $khock = []; $stool = 1; break; 
			                        } else {
				                        chay(35);
				                        $stool = 1; break;
			                        }
	                            } else {
                                    exit($luc." Cảm Ơn Bạn Đã Sử Dụng Tool By ".$xnhac."An Orin \n"); 
	                            } 
	                        }
   	                        if ($dem % $chuyen == 0 ) { $stool = 1; break; }
                            if ($dem % $dungblock == 0 ){ delaybl($delaybl); } else { delay($delay); }
                        } else { sleep(1); }
				    } else { echo $do." Đã Hết Nhiệm Vụ Group !!!           \r"; sleep (1); }
                }
            } 
        }
    }
}
/*** #####################[ FUNCTION ]#################### ***/
function logintoken(){
    sleep(3);
	$data = 'access_token='.$_SESSION['token'];
	$head[] = 'Content-type: application/x-www-form-urlencoded';
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://tuongtaccheo.com/logintoken.php',
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_COOKIEJAR => "TTC.txt",
		CURLOPT_COOKIEFILE => "TTC.txt",
        CURLOPT_USERAGENT => $_SESSION['useragent'],
        CURLOPT_ENCODING => TRUE
    ));
    $login = json_decode(curl_exec($ch));
    if($login->status == 'success'){
	    $xu = $login->data->sodu;
	    $_SESSION['user'] = $login->data->user;
	    $js = fopen($_SESSION['user'].".txt", "w+");
	    file_put_contents($_SESSION['user'].".txt", file_get_contents("TTC.txt"));
	    unlink("TTC.txt");
	    return true;
    } else if($login->status == 'fail'){
        echo "\033[1;31m ".$login->mess."\n";
        return false;
    } else {
        echo "\033[1;31m Kiểm Tra VPN (không đc sử dụng ip nước ngoài) \n"; sleep(1);
        return false;
    }
}
function cauhinh($idfb){
	while (true){
        $data = "iddat[]=".$idfb."&loai=fb";
        $head = array(
            "Host: tuongtaccheo.com",
            "content-length: ".strlen($data),
            "accept: */*",
            "origin: https://tuongtaccheo.com",
            "x-requested-with: XMLHttpRequest",
            "content-type: application/x-www-form-urlencoded; charset=UTF-8",
            "referer: https://tuongtaccheo.com/cauhinh/index.php"
        );
        $ch = curl_init();
            curl_setopt_array($ch, array(
	        CURLOPT_URL => 'https://tuongtaccheo.com/cauhinh/datnick.php',
	        CURLOPT_FOLLOWLOCATION => TRUE,
	        CURLOPT_RETURNTRANSFER => 1,
	        CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data,
	        CURLOPT_SSL_VERIFYPEER => 0,
	        CURLOPT_COOKIEFILE => $_SESSION['user'].".txt",
	        CURLOPT_USERAGENT => $_SESSION['useragent'],
	        CURLOPT_HTTPHEADER => $head,
	        CURLOPT_ENCODING => TRUE
        ));
        $access = curl_exec($ch);
        if(strpos($access, 'Chưa đăng nhập !!!') !== false){
            $login = logintoken();
    		if($login == true){
    			echo "\033[1;32m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \r"; continue;
    		} else {
    			echo "\033[1;31m TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n"; die;	
    		}
	    } else {
		    return $access;
	    }
    }
}
function getnv($type){
    $dem = 0;
    while ($dem < 3){ $dem++;
    	$head = array(
			"Host: tuongtaccheo.com",
			"accept: application/json, text/javascript, *" . "/" . "*; q=0.01",
			"x-requested-with: XMLHttpRequest",
			"user-agent: Mozilla/5.0 (Linux; Android 10; Mi 9T Pro) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/12.1 Chrome/79.0.3945.136 Mobile Safari/537.36",
			"referer: https://tuongtaccheo.com/kiemtien/"
		);
    	$ch   = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => 'https://tuongtaccheo.com/kiemtien'.$type.'/getpost.php',
        	CURLOPT_FOLLOWLOCATION => TRUE,
        	CURLOPT_RETURNTRANSFER => 1,
        	CURLOPT_POST => 1,
        	CURLOPT_HTTPGET => true,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_COOKIEFILE => $_SESSION['user'].".txt",
			CURLOPT_HTTPHEADER => $head,
			CURLOPT_ENCODING => TRUE
		));
		$access = curl_exec($ch);
		if ($access == 0){
			$login = logintoken();
			if($login == true){
				echo "\033[1;32m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \r"; 
			    return json_decode($access, true);
			    continue;
			} else {
				echo "\033[1;32m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n"; die;
			}
		} else {
			return json_decode($access, true);
		}
	}
}
function nhantien($id,$type){
    $url  = "https://tuongtaccheo.com/kiemtien".$type."/nhantien.php";
    $data = "id=".$id;
	$head = array(
        "Host: tuongtaccheo.com",
        "content-length: " . strlen($data),
        "x-requested-with: XMLHttpRequest",
        "content-type: application/x-www-form-urlencoded; charset=UTF-8",
        "origin: https://tuongtaccheo.com",
        "referer: https://tuongtaccheo.com/kiemtien".$type
    );
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_COOKIEFILE => $_SESSION['user'].".txt",
        CURLOPT_USERAGENT => $_SESSION['useragent'],
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_ENCODING => TRUE
    ));
    $a = json_decode(curl_exec($ch), true);
    return $a;
}
function nhantiencx($id,$type){
    $url  = "https://tuongtaccheo.com/kiemtien/camxuccheo/nhantien.php";
    $data = "id=".$id."&loaicx=".$type;
    $head = array(
        "Host: tuongtaccheo.com",
        "content-length: " . strlen($data),
        "x-requested-with: XMLHttpRequest",
        "content-type: application/x-www-form-urlencoded; charset=UTF-8",
        "origin: https://tuongtaccheo.com",
        "referer: https://tuongtaccheo.com/kiemtien/camxuccheo"
    );
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_COOKIEFILE => $_SESSION['user'].".txt",
        CURLOPT_USERAGENT => $_SESSION['useragent'],
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_ENCODING => TRUE
    ));
    $a = json_decode(curl_exec($ch), true);
    return $a;
}
function nhantiencxcmt($id,$type){
    $url  = "https://tuongtaccheo.com/kiemtien/camxuccheobinhluan/nhantien.php";
    $data = "id=".$id."&loaicx=".$type;
	$head = array(
        "Host: tuongtaccheo.com",
        "content-length: " . strlen($data),
        "x-requested-with: XMLHttpRequest",
        "content-type: application/x-www-form-urlencoded; charset=UTF-8",
        "origin: https://tuongtaccheo.com",
        "referer: https://tuongtaccheo.com/kiemtien/camxuccheobinhluan"
    );
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_COOKIEFILE => $_SESSION['user'].".txt",
        CURLOPT_USERAGENT => $_SESSION['useragent'],
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_ENCODING => TRUE
    ));
    $a = json_decode(curl_exec($ch), true);
    return $a;
}
function coin($daucau){
	$dem = 0;
    while ($dem < 3){ $dem++;
		$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://tuongtaccheo.com/home.php',
		CURLOPT_PORT => "443",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_SSL_VERIFYPEER => true,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_COOKIEFILE => $_SESSION['user'].".txt",
		CURLOPT_USERAGENT => $_SESSION['useragent'],
		));
		$access = curl_exec($ch);
			curl_close($ch);
		$xu = explode('"soduchinh">', explode('</strong>', $access)[0])[1];
		if (strpos ($access, "Chào mừng") == false){
			$login = logintoken();
    		if($login == true){
    			echo "\033[1;32m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \n"; continue;
    		} else {
    			echo "\033[1;31m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n"; die;	
			}
		} else if ($xu !== ''){
			return $xu;
		} else {
			echo "\033[1;31m Lỗi Không Xác Định                  \r";
		}
	}
}
function namefb ($cookie){
	$ch = curl_init();
	$head= array("Connection: keep-alive","Keep-Alive: 300","authority: m.facebook.com","ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7","accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5","cache-control: max-age=0","upgrade-insecure-requests: 1","accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9","sec-fetch-site: none","sec-fetch-mode: navigate","sec-fetch-user: ?1","sec-fetch-dest: document");
	$ch=curl_init();
	curl_setopt_array($ch , array(
		CURLOPT_URL => 'https://mbasic.facebook.com/profile.php',
		CURLOPT_TIMEOUT => 60,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_CONNECTTIMEOUT => 60,
		CURLOPT_USERAGENT => $_SESSION['useragent'],
		CURLOPT_COOKIE => $cookie,
		CURLOPT_SSL_VERIFYPEER => TRUE,
		CURLOPT_HTTPHEADER => $head
	));
	$access = curl_exec($ch);
	if(strpos ($access, 'Đăng nhập') !== false){
		return 'die';
	} else {
		$name = explode ('</title>', explode ('xhtml"><head><title>', $access)[1])[0];
		return $name;
	}
}

function dvfb($loai,$id,$noidung,$cookie){
    $url='https://'.$_SESSION['API'].'/api/?loai='.$loai.'&id='.$id.'&noidung='.urlencode($noidung).'&cookie='.urlencode($cookie);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: '.$_SESSION['API'],
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: max-age=0',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: TOOL TĐK',
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function hoanthanh($dem, $loai, $id, $xujob, $xu){
$tt = "\r\033[1;31m|\033[1;37m" . $dem . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m".$loai."\033[1;91m| \033[1;97m" . $id . "\033[1;91m |\033[1;92m ".$xujob." \033[1;91m| \033[1;93m" . $xu . "\e[0m\033[1;91m |\n";
for($i=0;$i<strlen($tt);$i++){echo $tt[$i]; usleep(0.2); }
}
function delay($delay)
{
    for($tt = $delay ;$tt> -1;$tt--){
        echo "\r\033[1;33m   Trần Đăng Khoa \033[1;31m =>       \033[1;32m LO      \033[1;31m | $tt | ";
        usleep(145000);
        echo "\r\033[1;31m    Trần Đăng Khoa \033[0;33m   =>     \033[0;37m LOA     \033[0;31m | $tt | ";
        usleep(145000);
        echo "\r\033[1;32m    Trần Đăng Khoa \033[0;33m    =>   \033[0;37m LOAD    \033[0;31m | $tt | ";
        usleep(145000);
        echo "\r\033[1;34m    Trần Đăng Khoa \033[0;33m     => \033[0;37m LOADI   \033[0;31m | $tt | ";
        usleep(145000);
        echo "\r\033[1;35m    Trần Đăng Khoa \033[0;33m      =>\033[0;37m LOADIN  \033[0;31m | $tt | ";
        usleep(140000);
        echo "\r\033[1;35m    Trần Đăng Khoa \033[0;33m       =>\033[0;37m LOADING \033[0;31m | $tt | ";
        usleep(145000);
        echo "\r\033[1;35m    Trần Đăng Khoa \033[0;33m        =>\033[0;37m LOADING\033[0;31m | $tt | ";
        usleep(14500);
        echo "\r\e[1;95m    Trần Đăng Khoa                                  \r";
    }
}
function delaybl($delaybl) {
    for ($time = $delaybl; $time > -0; $time--) {echo "\r"; 
	    echo "\r\033[1;97m Đang hoạt động chống block sẽ chạy lại sau $time giây"; sleep(1); echo "\r                                                       \r"; 
    }
}
function chay($t) {
    for ($x = 0; $x <= $t; $x++) {
        echo "\033[1;37m= ";usleep($_SESSION['load']); 
    }
    echo"\n";
}