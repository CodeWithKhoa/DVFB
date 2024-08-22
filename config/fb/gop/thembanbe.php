<?php
header('Content-Type: text/html; charset=utf-8');
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if($userAgent!='TOOL TĐK'){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
    die;
}
?>
#TOOL TĐK
/***[ Color ]***/
$xnhac = "\033[1;36m";
$do = "\033[1;31m";
$luc = "\033[1;32m";
$vang = "\033[1;33m";
$xduong = "\033[1;34m";
$hong = "\033[1;35m";
$trang = "\033[1;37m";
$no="\033[0m";
$den="\033[1;30m";
$do="\033[1;31m";
$xanhl="\033[1;32m";
$vang="\033[1;33m";
$tim="\033[1;34m";
$hong="\033[1;35m";
$xanht="\033[1;36m";
$trang="\033[1;37m";
/***[ Delay ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
    $_SESSION['load'] = 1200;
    $_SESSION['delay'] = 2000;
} else {
    $_SESSION['load'] = 0;
    $_SESSION['delay'] = 1000;
}
$daucau= $do."[" . $trang . "●" . $do . "] ".$trang."=> ";
$thanhngang= $do."------------------------------------------------------------\n";
$thanh_thang_mau_trang = "\033[1;37m- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \n";
banner();
echo $daucau.$xanhl."Nhập Cookie Facebook$trang: ".$vang;
$cookie = trim(fgets(STDIN));
echo $thanhngang;
echo $daucau.$xanhl."Vui Lòng Nhập Delay$trang: ".$hong;
$delay = trim(fgets(STDIN));
if($delay < 1) {
echo $do."Tối Thiểu 1 Giây\n";
die();
}
echo $daucau.$xanhl."Kết Bạn Bao Lần Thì Dừng Tool$trang: $vang";
    $stop = trim(fgets(STDIN));
$checkck=json_decode(dvfb('thongtin',null,null,$cookie),true);
if ($checkck['status'] == 'error') {
    echo $do."\rCookie Die!!! Hoặc Không Chính Xác\n";
die();
}
$tenfb = $checkck['message']['name'];
$idfb = $checkck['message']['id'];
#
echo $thanhngang;
echo $vang."ID FB: ".$xanhl.$idfb.$do." | ".$vang."Tên FB: ".$xanhl.$tenfb."".$res."\n";
echo $thanhngang;
while(true) {
$json = json_decode(dvfb('nuoifbadd',null,null,$cookie), true);
if($json['status']=='error') {
    if($json['message']=='Cookie die'){
        echo "Cookie die.\n";
        break;
    }else if($json['message']=='Đã hết bạn bè gợi ý.'){
        echo $do."\r Hết Bạn Bè Gợi Ý Rồi, Đang Tìm\r";
    } else {
        echo "\r ".$json['message']." \r";
    }
} else {
  $dem++;
echo "\033[1;31m[\033[1;33m".$dem."\033[1;31m]\033[1;91m | \033[1;36m".date("H:i:s")."\033[1;31m | \033[1;33mĐã Add Thành Công\033[1;31m | \033[1;37m".$json['id']."\n";
if ($dem >= $stop ){ echo $luc." Đã Gửi Thành Công $stop Lời Mời Kết Bạn \n"; exit; }
delay($delay);
}
}

function thongtin($id, $cookie, $useragent)
{

    $ch = curl_init();
    $header = array(
        "Host:m.facebook.com",
        "user-agent:$useragent",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "cookie:$cookie",
    );
    $linkbv = 'https://m.facebook.com/' . $id . '/about';
    curl_setopt($ch, CURLOPT_URL, $linkbv);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
    :'));
    $page = curl_exec($ch);
    $page1 = json_decode($page);

    return $page;
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
