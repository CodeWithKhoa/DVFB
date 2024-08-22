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
$cyan= "\e[1;36m";
$thanhngang = $vang."-------------------------------------------------------------\n";
/***[ Time ]***/
$today= date('d-m-y');
$a = date("d"); 
$b = date("m"); 
$c = date("Y");
$ngay = date("d"); 
$thang = date("m"); 
$nam = date("Y");
$day= date('d-m-y');
$d = date("d-m");
$weekday = date("l");
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

system("clear");
banner();
$list_cookiefb = [];
$list_idpageme = [];
$list_token_con = [];
$list_tenfb = [];
$list_idfb = [];
$iii = 0;
$iii = 0;
$_iid = 0;
while (true) {
    $iii++;
    echo $daucau.$luc."Nhập Cookie Thứ ".$iii.": $vang";
    $cookiefb = trim(fgets(STDIN));
    if (strlen($cookiefb) < 5) {
        break;
    }
echo $thanhngang;
$thongtin=json_decode(dvfb('thongtin',null,null,$cookiefb),true);
if($thongtin['status']=='error'){
    echo $thongtin['message'];
    break;
}
$idfb=$thongtin['message']['id'];
$tenfb=$thongtin['message']['id'];
echo $daucau.$do."Nếu có 2FA thì bạn vào link dưới nhập mã 2FA rồi chạy tiếp\n";
echo $daucau.$luc."Lấy ID PAGE MẸ Ở:$trang https://business.facebook.com/business_locations?page_id=\n";
    while(true){
        $_iid++;
        echo $daucau.$luc."Nhập ID PAGE Mẹ Thứ ".$_iid.": $vang";
        $idpageme = trim(fgets(STDIN));
        if (strlen($idpageme) < 3) {
            break;
        }
        $get=gettokenpage($idpageme,$cookiefb);
        if($get=='Id Page Sai !!!'){
            echo $do.'Id Page Sai !!!';
            continue;
        }
        $token_con=$get;
        if ($idpageme != "" and $token_con != "") {
            array_push($list_cookiefb, $cookiefb);
            array_push($list_idpageme, $idpageme);
            array_push($list_token_con, $token_con);
            array_push($list_tenfb, $tenfb);
            array_push($list_idfb, $idfb);
        } else {
		die;
            //$iii--;
        }
    }
    $_iid = 0;
    echo $thanhngang;
}
$SEC = "500";
system("clear");
banner();
echo $daucau.$luc."Số ID PAGE Mẹ Đã Nhập: ".$trang.count($list_idpageme) . "\n";
echo $daucau.$luc."Nhập Tên Page Muốn REG: ".$vang;
$name_page = readline();
echo $daucau.$luc."Nhập delay (".$trang."Lớn hơn 150".$luc."): ".$vang;
$delay = trim(fgets(STDIN));
echo $daucau.$luc. "Nhập Số Lượng :\033[1;93m ";
$dungtool = trim(fgets(STDIN));
echo $thanhngang;
$dem = 1;
$sl = 0;
while (true) {
    for ($_i = 0; $_i < count($list_idpageme); $_i++) {
        while (true) {
            if ($sock = @fsockopen('www.google.com', 80)) {
                $idpageme = $list_idpageme[$_i];
                $cookiefb = $list_cookiefb[$_i];
                $token_con = $list_token_con[$_i];
                $ten_fb = $list_tenfb[$_i];
                $id_fb = $list_idfb[$_i];
                $don = reg_page_c($idpageme, $name_page . "_", $cookiefb, $token_con);
                if (strpos($don, 'error') == false) {
                    $id = json_decode($don, true)["id"];
					
					
                    if ($id != "") {
                        $dem_die_id = 0;
                        $t = date('H:i:s');
                        echo $thanh_dep.$luc."Tiến Hành Chuyển Page Con Thành Page Chính\r"; sleep(2);
                        $get = chuyenpage($cookiefb,$idpageme,$token_con,$id);
                        if (strpos($get, "success") == true) {
                            echo "\r\033[1;31m|\033[1;37m" . $dem++ . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m REG THÀNH CÔNG \033[1;91m| \033[1;97m" . $name_page . "\033[1;91m |\033[1;92m ".$id." \033[1;91m|\n";
                        } else {
                        	echo $thanh_dep.$do."Chuyển Không Thành Công, Tài Khoản Bị Lock tính năng chuyển page vị trí                            \n";
							die();
                        }
        $sl++;
		if ($sl < $dungtool){
                        delay($delay);
                        unset($don);
                        break;
					} else {
                echo "\n".$daucau."\033[1;32mĐã Hoàn Tất                                                          \r\n";
				die();
					}
                    } else {
                        $dem_die_id++;
                    }
                    if ($dem_die_id > 10) {
                        echo $daucau."\033[1;91mCookie " . $vang . $ten_fb . $do . " ID: " . $trang . $id_fb . $do . " die.... \n";
                        break;
                    }
                
				
				
				} else {
                    echo $daucau."\033[1;97mTài khoản Facebook tạm Block. Vui lòng thử lại sau.                      \r";
					die;
                }
            }
        }
    }
}

function req($url, $cookie)
{
    $ch   = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER =>
            array(
                "Cookie:" . $cookie,
            ),
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_ENCODING => TRUE,
        )
    );
    $ch = curl_exec($ch);
    return $ch;
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

function gettokenpage($idpage, $cookie) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://business.facebook.com/business_locations/?page_id=' . $idpage);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'authority: business.facebook.com',
      'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
      'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
      'cache-control: max-age=0',
      'sec-ch-prefers-color-scheme: light',
      'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
      'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
      'sec-ch-ua-mobile: ?0',
      'sec-ch-ua-platform: "Windows"',
      'sec-ch-ua-platform-version: "15.0.0"',
      'sec-fetch-dest: document',
      'sec-fetch-mode: navigate',
      'sec-fetch-site: same-origin',
      'sec-fetch-user: ?1',
      'upgrade-insecure-requests: 1',
      'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
      'viewport-width: 987',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    if (strpos($response, "EAAG") !== false) {
      $token_me = "EAAG" . explode('"', explode('EAAG', $response)[1])[0];
      $ch = curl_init();
      $url = 'https://graph.facebook.com/v3.1/' . $idpage . '?fields=access_token&access_token=' . $token_me;
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: graph.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
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
      curl_setopt($ch, CURLOPT_COOKIE, $cookie);
      $response = curl_exec($ch);
      curl_close($ch);
      $json = json_decode($response, true);
      $token = $json['access_token'];
      $id = $json['id'];
      return $token;
    } else {
      return "Id Page Sai !!!";
    }
  }
function reg_page_c($idpageme, $name_page, $cookiefb, $token_con){   
    $number   = rand(0, 9999999999);
    $name_page = $name_page . $number;
    $data = [
        '_reqName' => 'object:page/locations',
        '_reqSrc' => 'LocationManagerUtils',
        'always_open' => 'false',
        'differently_open_offerings' => '{}',
        'id' => $idpageme,
        'ignore_warnings' => 'true',
        'is_franchise' => 'false',
        'locale' => 'us_US',
        'location' => '{"city_id":2590794,"latitude":"20.' . rand(0, 99999) . '","longitude":"106.' . rand(0, 99999) . '","street":"' . $name_page . '","zip":"170000"}',
        'method' => 'post',
        'permanently_closed' => 'false',
        'phone' => '+19519433020',
        'pickup_options' => '[]',
        'place_topics' => '["530553733821238"]',
        'pretty' => '0',
        'store_name' => $name_page,
        'store_number' => rand(0, 1789273828),
        'suppress_http_code' => '1',
    ];
    $data = http_build_query($data);
    $ch   = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://graph.facebook.com/v11.0/' . $idpageme . '/locations?access_token=' . $token_con,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER =>
            array(
                "content-type:application/x-www-form-urlencoded",
                "Cookie:" . $cookiefb,
            ),
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_ENCODING => TRUE,
        )
    );
    $ch = curl_exec($ch);
    return $ch;
}
function chuyenpage($cookiefb,$idpageme,$token_con,$id){
    $url = "https://graph.facebook.com/v12.0/" . $idpageme . "/locations?access_token=" . $token_con;
    $data = [
    '_reqName' => 'object:page/locations',
    '_reqSrc' => 'LocationManagerUtils',
    'locale' => 'vi_VN',
     'location_page_id' => $id,
    'method' => 'delete',
    'pretty' => '0',
    'suppress_http_code' => '1',
    'xref' => 'f35efb2e2143c24',
    ];
    $data = http_build_query($data);
    $head = array(
    "user-agent:" . $_SESSION["useragent"],
    "content-type:application/x-www-form-urlencoded",
    "Cookie:" . $cookiefb,
    );
    $mr = curl_init();
    curl_setopt_array( $mr, array(
    CURLOPT_PORT => "443",
    CURLOPT_URL => $url,
    CURLOPT_ENCODING => "",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => $head,
    ));
    $mr2 = curl_exec($mr); curl_close($mr);
    return $mr2;
    }