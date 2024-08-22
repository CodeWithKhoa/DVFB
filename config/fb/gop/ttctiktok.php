<?php
header('Content-Type: text/html; charset=utf-8');
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if($userAgent!='TOOL TĐK'){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
    die;
}
?>
#TOOL TĐK
date_default_timezone_set('Asia/Ho_Chi_Minh');
/***[ Color ]***/
$xnhac = "\033[1;96m";
$do = "\033[1;91m";
$luc = "\033[1;92m";
$vang = "\033[1;93m";
$xduong = "\033[1;94m";
$hong = "\033[1;95m";
$trang = "\033[1;97m";
/***[ USERAGENT ]***/
$_SESSION['useragent'] = 'Mozilla/5.0 (Linux; Android 10; CPH1819) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36';
/***[ Delay ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
	$_SESSION['load'] = 2000;
	$_SESSION['delay'] = 150000;
} else {
	$_SESSION['load'] = 0;
	$_SESSION['delay'] = 50000;
}
/***[ Đánh Dấu Bản Quyền ]***/
$thuong = $do."[" . $trang . "=.=" . $do . "] ".$trang."=> \033[1;32m";
$thanhngang = $do. "────────────────────────────────────────────────────────────\n";
if (!$sock = @fsockopen('www.google.com', 80)) {
	echo 'Vui lòng bật kết nối mạng';
	exit;
}

