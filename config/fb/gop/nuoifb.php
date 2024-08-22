<?php
header('Content-Type: text/html; charset=utf-8');
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if($userAgent!='TOOL TĐK'){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
    die;
}
?>
#TOOL TĐK
@system('clear');
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
/***[ Color ]***/
$xnhac = "\033[1;36m";
$do = "\033[1;31m";
$luc = "\033[1;32m";
$vang = "\033[1;33m";
$xduong = "\033[1;34m";
$hong = "\033[1;35m";
$trang = "\033[1;37m";
$whiteb="\033[1;37m";
$red="\033[0;31m";
$redb="\033[1;31m";
$thanh_thang_mau_trang = "\033[1;37m- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \n";
/***[ Delay ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
    $_SESSION['load'] = 1200;
    $_SESSION['delay'] = 2000;
} else {
    $_SESSION['load'] = 0;
    $_SESSION['delay'] = 1000;
}
/***[ Banner ]***/
$_SESSION["banner"]="\033[1;32m|════════════════════════════════════════════════════════════|
                \033[1;37mCopyright by Trần Đăng Khoa

\033[1;31m                 ████████╗██████╗ ██╗  ██╗
\033[1;36m                 ╚══██╔══╝██╔══██╗██║ ██╔╝
\033[1;34m                    ██║  ████╗ ██║█████╔╝ 
\033[1;35m                    ██║   ██╔╝ ██║██╔═██╗ 
\033[1;33m                    ██║   ██████╔╝██║  ██╗
\033[1;37m                    ╚═╝   ╚═════╝ ╚═╝  ╚═╝

\033[1;32m║════════════════════════════════════════════════════════════║
\033[1;32m║                                                            ║
\033[1;32m║\033[1;36mGroup Zalo: \033[1;37mhttps://zalo.me/g/zjuifu583                     \033[1;32m║
\033[1;32m║\033[1;35mZalo: \033[1;37m0936763612                                            \033[1;32m║
\033[1;32m║\033[1;33mYoutuber: \033[1;37mTrần Đăng Khoa                                    \033[1;32m║
\033[1;32m║\033[1;31mWebsite: \033[1;37mDichvuquare.com                                    \033[1;32m║
\033[1;32m=>\033[1;34mFacebook: \033[1;37mTrần Đăng Khoa                                   \033[1;32m║
\033[1;32m║════════════════════════════════════════════════════════════║
";
$daucau= $do."[" . $trang . "●" . $do . "] ".$trang."=> ";
$daucau2= $do."[" . $trang . "●" . $do . "] ";
$thanhngang= $do."------------------------------------------------------------\n";

@system('clear');
banner();
$khoToken = [];
echo $thanh_thang_mau_trang;
$a=1;
while(true){
    echo $daucau.$luc."Nhập Cookie Clone Thứ \033[1;37m$a: $vang";
    $nhapck = (string)trim(fgets(STDIN));
    if($nhapck == ''){break;}
    array_push($khoToken,$nhapck);
    $a++;
}
    $js=json_encode($khoToken);
    $demcki=count($khoToken);





echo "\r                                \r";
echo $thanh_thang_mau_trang;
$khocmt = [];
if (file_exists('cmtTT.txt')){
    echo $daucau.$luc."Nhấn \033[1;37mEnter \033[1;32mĐể Dùng Nội Dung Comment Cũ, Nhập \033[1;37mn \033[1;32mĐể Thay Comment Mới$trang:$vang ";
     $choice=trim(fgets(STDIN));
    if ($choice=='n'){ @system('rm cmtTT.txt'); } }

@system('clear');
banner();
// echo $thanhngang;
//echo $daucau1."Bạn đã đăng nhập\033[1;37m FB:\033[1;33m $tenfb \033[1;37mID\033[1;33m $idfb ";
echo $daucau.$luc."Nhập ".$do."[".$vang."1".$do."] ".$luc."Auto Cảm Xúc Dạo\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."2".$do."] ".$luc."Auto Comment Dạo\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."3".$do."] ".$luc."Auto Kết Bạn Dạo\n";
echo $daucau.$xnhac."Muốn Chạy Random Thì Ghép Mấy Số Nhiệm Vụ Bất Kỳ\n";
echo $thanh_thang_mau_trang;
echo $daucau.$luc."Nhập Số Để Chạy Nhiệm Vụ$trang: $vang";
$chedo = trim(fgets(STDIN));
if(strpos($chedo, '1') !== false){
echo $thanh_thang_mau_trang;
echo $daucau.$luc."Nhập ".$do."[".$vang."1".$do."] ".$luc."Auto Cảm Xúc Like\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."2".$do."] ".$luc."Auto Cảm Xúc Love\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."3".$do."] ".$luc."Auto Cảm Xúc Thương Thương\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."4".$do."] ".$luc."Auto Cảm Xúc Haha\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."5".$do."] ".$luc."Auto Cảm Xúc Wow\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."6".$do."] ".$luc."Auto Cảm Xúc Buồn\n";
echo $daucau.$luc."Nhập ".$do."[".$vang."7".$do."] ".$luc."Auto Cảm Xúc Phẫn Nộ\n";
echo $daucau.$xnhac."Muốn Chạy Random Thì Ghép Mấy Số Nhiệm Vụ Bất Kỳ\n";
echo $thanh_thang_mau_trang;
echo $daucau.$luc."Nhập Cảm Xúc Bạn Muốn Chạy Chạy$trang:$vang "; 
$loaicx = trim(fgets(STDIN));
$listcx = []; 

if(strpos($loaicx,'1') !== false){
    array_push($listcx,'LIKE');
}
if(strpos($loaicx,'2') !== false){
    array_push($listcx,'LOVE');
}
if(strpos($loaicx,'3') !== false){
    array_push($listcx,'CARE');
}
if(strpos($loaicx,'4') !== false){
    array_push($listcx,'HAHA');
}
if(strpos($loaicx,'5') !== false){
    array_push($listcx,'WOW');
}
if(strpos($loaicx,'6') !== false){
    array_push($listcx,'SAD');
}
if(strpos($loaicx,'7') !== false){
    array_push($listcx,'ANGRY');
}
}
echo $thanh_thang_mau_trang;
//echo $daucau1."Ẩn id FB của bạn (y/n): \033[1;33m"; 
//$anid = trim(fgets(STDIN));
if(strpos($chedo, '2') !== false){
///
if(!file_exists('cmtTT.txt')){
      echo $daucau.$luc."Bạn Muốn Chạy Bao Nhiêu Comment$trang:$vang ";
      $sttcmt = trim(fgets(STDIN));
      echo $thanh_thang_mau_trang;
      for($a=1;$a<=$sttcmt;$a++){
        echo $daucau.$luc."Nhập Nội Dung Comment Thứ \033[1;37m$a\033[1;32m: $vang";  
        $nhapck = (string)trim(fgets(STDIN));
    if($nhapck == ''){break;}
    array_push($khocmt,$nhapck);
        }
                $js=json_encode($khocmt);
                $demcmt=count($khocmt);
                $k = fopen("cmtTT.txt","a+");
    fwrite($k, $js);
    fclose($k);
    }else{
        $khocmt = json_decode(fread(fopen("cmtTT.txt","r"),filesize("cmtTT.txt")),true);
        $demcmt = count($khocmt);
        $a = 0;
        for($ss = 0; $ss < $demcmt; $ss++){
        $a++;
            echo $daucau.$luc."Nội Dung Comment Thứ\033[1;37m $a\033[1;32m: \033[1;33m".$khocmt[$ss]."\n"; 
        }
    }
}
echo $daucau.$luc."Bạn Có Muốn Ẩn ID Facebook Của Bạn Không? \033[1;32m(\033[1;33my/\033[1;31mn\033[1;32m)$trang: \033[1;33m";
$anid = trim(fgets(STDIN));
echo $daucau.$luc."Nhập Delay$trang:$vang "; 
$delaya=trim(fgets(STDIN));
if($delaya == ""){
$delaya =0;
}
///doi acc
echo $daucau.$luc."Sau Bao Nhiêu Nhiệm Vụ Thì Đổi Nick$trang:$vang "; 
$doiacc = (int)trim(fgets(STDIN));
// Dừng Tool
echo $daucau.$luc."Sau Bao Nhiêu Nhiệm Vụ Thì Dừng Tool$trang:$vang "; 
$stop = (int)trim(fgets(STDIN));

//echo $thanhngang1;
$dem = 0;
@system('clear');
banner();
while(true){
    if(count($khoToken) == 0){
    
        echo $daucau.$luc."Toàn bộ cookie đã die\n";
        echo $thanh_thang_mau_trang;
        $a=1;
        while(true){
        echo $daucau.$luc."Nhập Cookie Clone Thứ \033[1;37m$a: $vang";
    $nhapck = (string)trim(fgets(STDIN));
    if($nhapck == ''){break;}
    array_push($khoToken,$nhapck);
    $a++;
        }
      }


    for($xz=0;$xz<count($khoToken);$xz++){
        $spam = 0;
        $cookie = $khoToken[$xz];
        //ketnoimangV1();
        $thongtin=json_decode(dvfb("thongtin",null,null,$cookie),true);
        if($thongtin['status'] == 'error'){
            if($thongtin['message']=="Cookie die"){
                $spam = 1; 
                echo $red."Cookie die \n";
                array_splice($khoToken,$xz,1);
            }
        }else{
           //ketnoimangV1();
            // Lấy ID FB
            $idfb = $thongtin['message']['id'];
            // Lấy Tên FB
            $tenfb = $thongtin['message']['name'];
            if($anid == "y"){
                $idfb = substr($idfb, -4);    // returns "f"
                $idfb = "##########".$idfb;
            }
            echo "\r                            \r";
echo $thanhngang; 
echo $luc."Đang Cấu Hình ID:\033[1;37m ".$idfb." ".$luc."Tên FB:\033[1;37m ".$tenfb."".$res."\n";
echo $thanhngang; 
        }
    while(true){

        if($spam == 1){
            break;
        }

            $pickmsg = "";
            $id = "";
            $dem1 = 0;
            
            while($id == ""){
                    $thongtin=json_decode(dvfb("nuoifbgetpost",null,null,$cookie),true);
                    $id = $thongtin['message'];
                if($thongtin['status']=='error'){
                    if($thongtin['message']=='Cookie die'){
                        echo "\r                            \r";
                        echo "Có thể Cookie đã bị die hoặc lỗi vui lòng nhập lại cookie mới";
                        sleep(1);
                        $spam=1;
                        break;
                    } else {
                        echo "\r                            \r";
                        echo $thongtin['message']."         \r";
                        sleep(1);
                    }
                }
            }
        if(strpos($chedo, '1') !== false){
                echo "\r".$id."                                              \r";
            $setcx = array_rand($listcx);
            $type = $listcx[$setcx];
            $g = json_decode(dvfb($type."NUOI",$id,null,$cookie),true);
            if ($g['status']=="error") {
                if ($g['message']=="Cookie die"){
                    echo "\033[1;31mCookie \033[1;97m".$tenfb."\033[1;91m die !!?!\n";
                    array_splice($khoToken,$xz,1);
                    $spam = 1; break;
                }
                if($g["message"]=="Bạn đã bị block !!!"){
                    echo "\033[1;91m Tài khoản bị block                                         \r";
                    $spam = 1;
                    array_splice($khoToken,$xz,1);
                    break;
                }
            }

            $dem++;
            if($type == 'LIKE'){
                $type ==' LIKE  ';
            }
            if($type == 'LOVE'){
                $type ==' LOVE  ';
            }
            if($type == 'CARE'){
                $type ==' CARE  ';
            }
            if($type == 'HAHA'){
                $type ==' HAHA  ';
            }
            if($type == 'WOW'){
                $type =='  WOW  ';
            }
            if($type == 'SAD'){
                $type =='  SAD  ';
            }
            if($type == 'ANGRY'){
                $type ==' ANGRY ';
            }
            hoanthanh($id,$type,$dem,$pickmsg);
                // Delay
            delay($delaya);
            
        }
        if($dem % $stop == 0){
            echo "\r                                                           \r";
            echo $daucau2.$luc."Đã hoàn thành muốn chạy tiếp nhấn Enter\n".$vang;
            $clgtresscca = trim(fgets(STDIN));
            echo $daucau2.$luc."Dừng tool sau bao nhiêu nhiệm vụ: \033[1;33m".$vang; 
            $stopthem = (int)trim(fgets(STDIN));
            $stop = $stop + $stopthem;
            }
        if($dem % $doiacc == 0){
            $spam=1;
            break;
            }

        if(strpos($chedo, '2') !== false){
                echo "\r".$id."                                              \r";
            while(!file_exists('cmtTT.txt')){
                echo "\r                                      \r"; 
                echo "\r\e[1;95m    Tạm dừng vì chưa có nội dung cmt                \r"; 
                sleep(2);
            }
            $khocmt = json_decode(fread(fopen("cmtTT.txt","r"),filesize("cmtTT.txt")),true);
            $demcmt = count($khocmt);
            $sttcmt = rand(0,$demcmt-1);
            $pickmsg = $khocmt[$sttcmt];
            $cmt=dvfb("comment",$id,$pickmsg,$cookie);
            $cmt=json_decode($cmt,true);
            if($cmt['status']=="error"){
                if ($cmt['message']=="Cookie die"){
                    echo "\033[1;31mCookie \033[1;97m".$tenfb."\033[1;91m die !!?!\n";
                    array_splice($khoToken,$xz,1);
                    $spam = 1; break;
                }
                if($cmt["message"]=="Bạn đã bị block !!!"){
                    echo "\033[1;91m Tài khoản bị block                             \r";
                    $spam = 1;
                    array_splice($khoToken,$xz,1);
                    break;
                }
            }
            $type = "Comment";
            $dem++;
            hoanthanh($id,$type,$dem,$pickmsg);
                // Delay
            delay($delaya);
        }
        if($dem % $stop == 0){
            echo "\r                                                           \r";
            echo $daucau2.$luc."Đã hoàn thành muốn chạy tiếp nhấn Enter\n".$vang;
            $clgtresscca = trim(fgets(STDIN));
            echo $daucau2.$luc."Dừng tool sau bao nhiêu nhiệm vụ: \033[1;33m".$vang; 
            $stopthem = (int)trim(fgets(STDIN));
            $stop = $stop + $stopthem;
            }
        if($dem % $doiacc == 0){
            $spam=1;
            break;
            }



        if(strpos($chedo, '3') !== false){
            //ketnoimangV1();
        $a=json_decode(dvfb('nuoifbadd',null,null,$cookie),true);
        if($a['status']=='error'){
            if ($a['message']=="Cookie die"){
                echo "\033[1;31mCookie \033[1;97m".$tenfb."\033[1;91m die !!?!\n";
                array_splice($khoToken,$xz,1);
                $spam = 1; break;
            }
            if($a['message']=="Bạn đã bị block !!!"){
                echo "\033[1;91m Tài khoản bị block          \r";
                $spam = 1;
                array_splice($khoToken,$xz,1);
                break;
            }
        }
        $id=$a['id'];
            echo "\r".$id."                                              \r";
        $type = "Kết Bạn";
        $pickmsg = "";
        $dem++;
        hoanthanh($id,$type,$dem,$pickmsg);
            // Delay
        $delay = rand($delaya,$delayb);
        delay($delaya);
        }

        

        // Hoàn Thành

        //dừng
        if($dem % $stop == 0){
            echo "\r                                                           \r";
            echo $daucau2.$luc."Đã hoàn thành muốn chạy tiếp nhấn Enter\n".$vang;
            $clgtresscca = trim(fgets(STDIN));
            echo $daucau2.$luc."Dừng tool sau bao nhiêu nhiệm vụ: \033[1;33m".$vang; 
            $stopthem = (int)trim(fgets(STDIN));
            $stop = $stop + $stopthem;
            }
        if($dem % $doiacc == 0){
            $spam=1;
            break;
            }


}}}

function hoanthanh($id,$type,$dem,$pickmsg){
    echo "\r";
    echo "                                       \r";
      $a = "\033[1;31m[\033[1;33m".$dem."\033[1;31m]\033[1;37m | \033[1;36m".date("H:i:s")."\033[1;37m |\033[1;33m $type\033[1;37m | \033[1;33m\033[1;92m facebook.com/".$id."\033[1;37m |\033[1;33m $pickmsg\n ";
      $len = strlen($a);
      for ($x = 0; $x < $len; $x++) {
          echo $a[$x];
          usleep(600);
      }
  }

///get token fb   

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
        usleep(14000);
        echo "\r\e[1;95m    Trần Đăng Khoa                                  \r";
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
