<?php
header('Content-Type: text/html; charset=utf-8');
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if($userAgent!='TOOL TĐK'){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
    die;
}
?>
#TOOL TĐK
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
/***[ Color ]***/
$nau= "\e[38;5;94m";
$xnhac = "\033[1;36m";
$do = "\033[1;31m";
$luc = "\033[1;32m";
$vang = "\033[1;33m";
$xduong = "\033[1;34m";
$hong = "\033[1;35m";
$trang = "\033[1;37m";
/***[ USERAGENT ]***/
$_SESSION['useragent'] = 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36';
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
	$_SESSION['load'] = 200;
} else {
	$_SESSION['load'] = 0;
}
/***[ Đánh Dấu Bản Quyền ]***/
$thanhngang= $do."------------------------------------------------------------\n";
$daucau= $do."[" . $trang . "●" . $do . "] ".$trang."=> ";
/***[ Delay ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
	$_SESSION['load'] = 1500;
	$_SESSION['delay'] = 2000;
} else {
	$_SESSION['load'] = 0;
	$_SESSION['delay'] = 1000;
}
banner();
testInternet();
$listnv = [];
while (true){
if (file_exists("TDS.txt")){
$data = fread(fopen("TDS.txt", "r"), filesize("TDS.txt"));
if ($data == "") { unlink("TDS.txt"); continue; }
$_SESSION['token']= $data;
$login = login();
if ($login == false) { unlink("TDS.txt"); continue; }
echo $daucau.$luc."Nhập ".$vang."[".$trang."1".$vang."] ".$luc."Giữ Lại Tài Khoản ".$vang.$_SESSION["username"]."\n";
echo $daucau.$luc."Nhập ".$vang."[".$trang."2".$vang."] ".$luc."Nhập Tài Khoản TDS Mới \n";
echo $daucau.$luc."Nhập ".$trang."===>: $vang";
$chon_tk = trim(fgets(STDIN));
    if ($chon_tk == "2") {
        unlink("TDS.txt");
         
	} else if ($chon_tk == "1") {
    } else {
		echo $do." Lựa chọn không xác định !!!\n"; 
		  continue;
    }
}
if (!file_exists("TDS.txt")){
echo $daucau."\033[1;32mNhập Token TDS: \033[1;33m"; $token = trim(fgets(STDIN));
$file = fopen("TDS.txt", "w+");
fwrite($file, $token);
fclose($file);
}
$data = fread(fopen("TDS.txt", "r"), filesize("TDS.txt"));
$_SESSION["token"] = $data;
$login = login();

if ($login == true) {
break;
} else {
echo $do." Đăng Nhập Thất Bại.\n";
unlink("TDS.txt");
}
}
banner();
$_SESSION['id']="";
while(cauhinh()!==1){
    echo $daucau.$luc."Bạn vui lòng nhập id tiktok cần chạy: ";
    $_SESSION['id']=trim(fgets(STDIN));
    if(cauhinh()!==1){
        echo $daucau.$do."Id chưa được thêm vào cấu hình vui lòng nhập lại.\n";
    } else {
        echo $daucau.$luc."Cấu Hình Thành Công.\n";
    }
}
banner();
echo $thanhngang;
echo$daucau."\033[1;32mNhập Số \033[1;31m[\033[1;33m1\033[1;31m] \033[1;32mNhiệm Vụ Tim \n";
echo$daucau."\033[1;32mNhập Số \033[1;31m[\033[1;33m2\033[1;31m] \033[1;32mNhiệm Vụ Follow  \n";
echo$daucau."\033[1;32mChọn Nhiệm Vụ: \033[1;33m";
$chonnv=trim(fgets(STDIN));
while($chonnv != 1 && $chonnv != 2){
    echo $daucau.$do."Nhập sai, Nhập lại: ".$vang;
    $chonnv=trim(fgets(STDIN));
}
$solan=0;
while(true){
echo $daucau. $luc . "Nhận Xu Sau Bao Nhiêu Nhiệm Vụ \033[97m(\033[93mNhập 8 Trở Lên\033[97m)".$luc.":\033[93m ";
$solan=trim(fgets(STDIN));
if(!is_numeric($solan)){
    continue;
}
if($solan < 8){
    echo"Nhập lại số lần nhận lớn hơn 8:";
    $solan=trim(fgets(STDIN));
    continue;
}
if($solan>=8){
    break;
}
}
while(true){
    echo $daucau. $luc . "Nhập delay".$luc.":\033[93m ";
    $delay=trim(fgets(STDIN));
    if(!is_numeric($delay)){
        echo $do."Lỗi vui lòng nhập lại";
        continue;
    }
    if($delay>=0){
        break;
    }
}
banner();
$stt=0;
$lannhan=0;
while(true){
    testInternet();
    if ($chonnv == 1) {
        $getnv=getnv('tiktok_like');

        $nv = json_decode($getnv,true);
    

    
        if (isset($nv['data'])) {
            $laynv = $nv['data'];
            foreach ($laynv as $item) {
                $link = $item['link'];
                $idjb = $item['id'];
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
                    echo $daucau . "" . $luc . " Đang Chuyển Hướng Tới Tiktok";
                    @system('xdg-open ' . $link);
                } else {
                    echo $daucau . "" . $luc . " Đang Chuyển Hướng Tới Tiktok";
                    @system('cmd /c start ' . $link);
                }
                   $stt++;
                $lannhan++;
                $tt = "\r\033[1;31m|\033[1;37m" . $stt . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93mLike Tiktok\033[1;91m| \033[1;97m" . $idjb . "\033[1;91m|\n";
                echo $tt;
                delay($delay);
                duyetjb("TIKTOK_LIKE_CACHE",$idjb);
                if ($lannhan == $solan) {
                    $lannhan=0;
                    $nhan = json_decode(nhanxu('TIKTOK_LIKE', 'TIKTOK_LIKE_API'), true);
            
                    if (isset($nhan['success'])) {
                        echo $thanhngang;
                        echo $luc . "Thành công " . $vang . $nhan['data']['msg'] . $luc . " bạn đã hoàn thành " . $nhan['data']['job_success'] . " job => " . $trang . $nhan['data']['xu'] . " xu\n";
                        echo $thanhngang;
                    } else {
                        echo $thanhngang;
                        echo $do . "Thất bại " . $nhan['error'];
                        echo $thanhngang;
                    }
                }
            }
        } 
        if (isset($nv['error'])) {
            echo "Like tiktok tạm thời hết nhiệm vụ                                        \r";
            continue;
        }
    }
    if ($chonnv == 2) {
        $getnv=getnv('tiktok_follow');
        //echo$getnv;
        $nv = json_decode($getnv,true);
    
    
        if (isset($nv['data'])) {
            $laynv = $nv['data'];
            foreach ($laynv as $item) {
                $link = $item['link'];
                $idjb = $item['id'];
                if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
                    echo $daucau . "" . $luc . " Đang Chuyển Hướng Tới Tiktok";
                    @system('xdg-open ' . $link);
                } else {
                    echo $daucau . "" . $luc . " Đang Chuyển Hướng Tới Tiktok";
                    @system('cmd /c start ' . $link);
                }
                   $stt++;
                $lannhan++;
                $tt = "\r\033[1;31m|\033[1;37m" . $stt . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93mFollow Tiktok\033[1;91m| \033[1;97m" . $idjb . "\033[1;91m|\n";
                echo $tt;
                delay($delay);
                duyetjb("TIKTOK_FOLLOW_CACHE",$idjb);
                if ($lannhan == $solan) {
                    $lannhan=0;
                    $nhan = json_decode(nhanxu('TIKTOK_FOLLOW', 'TIKTOK_FOLLOW_API'), true);
            
                    if (isset($nhan['success'])) {
                        echo $thanhngang;
                        echo $luc . "Thành công " . $vang . $nhan['data']['msg'] . $luc . " bạn đã hoàn thành " . $nhan['data']['job_success'] . " job => " . $trang . $nhan['data']['xu'] . " xu\n";
                        echo $thanhngang;
                    } else {
                        echo $thanhngang;
                        echo $do . "Thất bại " . $nhan['error'];
                        echo $thanhngang;
                    }
                }
            }
        } 
        if (isset($nv['error'])) {
            if($nv['error']=="Vui lòng ấn NHẬN TẤT CẢ rồi sau đó tiếp tục làm nhiệm vụ để tránh lỗi!"){
                $lannhan=0;
                $nhan = json_decode(nhanxu('TIKTOK_FOLLOW', 'TIKTOK_FOLLOW_API'), true);
    
                if (isset($nhan['success'])) {
                    echo $thanhngang;
                    echo $luc . "Thành công " . $vang . $nhan['data']['msg'] . $luc . " bạn đã hoàn thành " . $nhan['data']['job_success'] . " job => " . $trang . $nhan['data']['xu'] . " xu\n";
                    echo $thanhngang;
                } else {
                    echo $thanhngang;
                    echo $do . "Thất bại " . $nhan['error'];
                    echo $thanhngang;
                }
            }
            echo "Follow tiktok tạm thời hết nhiệm vụ                                        \r";
            continue;
        }
    }
}

///function
function testInternet()
{
    while (!$sock = @fsockopen('www.google.com', 80)) {
        $load = "\r\033[91m Vui Lòng Kiểm Tra Kết Nối Internet";
        $string = strlen($load);for ($j = 0; $j <= $string; $j++) {
            echo $load[$j];
            usleep(5000);}
        sleep(1);
        echo "\r                                   ";
        $load = "\r\033[92m Đang Thử Kết Nối Lại...";
        $string = strlen($load);for ($j = 0; $j <= $string; $j++) {
            echo $load[$j];
            usleep(20000);}
        sleep(3);
        echo "\r                                   ";
        $load = "\r\033[92m Đang Thử Kết Nối Lại...";
        $string = strlen($load);for ($j = 0; $j <= $string; $j++) {
            echo $load[$j];
            usleep(20000);}
        sleep(3);
        echo "\r                        ";
    }

}
function login() {
    $token = $_SESSION['token'];
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://traodoisub.com/api/?fields=profile&access_token='.$token,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    $json=json_decode($response,true);
    curl_close($curl);
    if(isset($json['success'])){
        $response=true;
        $_SESSION['username']=$json["data"]["user"];
    } else {
        $response=false;
    }
    return $response;
}
function cauhinh(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://traodoisub.com/api/?fields=tiktok_run&id='.$_SESSION["id"].'&access_token='.$_SESSION['token'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $json=json_decode($response,true);
    $a='';
    if(isset($json["success"])){
         $a=1;
    }
    return $a;
}
function getnv($loai){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://traodoisub.com/api/?fields='.$loai.'&access_token='.$_SESSION['token'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
return $response;
}
function duyetjb($loai,$id){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://traodoisub.com/api/coin/?type='.$loai.'&id='.$id.'&access_token='.$_SESSION['token'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
return $response;
}
function nhanxu($loai,$id){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://traodoisub.com/api/coin/?type='.$loai.'&id='.$id.'&access_token='.$_SESSION['token'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
return $response;
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