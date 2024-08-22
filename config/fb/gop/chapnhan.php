<?php
header('Content-Type: text/html; charset=utf-8');
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if($userAgent!='TOOL TĐK'){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
    die;
}
?>
#TOOL TĐK
date_default_timezone_set("Asia/Ho_Chi_Minh");
//color
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
$vang="\033[1;93m";
$xduong="\033[1;94m";
$hong="\033[1;95m";
$trang="\033[1;97m";
$ngay = date("d-m-Y"); 
$thanhngang = $trang."----------------------------------------------------------\n";
date_default_timezone_set("Asia/Ho_Chi_Minh");
$useragent="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36";
$wait = $green."Đợi";
@system('clear');
system('clear');
  banner();
 echo $daucau.$do."Chú ý: Tool chỉ dành cho clone có lượt add\n"; 
echo $daucau.$luc."Nhập Cookie Cần Chạy: $trang";
$khocookie = (string)trim(fgets(STDIN));

system('clear');
banner();
echo $vang."$luc  Đang Chạy Tool Chấp Nhận KB\n";
echo $thanhngang;
echo $daucau.$luc." Nhập Delay (trên 10s):$vang ";
$a = trim(fgets(STDIN));
echo $daucau.$luc." Chấp Nhận Bao Nhiêu Chống Block: $vang";
$dungblock = trim(fgets(STDIN));
echo $daucau.$luc." Nhập Thời Gian Nghỉ Chống Block: $vang";
$delaybl = trim(fgets(STDIN));
echo $daucau.$luc." Chấp Nhận Bao Nhiêu KB Thì Dừng Tool: $vang";
$dungtool = trim(fgets(STDIN));

echo $thanhngang;
while (true) {
$header = array( "Host: mbasic.facebook.com", "upgrade-insecure-requests: 1", "save-data: on", "user-agent:Mozilla/5.0 (Linux; Android 8.1.0; CPH1803) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.152 Mobile Safari/537.36", "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*" . "/" . "*;q=0.8,application/signed-exchange;v=b3;q=0.9", "sec-fetch-site:same-origin", "sec-fetch-mode:navigate", "sec-fetch-user:?1", "sec-fetch-dest:document", "accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5", "cookie: $khocookie", );
$url = "https://mbasic.facebook.com/";
$mr = curl_init();
curl_setopt_array($mr, array( CURLOPT_PORT => "443",
CURLOPT_URL => "$url",
CURLOPT_ENCODING => "",
CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_TIMEOUT => 30,
CURLOPT_CUSTOMREQUEST => "GET", CURLOPT_HTTPHEADER => $header ));
$mr2 = curl_exec($mr);
curl_close($mr);
$json = json_decode($mr2, true);
$c = explode('/a/notifications.php?', $mr2)[1];
$c = explode('"', $c)[0]; $id = explode('/a/notifications.php?confirm=', $mr2)[1];
$id = explode('&', $id)[0];
if ($id == "") {
echo $do . "• Đã Hết Lời Mời\n";
   echo $daucau.$luc."Nhập Cookie Cần Chạy: $trang";
$khocookie = (string)trim(fgets(STDIN));}
sleep(3);
$url = 'https://mbasic.facebook.com/a/notifications.php?' . htmlspecialchars_decode($c) . '';
$mr = curl_init();
curl_setopt_array($mr, array( CURLOPT_PORT => "443", CURLOPT_URL => "$url", CURLOPT_ENCODING => "", CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_TIMEOUT => 30,
CURLOPT_CUSTOMREQUEST => "GET", CURLOPT_HTTPHEADER => $header ));
$mr2 = curl_exec($mr); curl_close($mr);
$json = json_decode($mr2, true);
$t = random_int(31,37);
    $mau = "\e[1;$t"."m";
    $stt=$stt+1;

$tt = "\r\033[1;31m|\033[1;37m" . $stt . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m Đã Thêm Thành Công \033[1;91m| \033[1;97m" . $id . "\033[1;91m |\n";
echo $tt;
delay($a);

           if ( $stt >= $dungtool ){
    echo $thanhngang; echo $daucau.$luc."Đã Chấp Nhận \033[1;93m".$stt."\033[1;92m Bạn Bè\n";
    echo $daucau.$luc."Cảm Ơn Bạn Đã Sử Dụng Tool$vang Chấp Nhận Lời Mời Kết Bạn$luc Của Trần Đăng Khoa\n";
    exit;}
                      
                     if($stt % $dungblock == 0 ){
                      delay2($delaybl);
                    }
 } 
           
           function delay2($delaybl){
  $green="\e[1;32m";
  $yellow="\e[1;33m";
  for($j = $delaybl;$j> 0;$j--){
    echo "\r";
    echo "                                                      \r";
    echo $green."Đang Chờ Delay Tránh Block$yellow $j Giây";
             sleep(1);
      
           }
  echo "\r";
  echo "                                                      \r";
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
        usleep(14000);
        echo "\r\e[1;95m    Trần Đăng Khoa                                  \r";
    }
}