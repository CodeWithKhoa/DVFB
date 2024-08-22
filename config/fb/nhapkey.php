<?php
header('Content-Type: text/html; charset=utf-8');
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if($userAgent!='TOOL TĐK'){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
    die;
}
?>
#TOOL TĐK
error_reporting(0);
date_default_timezone_set("Asia/Ho_Chi_Minh");
$res="\033[0m";
$BBlack="\033[1;30m" ; 
$BRed="\033[1;31m" ;
$Bmg="\033[1;32m" ;
$BYellow="\033[1;33m" ;
$BBlue="\033[1;34m" ;
$BPurple="\033[1;35m" ;
$BCyan="\033[1;36m" ;
$BWhite="\033[1;37m" ;
$Blue="\033[0;34m";
$lmg="\033[1;32m";
$red="\033[1;31m";
$xanh="\033[1;32m";
$cyan="\033[1;36m";
$yellow="\033[1;33m";
$mtool="\033[1;34m";
$maugi="\033[1;35m";
$white= "\033[1;37m";
$red="\033[1;31m";
$white= "\033[1;37m";
$whiteb= "\033[1;37m";
$pmtol="\033[1;31m";
$green="\033[1;32m";
$yellow="\033[1;33m";
$cam="\033[1;33m";
$test="\033[1;33m";
$greenb="\033[1;32m";
$blue="\033[1;34m";
$lam="\033[1;34m";
$tmi="\033[1;34m";
$hong="\033[1;35m";
$imt="\033[1;35m";
$cyan= "\e[1;36m";
$syan="\033[1;36m";
$xnhac= "\033[1;96m";
$den="\033[1;90m";
$do="\033[1;91m";
$luc="\033[1;92m";
$vang="\033[1;93m";
$xduong="\033[1;94m";
$hong="\033[1;95m";
$trang="\033[1;97m";
$vang="\033[1;93m";
$do="\033[1;91m";
$BBlack="\033[1;30m";      
$BRed="\033[1;31m";
$BGreen="\033[1;32m";
$BYellow="\033[1;33m";
$BBlue="\033[1;34m";
$BPurple="\033[1;35m";
$BCyan="\033[1;36m";
$BWhite="\033[1;37m";
$Blue="\033[0;34m";
$lime="\033[1;32m";
$red="\033[1;31m";
$xanh="\033[1;32m";
$cyan="\033[1;36m";
$yellow="\033[1;33m";
$turquoise="\033[1;34m";
$maugi="\033[1;35m";
$white= "\033[1;37m";
$BCyan="\033[1;36m";
$trang="\033[1;37m";
$do="\033[1;31m";
$luc="\033[1;32m";
$vang="\033[1;33m";
$luc="\033[1;92m";
$ngblack="\033[40m"; 
$maufulldo= "\e[1;47;31m"; 
$ress="\033[0;32m";
$maufulldo= "\e[1;47;31m";
$res="\033[0m";
$red="\033[1;31m";
$green="\033[1;92m";
$yellow="\033[1;93m";
$white= "\033[1;97m";  
$banner="\r";
$xnhac= "\033[1;96m";
$den="\033[1;90m";
$do="\033[1;91m";
$luc="\033[1;92m";
$vang="\033[1;93m";
$xduong="\033[1;94m";
$hong="\033[1;95m";
$trang="\033[1;97m";
$ngay = date("d-m-Y"); 
$cuongdz = $do."[".$luc."•".$do."] ".$trang."=> ";
$cuongvip = $do."[".$luc."•".$do."]";
$thanhngang = $trang."----------------------------------------------------------\n";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36";
$wait = $green."Đợi";
$ress = "\033[0;32m";
$res = "\033[0;33m";
$red = "\033[0;31m";
$green = "\033[0;37m";
$yellow = "\033[0;33m";
$white = "\033[1;37m";
$xnhac = "\033[1;96m";
$den = "\033[1;90m";
$do = "\033[1;91m";
$luc = "\033[1;92m";
$vang = "\033[1;93m";
$xduong = "\033[1;94m";
$hong = "\033[1;95m";
$trang = "\033[1;97m";
$do="\033[1;91m";
$maufulldo= "\e[1;47;31m";
$res="\033[0m";
$red="\e[1;31m";
$pink="\e[1;35m";
$green="\e[1;32m";
$yellow="\e[1;33m";
$y2="\033[0;33m";
$cyan= "\e[1;36m";
$blue="\e[1;34m";
$ngreen="\033[42m";
$ngblack="\033[40m";
$nen="\033[1;47;1;34m";
$_SESSION['API']="apitools.dichvuquare.com";
$filekey="KEY_TDK.txt";
@system('clear');
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
$thanhngang= $do."------------------------------------------------------------\n";
$thanh_thang_mau_trang = "\033[1;37m- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \n";
function banner(){
    @system("clear");
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') { 
        @system('clear'); 
    } else { 
        @system('cls'); 
    }
    for($i = 0; $i < strlen($_SESSION["banner"]); $i++){echo $_SESSION["banner"][$i];usleep(0.5);}
}
if(file_exists($filekey)){
    $key=doc_file($filekey);
    $check=getkey('https://'.$_SESSION['API'].'/checkkey.php?key='.$key);
    $check2=getkey2($key);
    if($check['status']=='success'){
        $linkkey1=$check['link1'];
        $linkkey2=$check['link2'];
        $songay=$check['rate']." Day";
        $thoigiantao=$check['create'];
        $thoigianhet=$check['end'];
        eval(gett("https://".$_SESSION['API']."/gop/gop.php"));
        die;
    } else if($check2['status']=='success'){
        $linkkey1='';
        $linkkey2='';
        $songay=$check2['amount'];
        $thoigiantao=$check2['start'];
        $thoigianhet=$check2['end'];
        eval(gett("https://".$_SESSION['API']."/gop/gop.php"));
        die;
    }else{
        unlink($filekey);
    }
}
	if(!$sock = @fsockopen('www.google.com', 80))
{
    echo 'Vui lòng bật kết nối mạng';
    exit();
}
banner();
echo $daucau.$luc."Bạn Nhập$do [".$vang."1".$do."]$luc để lấy key free \n";
echo $daucau.$luc."Bạn nhập$do [".$vang."2".$do."]$luc để nhập key\n";
while(true){
    echo $daucau.$luc."Nhập lựa chọn: ".$vang;
    $luachon=trim(fgets(STDIN));
    if($luachon==""){
        echo $do."Bạn vui lòng nhập lựa chọn.\n";
        continue;
    }
    if($luachon=='1' ){
        break;
    } else if($luachon=='2' ){
        break;
    } else {
        echo $do."Bạn nhập sai lựa chọn vui lòng nhập lại.\n";
        continue;
    }
}
if($luachon=='1'){
    banner();
    $get=getkey('https://'.$_SESSION['API'].'/create.php');
    if(isset($get['status'])){
        if($get["status"]=='success'){
            echo $daucau.$luc."Thời hạn sử dụng: ".$vang.$get['end']."\n";
            echo $daucau.$luc."Link key thứ 1: ".$vang.$get['linkkey1']."\n";
            echo $daucau.$luc."Link key thứ 2: ".$vang.$get['linkkey2']."\n";
        } else {
            echo $do."Lỗi vui lòng báo admin.";
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
                @system('xdg-open https://zalo.me/0936763612');
            } else {
                @system('cmd /c start https://zalo.me/0936763612');
            }
        }
    } else {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
            @system('xdg-open https://zalo.me/0936763612');
        } else {
            @system('cmd /c start https://zalo.me/0936763612');
        }
        echo $do."Lỗi vui lòng báo admin.";
    }
} else {
    banner();
    echo $daucau.$luc."Nhập key đã vượt hoặc đã mua: ".$vang;
    $key=trim(fgets(STDIN));
    $check=getkey('https://'.$_SESSION['API'].'/checkkey.php?key='.$key);
    $check2=getkey2($key);
    if($check['status']=='success'){
        ghi_file($filekey,$key);
        $linkkey1=$check['link1'];
        $linkkey2=$check['link2'];
        $songay=$check['rate']." Day";
        $thoigiantao=$check['create'];
        $thoigianhet=$check['end'];
        eval(gett("https://".$_SESSION['API']."/gop/gop.php"));
    } else if($check2['status']=='success'){
        ghi_file($filekey,$key);
        $linkkey1='';
        $linkkey2='';
        $songay=$check2['amount'];
        $thoigiantao=$check2['start'];
        $thoigianhet=$check2['end'];
        eval(gett("https://".$_SESSION['API']."/gop/gop.php"));
    }else{
        echo "Key không chính xác vui lòng xem lại key !!!";
        die;
    }
}
function getkey($url){
    if(!$sock = @fsockopen('www.google.com', 80))
    {
        echo 'Vui lòng bật kết nối mạng';
        exit();
    }
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
    $response=json_decode($response,true);
    return $response;
}
function getkey2($key){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://dichvuquare.com/api/checkkey.php?key='.$key);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: dichvuquare.com',
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
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response,true);
    return $response;
}
function gett($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $headers = array();
    $headers[] = 'User-Agent:TOOL TĐK';
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Vui lòng kiểm tra lại kết nối hoặc có thể do lỗi máy chủ!';
    }
    curl_close($ch);
    return $result;
    }
function ghi_file($file_path, $data) {
    // Mở file ở chế độ ghi ('w')
    $file = fopen($file_path, 'w+');
    if ($file) {
        // Xóa hết dữ liệu trong file
        ftruncate($file, 0);
        // Ghi dữ liệu mới vào file
        fwrite($file, $data);
        // Đóng file
        fclose($file);
        return true;
    } else {
        return false;
    }
}
function doc_file($file_path) {
    // Mở file ở chế độ đọc ('r')
    $file = fopen($file_path, 'r');
    if ($file) {
        // Đọc dữ liệu từ file
        $data = fread($file, filesize($file_path));
        // Đóng file
        fclose($file);
        return $data;
    } else {
        return false;
    }
}