/***[ Clear + Thông Số Admin ]***/
if (file_exists('luutim.txt')) {
	fopen("luutim.txt", "a+");
}
if (file_exists('luusub.txt')) {
	fopen("luusub.txt", "a+");
}
@system("clear");
$daucau= $do."[" . $trang . "●" . $do . "] ".$trang."=> ";
$daucau1= $do."[" . $trang . "●" . $do . "] ";
/***[ Clear + Thông Số Admin ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') { 
    @system('clear'); 
} else { 
    @system('cls'); 
}
banner();
while (true) {
	if (file_exists("ttctiktok.txt")) {
		$_SESSION['token'] = fread(fopen("ttctiktok.txt", "r"), filesize("ttctiktok.txt"));
		$login = logintoken();
		if ($login == true) {
			echo $thuong . $luc . "Nhập " . $vang . "[" . $trang . "1" . $vang . "] " . $luc . "Đăng nhập tài khoản ".$trang."[".$vang.$_SESSION['user'].$trang."]\n";
			echo $thuong . $luc . "Nhập " . $vang . "[" . $trang . "2" . $vang . "] " . $luc . "Để Thay Token TTC\n";
			echo  $thuong . "Nhập số: " . $vang;
			$chon_tk = trim(fgets(STDIN));
			if ($chon_tk == "2") {
				if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
					@system("rm ttctiktok.txt");
				} else {
					@system("del ttctiktok.txt");
				}
			} else if ($chon_tk == "1") {
			} else {
				echo $do . " Nhập Sai Vui Lòng Nhập Lại !!!\n";
				continue;
			}
		} else {
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
				@system("rm ttctiktok.txt");
			} else {
				@system("del ttctiktok.txt");
			}
		}
	}
	if (!file_exists("ttctiktok.txt")) {

		echo  $thuong . "Nhập Token TTC: " . $vang;
		$tokenacc = trim(fgets(STDIN));
		$file = fopen("ttctiktok.txt", "w+");
		fwrite($file, '' . $tokenacc);
		fclose($file);
	}
	$_SESSION['token'] = fread(fopen("ttctiktok.txt", "r"), filesize("ttctiktok.txt"));
	$login = logintoken();
	if ($login == true) {
		echo $xnhac . "Đăng Nhập Thành Công.       \n";
		break;
	} else {
		echo $do . " Access_Token TTC Sai \n";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
			@system("rm ttctiktok.txt");
		} else {
			@system("del ttctiktok.txt");
		}
		echo $thanhngang;
	}
}
$xu = coin();
@system("clear");
/***[ Clear + Thông Số Admin ]***/
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') { 
    @system('clear'); 
} else { 
    @system('cls'); 
}
banner();
$xu = coin();
echo $thuong . $luc . "Tên Tài Khoản: " . $vang . $_SESSION['user'] . "\n";
echo $thuong . $luc . "Xu hiện tại: " . $vang . $xu . "\n";
echo $thanhngang;
$dem = 0;
while (true) {
	echo $thuong . $luc . "Nhập " . $do . "[" . $vang . "1" . $do . "]" . $luc . " Nhiệm Vụ Tim \n";
	echo $thuong . $luc . "Nhập " . $do . "[" . $vang . "2" . $do . "]" . $luc . " Nhiệm Vụ Follow\n";
	echo $thuong . $luc . "Nhập " . $do . "[" . $vang . "3" . $do . "]" . $luc . " Làm Lại Tim \n";
	echo $thuong . $luc . "Nhập " . $do . "[" . $vang . "4" . $do . "]" . $luc . " Làm Lại Follow \n";
	echo $thuong . $luc . "Nhập Số Để Chạy Nhiệm Vụ: $vang";
	$nhiemvu = trim(fgets(STDIN));
	echo $thuong . $luc . "Nhập Thời Gian Delay: $vang";
	$delay = trim(fgets(STDIN));
	echo $thanhngang;
	while (true) {
		if ($nhiemvu == 1) {
			$listtim = get_tiktok("");
			if (count($listtim) == 0) {
				echo $do . " Đã Hết Nhiệm Vụ Tim             \r";
				sleep(2);
				break;
			}
			for ($lap = 0; $lap < count($listtim); $lap++) {
				$id = $listtim[$lap]["idpost"];
				$link = $listtim[$lap]["link"];

				$_user_id = explode('https://www.tiktok.com/@', $id)[1];
				if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
					@system('xdg-open ' . $link);
				} else {
					@system('cmd /c start ' . $link);
				}
				$xu = coin();
				$dem++;

				$kl = "\r\033[1;31m|\033[1;37m" . $dem . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93mTYM\033[1;91m| \033[1;97m" . $link . "\033[1;91m |\n";



				for ($i = 0; $i < strlen($kl); $i++) {
					echo $kl[$i];
					usleep(1500);
				}
				delay($delay);
				$list = $list . $id . ",";
				if ($dem % 10 == 0) {
					$list = substr($list, 0, (strlen($list) - 1));
					$nhantien = nhantien($list, "");
					if ($nhantien["mess"]) {
						$xujob = $nhantien["sodu"];
						$xu = $xu + $xujob;

						echo $thanhngang;
						echo $daucau1."Thành công\e[1;33m⌡\033[1;33m +".$xujob." xu\033[1;37m | \033[92mTổng xu:\033[1;33m $xu\n";
						echo $thanhngang;

					} else {
						echo $do . $nhantien["error"] . "          \n";
						fwrite(fopen("luutim.txt", "a+"), $list . ",");
						sleep(1);
					}
					$list = '';
				}
			}
		} else if ($nhiemvu == 2) {
			$listsub = get_tiktok("/subcheo");
			if (count($listsub) == 0) {
				echo $do . " Đã Hết Nhiệm Vụ Follow          \r";
				sleep(2);
				break;
			}
			for ($lap = 0; $lap < count($listsub); $lap++) {
				$id = $listsub[$lap]["idpost"];
				$link = $listsub[$lap]["link"];
				if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
					@system('xdg-open https://www.tiktok.com/@' . $link);
				} else {
					@system('cmd /c start https://www.tiktok.com/@' . $link);
				}
				$xu = coin();
				$dem++;
				
				$kl = "\r\033[1;31m|\033[1;37m" . $dem . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93mFOLLOW\033[1;91m| \033[1;97m" . $link . "\033[1;91m |\n";
				
				for ($i = 0; $i < strlen($kl); $i++) {
					echo $kl[$i];
					usleep(1500);
				}
				delay($delay);
				$list = $list . $id . ",";
				if ($dem % 10 == 0) {
					$list = substr($list, 0, (strlen($list) - 1));
					$nhantien = nhantien($list, "/subcheo");
					if ($nhantien["mess"]) {
						$xujob = $nhantien["sodu"];
						$xu = $xu + $xujob;

						echo $thanhngang;
						echo $daucau1."Thành công\e[1;33m⌡\033[1;33m +".$xujob." xu\033[1;37m | \033[92mTổng xu:\033[1;33m $xu\n";
						echo $thanhngang;

					} else {
						sleep(1);
						fwrite(fopen("luusub.txt", "a+"), $list . ",");
						echo $do . $nhantien["error"] . "          \n";
					}
					$list = '';
				}
			}
		} else if ($nhiemvu == 3) {
			$dem = 0;
			$list = explode(',', file_get_contents("luutim.txt"));
			for ($lap = 0; $lap < (count($list) - 1); $lap++) {
				$id = $list[$lap];
				echo $thanh_xau . $luc . $id . "     \r";
				usleep(10000);
				$nhantien = nhantien($id, "");
				if ($nhantien["mess"]) {
					$stt += 1;
				}
			}
			$xu = coin();

			echo $thanhngang;
			echo $daucau1."Thành công\e[1;33m⌡\033[1;33m +".($stt * 500)." xu\033[1;37m | \033[92mTổng xu:\033[1;33m $xu\n";
			echo $thanhngang;


			if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
				system("rm luutim.txt");
			} else {
				system("del luutim.txt");
			}
			die;
		} else if ($nhiemvu == 4) {
			$dem = 0;
			$list = explode(',', file_get_contents("luusub.txt"));
			for ($lap = 0; $lap < (count($list) - 1); $lap++) {
				$id = $list[$lap];
				echo $thanh_xau . $luc . $id . "     \r";
				usleep(10000);
				$nhantien = nhantien($id, "/subcheo");
				if ($nhantien["mess"]) {
					$stt += 1;
				}
			}
			$xu = coin();

			echo $thanhngang;
			echo $daucau1."Thành công\e[1;33m⌡\033[1;33m +".($stt * 1000)." xu\033[1;37m | \033[92mTổng xu:\033[1;33m $xu\n";
			echo $thanhngang;


			if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
				system("rm luusub.txt");
			} else {
				system("del luusub.txt");
			}
			die;
		} else {
			echo $do . " Vui Lòng Chọn 1 Nhiệm Vụ (1 hoặc 2 hoặc 3 hoặc 4).     \n";
			echo $thanhngang;
			break;
		}
	}
}
/***#####################[ FUNCTION ]#################### ***/
function logintoken()
{
	$data = 'access_token=' . $_SESSION['token'];
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
	if ($login->status == 'success') {
		$xu = $login->data->sodu;
		$_SESSION['user'] = $login->data->user;
		$js = fopen($_SESSION['user'] . ".txt", "w+");
		file_put_contents($_SESSION['user'] . ".txt", file_get_contents("TTC.txt"));
		return $xu;
	} else {
		return false;
	}
}
function cauhinh($idtik)
{
	$data = "iddat[]=" . $idtik . "&loai=tt";
	$head = array(
		"Host: tuongtaccheo.com",
		"content-length: " . strlen($data),
		"accept: */*",
		"origin: https://tuongtaccheo.com",
		"x-requested-with: XMLHttpRequest",
		"user-agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.152 Mobile Safari/537.36",
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
		CURLOPT_COOKIEFILE => $_SESSION['user'] . ".txt",
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_ENCODING => TRUE
	));
	$access = curl_exec($ch);
	if (strpos($access, 'Chưa đăng nhập !!!') !== false) {
		$login = logintoken();
		if ($login == true) {
			echo " COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \n";
		} else {
			echo " COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n";
			die;
		}
	} else {
		return $access;
	}
}
function get_tiktok($type)
{
	$url  = "https://tuongtaccheo.com/tiktok/kiemtien" . $type . "/getpost.php";
	$head = array(
		"Host: tuongtaccheo.com",
		"accept: application/json, text/javascript, *" . "/" . "*; q=0.01",
		"x-requested-with: XMLHttpRequest",
		"user-agent: Mozilla/5.0 (Linux; Android 10; Mi 9T Pro) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/12.1 Chrome/79.0.3945.136 Mobile Safari/537.36",
		"referer: https://tuongtaccheo.com/tiktok/kiemtien/"
	);
	$ch   = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_HTTPGET => true,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_COOKIEFILE => $_SESSION['user'] . ".txt",
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_ENCODING => TRUE
	));
	$data = json_decode(curl_exec($ch), true);
	return $data;
}
function nhantien($id, $type)
{
	while (true) {
		$url  = "https://tuongtaccheo.com/tiktok/kiemtien" . $type . "/nhantien.php";
		$data = "id=" . $id;
		$head = array(
			"Host: tuongtaccheo.com",
			"content-length: " . strlen($data),
			"x-requested-with: XMLHttpRequest",
			"user-agent: Mozilla/5.0 (Linux; Android 10; Mi 9T Pro) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/12.1 Chrome/79.0.3945.136 Mobile Safari/537.36",
			"content-type: application/x-www-form-urlencoded; charset=UTF-8",
			"origin: https://tuongtaccheo.com",
			"referer: https://tuongtaccheo.com/tiktok/kiemtien/"
		);
		$ch   = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_FOLLOWLOCATION => TRUE,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => $data,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_COOKIEFILE => $_SESSION['user'] . ".txt",
			CURLOPT_HTTPHEADER => $head,
			CURLOPT_ENCODING => TRUE
		));
		$data = curl_exec($ch);
		if ($data == '0') {
			$login = logintoken();
			if ($login == true) {
				echo "\033[1;92m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \n";
				continue;
			} else {
				echo "\033[1;91m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n";
				die;
			}
		} else {
			return json_decode($data, true);
		}
	}
}
function coin()
{
	while (true) {
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => 'https://tuongtaccheo.com/home.php',
			CURLOPT_PORT => "443",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_SSL_VERIFYPEER => true,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_COOKIEFILE => $_SESSION['user'] . ".txt",
		));
		$access = curl_exec($ch);
		curl_close($ch);
		$xu = explode('"soduchinh">', explode('</strong>', $access)[0])[1];
		if (strpos($access, "Chào mừng") == false) {
			$login = logintoken();
			if ($login == true) {
				echo "\033[1;92m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THÀNH CÔNG \n";
				continue;
			} else {
				echo "\033[1;91m COOKIE TUONGTACCHEO DIE, ĐĂNG NHẬP LẠI THẤT BẠI \n";
				die;
			}
		} else if ($xu !== '') {
			return $xu;
		} else {
			echo "\033[1;91m Lỗi Không Xác Định                  \r";
		}
	}
}

$daucau= $do."[" . $trang . "●" . $do . "] ".$trang."=> ";
$thanhngang= $do."------------------------------------------------------------\n";
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