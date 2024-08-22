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
#TOOL TDK
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
$_SESSION["C_LIKE"]   = " LIKE ";
$_SESSION["C_LIKE2"]  = "LIKE 2";
$_SESSION["C_CMT"]    = " CMT ";
$_SESSION["C_FOLLOW"] = "FOLLOW";
$_SESSION["C_SHARE"]  = "SHARE ";
$_SESSION["C_PAGE"]   = " PAGE ";
$_SESSION["C_CXCMT"]  = "CX CMT";
$_SESSION["C_LOVE"]   = " LOVE ";
$_SESSION["C_CARE"]   = " CARE ";
$_SESSION["C_HAHA"]   = " HAHA ";
$_SESSION["C_WOW"]    = " WOW  ";
$_SESSION["C_SAD"]    = " SAD  ";
$_SESSION["C_ANGRY"]  = "ANGRY ";
$_SESSION["C_GROUP"]  = "GROUP ";

$_SESSION['useragent'] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36';
$thanhngang2=$luc."══════════════════════════════════════════════════════════════\n";
$thanhngang3="$vang==========================================================\n";
$thanhngang= $do."------------------------------------------------------------\n";
$thanhngang1=$luc."------------------------------------------------------------\n";

$useragent = "Mozilla/5.0 (Linux; Android 10; SM-A125F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36";
@system('clear');
$daucau2= $do."[" . $trang . "●" . $do . "] ".$trang."=> ";
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') { 
    @system('clear'); 
} else { 
    @system('cls'); 
}
banner();
$listnv = [];

while (true){
if (file_exists("TDS.txt")){
$data = fread(fopen("TDS.txt", "r"), filesize("TDS.txt"));
if ($data == "") { unlink("TDS.txt"); continue; }
$_SESSION['token']= $data;
$login = login();
if ($login == false) { unlink("TDS.txt"); continue; }
echo $thanh_dep.$luc."Nhập ".$vang."[".$trang."1".$vang."] ".$luc."Giữ Lại Tài Khoản ".$vang.$_SESSION["username"]."\n";
echo $thanh_dep.$luc."Nhập ".$vang."[".$trang."2".$vang."] ".$luc."Nhập Tài Khoản TDS Mới \n";
echo $thanh_dep.$luc."Nhập ".$trang."===>: $vang";
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
echo $thanh_dep."\033[1;32mNhập Token TDS: \033[1;33m"; $token = trim(fgets(STDIN));
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
@system('clear');
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') { 
    @system('clear'); 
} else { 
    @system('cls'); 
}
banner();
echo $thanhngang1;
while (true) {
    if (file_exists("Cookiefb.txt")) {
        $data = file_get_contents("Cookiefb.txt");
        if ($data == "") {
            unlink("Cookiefb.txt");
            continue;
        }
        $_SESSION['cookie'] = $data;
        echo $thanh_dep . $luc . "Nhập " . $vang . "[" . $trang . "1" . $vang . "] " . $luc . "Giữ Lại Cookie Cũ\n";
        echo $thanh_dep . $luc . "Nhập " . $vang . "[" . $trang . "2" . $vang . "] " . $luc . "Nhập Cookie Mới \n";
        echo $thanh_dep . $luc . "Nhập " . $trang . "===>: $vang";
        $chon_tk = trim(fgets(STDIN));
        if ($chon_tk == "2") {
            unlink("Cookiefb.txt");
        } else if ($chon_tk == "1") {
            break;
        } else {
            echo $do . "Lựa chọn không xác định !!!\n";
            continue;
        }
    }
    if (!file_exists("Cookiefb.txt")) {
        $khoToken = [];
        $nhapCookie = false; // Biến đánh dấu đã nhập cookie hay chưa
        echo $daucau2 . $luc . "Lưu Ý: \033[1;36mNếu Muốn Dừng Lại Thì Nhấn Enter \n";
        for ($a = 1; $a < 999999; $a++) {
            echo $daucau2 . $luc . "Nhập Cookie Thứ $a: $vang";
            $nhapck = (string)trim(fgets(STDIN));
            if ($nhapck == '') {
                $nhapCookie = true; // Đánh dấu đã nhập cookie
                break;
            }
            $ttck = json_decode(thongtinck($nhapck), true);
            if (isset($ttck['name'])) {
                echo $ttck['name'] . " | " . $ttck['id'] . " \n";
                if (!in_array($nhapck, $khoToken)) {
                    array_push($khoToken, $nhapck);
                }
            } else {
                echo "\033[1;31mCookie Die \n";
            }
        }
        if ($nhapCookie) {
            $js = json_encode($khoToken);
            $file = fopen("Cookiefb.txt", "w+");
            fwrite($file, $js);
            fclose($file);
            break; // Thoát khỏi vòng lặp khi đã nhập cookie
        }
    }
}

$data = file_get_contents("Cookiefb.txt");
$js=$data;
$khoToken=json_decode($data, true);
$demcki = count(json_decode($data, true));

@system('clear');
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') { 
    @system('clear'); 
} else { 
    @system('cls'); 
}
banner();

if (!file_exists('Setting_TDS_Token.txt')) {
    $settings = json_encode([
        'delaygr' => '23',
        'delaylike' => '6',
        'delayfollow' => '20',
        'delaycmt' => '15',
        'delaypage' => '20',
        'delayshare' => '35',
        'delaycx' => '5',
        'delaycxcmt' => '5',
        'nhiemvu' => '120',
        'block' => '200'
    ]);
    file_put_contents('Setting_TDS_Token.txt', $settings);
}

if (file_exists('Setting_TDS_Token.txt')) {
    $json = json_decode(file_get_contents('Setting_TDS_Token.txt'), true);
    $a = "$daucau2\033[1;92mDelay LikePost Hiện Tại Là \033[1;93m" . $json["delaylike"] . "\033[1;92m Giây
$daucau2\033[1;92mDelay Follow Hiện Tại Là \033[1;93m" . $json["delayfollow"] . "\033[1;92m Giây
$daucau2\033[1;92mDelay Comment Hiện Tại Là \033[1;93m" . $json["delaycmt"] . "\033[1;92m Giây
$daucau2\033[1;92mDelay Page Hiện Tại Là \033[1;93m" . $json["delaypage"] . "\033[1;92m Giây
$daucau2\033[1;92mDelay SharePost Hiện Tại Là \033[1;93m" . $json["delayshare"] . "\033[1;92m Giây
$daucau2\033[1;92mDelay Cảm Xúc Hiện Tại Là \033[1;93m" . $json["delaycx"] . "\033[1;92m Giây
$daucau2\033[1;92mDelay Cảm Xúc Cmt Hiện Tại Là \033[1;93m" . $json["delaycxcmt"] . "\033[1;92m Giây
$daucau2\033[1;92mDelay Group Hiện Tại Là \033[1;93m" . $json["delaygr"] . "\033[1;92m Giây
$thanhngang1
$daucau2\033[1;92mKích Hoạt Chống Block Sau \033[1;93m" . $json["nhiemvu"] . "\033[1;92m Nhiệm Vụ
$daucau2\033[1;92mDelay Chống Block Hiện Tại Là \033[1;93m" . $json["block"] . "\033[1;92m Giây
$thanhngang1
$daucau2\033[1;92mNhập \033[1;93m[\033[1;97m1\033[1;93m] \033[1;92mTiếp Tục Sử Dụng Settings_Delay Này!
$daucau2\033[1;92mNhập \033[1;93m[\033[1;97m2\033[1;93m] \033[1;92mSử Dụng Delay Được Đề Xuất Bởi Tool!
$daucau2\033[1;92mNhập \033[1;93m[\033[1;97m3\033[1;93m] \033[1;92mXoá Delay Này Và Tạo Delay Do Bạn Đặt Ra!
$thanhngang1
$daucau2\033[1;92mNhập số: \033[1;33m";
echo $a;
    $_CHOOSE['settingdelay'] = trim(fgets(STDIN));
    echo $thanhngang1;
    if ($_CHOOSE['settingdelay'] == 1) {
        print "$daucau2\033[1;92mĐã Tiếp Tục Sử Dụng Settings_Delay Này!!\n";
        $_SESSION['delaylike'] = $json["delaylike"];
        $_SESSION['delayfollow'] = $json["delayfollow"];
        $_SESSION['delaycmt'] = $json["delaycmt"];
        $_SESSION['delayshare'] = $json["delayshare"];
        $_SESSION['delaypage'] = $json["delaypage"];
        $_SESSION['delaycx'] = $json["delaycx"];
        $_SESSION['delaycxcmt'] = $json["delaycmt"];
        $_SESSION['delaygr'] = $json["delaygr"];
        $_SESSION['nhiemvu'] = $json["nhiemvu"];
        $_SESSION['block'] = $json["block"];
        sleep(2);
        
    }
    else if ($_CHOOSE['settingdelay'] == 2) {
        $_SESSION['delaylike'] = $delaylike = rand(0, 5);
        $_SESSION['delayfollow'] = $delaysub = rand(25, 40);
        $_SESSION['delaycmt'] = $delaycmt = rand(15, 25);
        $_SESSION['delaypage'] = $delaypage = rand(25, 40);
        $_SESSION['delayshare'] = $delayshare = rand(20, 35);
        $_SESSION['delaycx'] = $delaycx = rand(0, 5);
        $_SESSION['delaycxcmt'] = $delaycxcmt = rand(0, 10);
        $_SESSION['delaygr'] = $delaygr = rand(15, 30);
        $_SESSION['nhiemvu'] = $nhiemvu = rand(100, 200);
        $_SESSION['block'] = $block = rand(100, 180);
        print "$daucau2\033[1;92mDelay LikePost Được Đề Xuất  : \033[1;93m" . $delaylike . "\033[1;92m Giây\n";
        usleep(100000);
        print "$daucau2\033[1;92mDelay Follow Được Đề Xuất : \033[1;93m" . $delaysub . "\033[1;92m Giây\n";
        usleep(100000);
        print "$daucau2\033[1;92mDelay Comment Được Đề Xuất : \033[1;93m" . $delaycmt . "\033[1;92m Giây\n";
        usleep(100000);
        print "$daucau2\033[1;92mDelay Page Được Đề Xuất : \033[1;93m" . $delaypage . "\033[1;92m Giây\n";
        usleep(100000);
        print "$daucau2\033[1;92mDelay SharePost Được Đề Xuất : \033[1;93m" . $delayshare . "\033[1;92m Giây\n";
        usleep(100000);
        print "$daucau2\033[1;92mDelay cảm Xúc Được Đề Xuất  : \033[1;93m" . $delaycx . "\033[1;92m Giây\n";
        usleep(100000);
        print "$daucau2\033[1;92mDelay Cảm Xúc Cmt Được Đề Xuất  : \033[1;93m" . $delaycxcmt . "\033[1;92m Giây\n";
        usleep(100000);
        print "$daucau2\033[1;92mDelay Group Được Đề Xuất  : \033[1;93m" . $delaygr . "\033[1;92m Giây\n";
        usleep(100000);
        print "$daucau2\033[1;92mChống Block Sau : \033[1;93m" . $nhiemvu . "\033[1;92m Nhiệm Vụ\n";
        usleep(100000);
        print "$daucau2\033[1;92mDelay Chống Block : \033[1;93m" . $block . "\033[1;92m Giây\n";
        usleep(100000);
        sleep(2);
        //end choose 2
    }
    else if ($_CHOOSE['settingdelay'] == 3) {
        if (file_exists('Setting_TDS_Token.txt')) {
            system('rm Setting_TDS_Token.txt');
        }
        print "$daucau2\033[1;92mDelay Like : \033[1;33m";
        $_SESSION['delaylike'] = trim(fgets(STDIN));
        print "$daucau2\033[1;92mDelay Sub : \033[1;33m";
        $_SESSION['delayfollow'] = trim(fgets(STDIN));
        print "$daucau2\033[1;92mDelay Comment : \033[1;33m";
        $_SESSION['delaycmt'] = trim(fgets(STDIN));
        print "$daucau2\033[1;32mDelay Fanpage : \033[1;33m";
        $_SESSION['delaypage'] = trim(fgets(STDIN));
        print "$daucau2\033[1;32mDelay Cảm Xúc : \033[1;33m";
        $_SESSION['delaycx'] = trim(fgets(STDIN));
        print "$daucau2\033[1;92mDelay Share : \033[1;33m";
        $_SESSION['delayshare'] = trim(fgets(STDIN));
        print "$daucau2\033[1;32mDelay Reaction Comment : \033[1;33m";
        $_SESSION['delaycxcmt'] = trim(fgets(STDIN));
        print "$daucau2\033[1;32mDelay Group : \033[1;33m";
        $_SESSION['delaygr'] = trim(fgets(STDIN));       
        echo $thanh_dep.$luc."Sau Bao Nhiệm Vụ Thì Kích Hoạt Chống Block: $vang";
        $_SESSION['nhiemvu'] = trim(fgets(STDIN));
        
        echo $thanh_dep.$luc."Sau ".$vang . $_SESSION['nhiemvu'] . $luc." Nhiệm Vụ Nghỉ Ngơi: $vang";
       $_SESSION['block'] = trim(fgets(STDIN));
    } else {
        echo $do."Bạn nhập không hợp lệ \n";
        die;
    }
    print "$daucau2\033[1;92mĐã Lưu Setting_Delay Này!!\n";
    echo $thanhngang1;
    $setting_delay = json_encode([
        'delaylike' => $_SESSION['delaylike'],
        'delayfollow' => $_SESSION['delayfollow'],
        'delaycmt' => $_SESSION['delaycmt'],
        'delaypage' => $_SESSION['delaypage'],
        'delayshare' => $_SESSION['delayshare'],
        'delaycx' => $_SESSION['delaycx'],
        'delaycxcmt' => $_SESSION['delaycxcmt'],
        'delaygr' => $_SESSION['delaygr'],
        'nhiemvu' => $_SESSION['nhiemvu'],
        'block' => $_SESSION['block'],
    ]);
    file_put_contents('Setting_TDS_Token.txt', $setting_delay);
    sleep(2.5);
    //end choose 3
}
$token=$_SESSION['token'];
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
curl_close($curl);
$json = json_decode($response, true);
$sodu = $json["data"]["xu"];
$_SESSION["username"]=$json["data"]["user"];
$user = $_SESSION["username"];
$nhiemvu = $_SESSION['nhiemvu'];

@system('clear');
if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') { 
    @system('clear'); 
} else { 
    @system('cls'); 
}
banner();




print "$daucau2\033[1;92mTên Tài Khoản TDS: \033[1;33m$user\n";
print "$daucau2\033[1;92mXu Hiện Tại: \033[1;33m$sodu\033[1;32m Xu\n";
print "$daucau2\033[1;92mSố Cookie Facebook:\033[1;33m $demcki \n";
echo $thanhngang1;

echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "1" . $vang . "]" . $luc . " Nhiệm Vụ Like\n";
echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "2" . $vang . "]" . $luc . " Nhiệm Vụ Like 2\n";
echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "3" . $vang . "]" . $luc . " Nhiệm Vụ Follow\n";
echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "4" . $vang . "]" . $luc . " Nhiệm Vụ Comment \n";
echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "5" . $vang . "]" . $luc . " Nhiệm Vụ Share   \n";
echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "6" . $vang . "]" . $luc . " Nhiệm Vụ Cảm Xúc  \n";
echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "7" . $vang . "]" . $luc . " Nhiệm Vụ Cảm Xúc Comment  \n";
echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "8" . $vang . "]" . $luc . " Nhiệm Vụ Like Page  \n";
echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "9" . $vang . "]" . $luc . " Nhiệm Vụ Tham Gia Group  \n";
//echo $daucau2 . $luc . "Nhập " . $vang . "[" . $trang . "8" . $vang . "]" . $luc . " Nhiệm Vụ Join Group \n";
echo $thanhngang1;
echo $thanh_dep.$xnhac."Có Thể Chọn Nhiều Nhiệm Vụ (Ví Dụ 2+4) \n";
echo $thanh_dep.$luc."Nhập Số Để Chạy Nhiệm Vụ: $vang";
$loainvtt = trim(fgets(STDIN));
echo $thanh_dep.$luc."Sau Bao Nhiêu Nhiệm Vụ Thì Đổi Nick: $vang";
$doiacc = (int)trim(fgets(STDIN));
echo $daucau2 . $luc . "Bạn Có Muốn Tạm Dừng Khi Hết Nhiệm Vụ (y/n): $vang";
$dunghetnv = trim(fgets(STDIN));

echo $daucau2 . $luc . "Bạn Có Muốn Nhập Lại Cookie Khi Die (y/n): $vang";
$nhaptkdie = trim(fgets(STDIN));




if (strpos($loainvtt, '1') !== false) {
    array_push($listnv, 'like');
}
if (strpos($loainvtt, '2') !== false) {
    array_push($listnv, 'like2');
}
if (strpos($loainvtt, '3') !== false) {
    array_push($listnv, 'sub');
}
if (strpos($loainvtt, '4') !== false) {
    array_push($listnv, 'cmt');
}
if (strpos($loainvtt, '5') !== false) {
    array_push($listnv, 'share');
}
if (strpos($loainvtt, '6') !== false) {
    array_push($listnv, 'cx');
}
if (strpos($loainvtt, '7') !== false) {
    array_push($listnv, 'cxcmt');
}
if (strpos($loainvtt, '8') !== false) {
    array_push($listnv, 'page');
}
if (strpos($loainvtt, '9') !== false) {
    array_push($listnv, 'group');
}
@system("clear");
banner();
print "$daucau2\033[1;92mTên Tài Khoản TDS: \033[1;33m$user\n";
print "$daucau2\033[1;92mXu Hiện Tại: \033[1;33m$sodu\033[1;32m Xu\n";
print "$daucau2\033[1;92mSố Cookie Facebook:\033[1;33m $demcki \n";
while (true) {
    while (true) {
        if (count($khoToken) == 0) {
            $khoToken = [];
        
            echo $do . "Đã Xoá Tất Cả Cookie, Vui Lòng Nhập Lại  \n";
            echo $thanh_dep . $luc . "Lưu Ý: " . $xduong . "Nếu Muốn Dừng Lại Thì Nhấn Enter \n";
            for ($a = 1; $a < 999999; $a++) {
                echo $thanh_dep . $luc . "Nhập Cookie Facebook Thứ $a: $vang";
                $nhapck = (string)trim(fgets(STDIN));
                if ($nhapck == '') {
                    break;
                }
                array_push($khoToken, $nhapck);
            }
        
            $js = json_encode($khoToken);
            $file = fopen("Cookiefb.txt", "w+");
            fwrite($file, $js);
            fclose($file);
        
            $data = file_get_contents("Cookiefb.txt");
            $js = $data;
            $khoToken = json_decode($data, true);
            $demcki = count(json_decode($data, true));
        }   
        
        // Điểm kết thúc vòng lặp và các công việc tiếp theo ở đây
        
        $spam = 0;
        for ($xz = 0; $xz < count($khoToken); $xz++) {
            if ($demhetnv2 == (count($khoToken) * 2)) {
                $demhetnv2 = 0;
                $demhetnv = 0;

                if ($dunghetnv == "y") {
                    echo $thanhngang;
                    echo $daucau2 . $luc . "Tất Cả Nick Đã Hết Nhiệm Vụ";

                    echo $daucau1 . $luc . "Ấn Enter Để Chạy Tiếp Hoặc Nhập 1 Để Thêm Cookie: $vang";
                    $lloafssd = trim(fgets(STDIN));

                    if ($lloafssd == '1') {
                        
        echo $thanh_dep.$luc."Lưu Ý: ".$xduong."Nếu Muốn Dừng Lại Thì Nhấn Enter \n";
                        for ($a = 1; $a < 999999; $a++) {
                            
                           echo $thanh_dep.$luc."Nhập Cookie Facebook Thứ $a: $vang";
 $nhapck = (string)trim(fgets(STDIN));
                            if ($nhapck == '') {
                                break;
                            }
                            array_push($khoToken, $nhapck);
                        }
                    }
                }
            }


            $spam = 0;
            $cookie = $khoToken[$xz];

            $page = thongtin('me', $cookie, $useragent);
            $idfb = explode('%',explode('?lst=', $page)[1])[0];
            if ($idfb == '') {
                echo $red . "Cookie die\n";
                array_splice($khoToken, $xz, 1);
                $spam = 1; break;
            } else {
                

                // Lấy ID FB
                $page = thongtin('me', $cookie, $useragent);
                //lấy tên
                $tenfb = explode('<', explode('>', explode('</span>', explode('<span>', $page)[2])[0])[1])[0];
                $idfb = explode('%',explode('?lst=', $page)[1])[0];


                if ($idfb != "") {
                    while (true) {
                        $spam = 1;
                        $demlgin++;

                        
                        
                        $d = datnick($idfb);
                        if ($d == 1) {
                            $demlgin = 2;
                            
                            echo "\r                            \r";
                            $demhetnv = 0;
                            echo $thanhngang;
                            echo $vang."Đang Cấu Hình ID: ".$do.$idfb." ".$vang."Tên FB: ".$do.$tenfb."\n";
                            echo $thanhngang;
                            $spam = 0;
                        } else {
                            echo "\r                            \r";
                            echo $do . "Cấu hình thất bại vui lòng thêm FB $idfb vào cấu hình";
                        }
                        if ($spam == 0) {
                            break;
                        } else {
                            usleep(1);
                        }
                    }
                } else {
                    
                    echo $do . "Cookie die   \n";
                    array_splice($khoToken, $xz, 1);
                    $spam = 1;
                    break;
                }
            }


            while (true) {

                if ($spam == 1) {
                    break;
                }
                
                $sodu = getxu();
                $rand = $listnv[array_rand($listnv, 1)];
                $page = thongtin('me', $cookie, $useragent);
                $idfb = explode('%',explode('?lst=', $page)[1])[0];
                if ($idfb == '') {
                    echo $red . "Cookie die\n";
                    array_splice($khoToken, $xz, 1);
                    $spam = 1; break;
                }
                
                //nvlike
                if ($rand == 'like') {
                    
                    $x = getnv('like');
                    if ($x != "") {

                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mLike Tạm Thời Hết Nhiệm Vụ            \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                             \r";
                                $g = json_decode(dvfb("like",$id,null,$cookie),true);
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block Like\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                }   
                            }
                            $s = nhantien('LIKE', $id);
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $t = date('H:i:s');
                            $rd = rand(1, 7);
                            
                            if ($s == 2) {
                                $nv += 1;
                                $sodu += 300;
                                $duocne = $duocne + 1;
                                //$tt = " \033[1;31m[\033[1;30m".$ytb."\033[1;31m]\033[1;33m[".$duocne."\033[1;33m] \033[1;31m| \033[1;36m$t\033[1;31m | \033[1;3".$rd."m LIKE  \033[1;31m| \033[1;30mSUCCESS \033[1;31m| \033[1;32m+300 \033[1;31m| \033[1;33m".$sodu."\n";
                                $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m".$_SESSION["C_LIKE"]."\033[1;91m| \033[1;97m" . $id . "\033[1;91m |\033[1;92m +300 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m |\n";

                                for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                    print $tt[$i];
                                    usleep(200);
                                }
                                if ($spam == 1) {
                                    break;
                                }
                                if (count($khoToken) > 1) {
                                    if ($duocne % $doiacc == 0) {
                                        $spam = 1;
                                        break;
                                    } else {
                                        usleep(1);
                                    }
                                } else {
                                    usleep(1);
                                }
                                loadtime('delaylike');
                                if ($nv == $nhiemvu) {
                                    chongbl('block');

                                    $nv = "0";
                                }
                            } else {
                                print "\r";
                            }
                        }
                    }
                    //like2
                } elseif ($rand == 'like2') {
                    
                    $x = getnv('likegiare');
                    if ($x != "") {

                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mLike 2 Tạm Thời Hết Nhiệm Vụ               \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                             \r";
                                $g = json_decode(dvfb("like",$id,null,$cookie),true);
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block Like\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                }
                            }
                            $s = nhantien('LIKEGIARE', $id);

                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $t = date('H:i:s');
                            $rd = rand(1, 7);
                            
                            if ($s == 2) {
                                $nv += 1;
                                $sodu += 150;
                                $duocne = $duocne + 1;
                                //$tt = " \033[1;31m[\033[1;30m".$ytb."\033[1;31m]\033[1;33m[".$duocne."\033[1;33m] \033[1;31m| \033[1;36m$t\033[1;31m | \033[1;3".$rd."m LIKE  \033[1;31m| \033[1;30mSUCCESS \033[1;31m| \033[1;32m+300 \033[1;31m| \033[1;33m".$sodu."\n";
                                $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;31m | \033[1;96m" . date("H:i:s") . "\033[1;91m | \033[1;93m".$_SESSION["C_LIKE2"]."\033[1;91m | \033[1;97m" . $id . "\033[1;91m |\033[1;92m +150 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m |\n";

                                for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                    print $tt[$i];
                                    usleep(200);
                                }
                                if ($spam == 1) {
                                    break;
                                }
                                if (count($khoToken) > 1) {
                                    if ($duocne % $doiacc == 0) {
                                        $spam = 1;
                                        break;
                                    } else {
                                        usleep(1);
                                    }
                                } else {
                                    usleep(1);
                                }
                                
                                loadtime('delaylike');
                                if ($nv == $nhiemvu) {
                                    chongbl('block');

                                    $nv = "0";
                                }
                            } else {
                                print "\r";
                            }
                        }
                    }
                    //nvsub
                } else if ($rand == 'sub') {
                    
                    $x = getnv('follow');
                    if ($x != "") {
                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mFollow Tạm Thời Hết Nhiệm Vụ               \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                             \r";
                                $g = json_decode(dvfb("follow",$id,null,$cookie));
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block Follow\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                } else {
                                    $s = nhantien('FOLLOW', $id);
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $t = date('H:i:s');
                                    $rd = rand(1, 7);
                                    if ($s == 2) {
                                        $nv += 1;
                                        $sodu += 600;
                                        $d += 1;
                                        $duocne = $duocne + 1;
                                        //$tt = " \033[1;31m[\033[1;30m".$ytb."\033[1;31m]\033[1;33m[".$duocne."\033[1;33m] \033[1;31m| \033[1;36m$t\033[1;31m | \033[1;3".$rd."m FOLLOW  \033[1;31m| \033[1;30mSUCCESS \033[1;31m| \033[1;32m+600 \033[1;31m| \033[1;33m".$sodu."\n";
                                        $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m".$_SESSION["C_FOLLOW"]."\033[1;91m| \033[1;97m" . $id . "\033[1;91m |\033[1;92m +600 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m |\n";

                                        for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                            print $tt[$i];
                                            usleep(200);
                                        }
                                        if ($spam == 1) {
                                            break;
                                        }
                                        if ($spam == 1) {
                                            break;
                                        }
                                        if (count($khoToken) > 1) {
                                            if ($duocne % $doiacc == 0) {
                                                $spam = 1;
                                                break;
                                            } else {
                                                usleep(1);
                                            }
                                        } else {
                                            usleep(1);
                                        }
                                        loadtime('delayfollow');

                                        if ($nv == $nhiemvu) {
                                            chongbl('block');

                                            $nv = "0";
                                        }
                                    } else {
                                        print "\r";
                                    }
                                }
                            }
                        }
                    }
                } else if ($rand == 'cxcmt') {
                    
                    $x = getnv('reactioncmt');
                    if ($x != "") {
                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            $type = $info["" . $d . ""]["type"];
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mCảm Xúc CMT Tạm Thời Hết Nhiệm Vụ             \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                             \r";
                                $g = json_decode(dvfb($type."CMT",$id,null,$cookie),true);
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block Cảm xúc cmt\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                }
// $page = thongtin('me', $cookie, $useragent);
                                // $idfb = explode('%',explode('?lst=', $page)[1])[0];
                                // if ($idfb == '') {
                                //     echo $red . "Cookie die";
                                //     array_splice($khoToken, $xz, 1);
                                //     $spam = 1; break;
                                // }
                            }
                            $s = nhantien($type.'CMT', $id);
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $t = date('H:i:s');
                            $rd = rand(1, 7);
                            $id = explode('_', $id)[1];
                            
                            if ($s == 2) {
                                $nv += 1;
                                $sodu += 600;
                                $duocne = $duocne + 1;
                                //$tt = " \033[1;31m[\033[1;30m".$ytb."\033[1;31m]\033[1;33m[".$duocne."\033[1;33m] \033[1;31m| \033[1;36m$t\033[1;31m | \033[1;3".$rd."m".$type."|CMT \033[1;31m| \033[1;30mSUCCESS \033[1;31m| \033[1;32m+600 \033[1;31m| \033[1;33m".$sodu."\n";

                                if (strpos($type, 'LIKE')) {
                                    $type = ' LIKE CMT ';
                                }
                                if (strpos($type, 'LOVE')) {
                                    $type = ' LOVE CMT ';
                                }
                                if (strpos($type, 'CARE')) {
                                    $type = ' CARE CMT ';
                                }
                                if (strpos($type, 'HAHA')) {
                                    $type = ' HAHA CMT ';
                                }
                                if (strpos($type, 'WOW')) {
                                    $type = '  WOW CMT ';
                                }
                                if (strpos($type, 'SAD')) {
                                    $type = '  SAD CMT ';
                                }
                                if (strpos($type, 'ANGRY')) {
                                    $type = ' ANGRY CMT';
                                }
                                $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m | \033[1;93m" . $type . "\033[1;91m | \033[1;97m" . $id . "\033[1;91m |\033[1;92m +600 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m |\n";

                                for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                    print $tt[$i];
                                    usleep(200);
                                }
                                if ($spam == 1) {
                                    break;
                                }
                                if (count($khoToken) > 1) {
                                    if ($duocne % $doiacc == 0) {
                                        $spam = 1;
                                        break;
                                    } else {
                                        usleep(1);
                                    }
                                } else {
                                    usleep(1);
                                }
                                loadtime('delaycxcmt');

                                if ($nv == $nhiemvu) {
                                    chongbl('block');

                                    $nv = "0";
                                }
                            } else {
                                print "\r";
                            }
                        }
                    }
                } else if ($rand == 'page') {
                    
                    $x = getnv('fanpage');
                    if ($x != "") {
                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mLike PAGE Tạm Thời Hết Nhiệm Vụ              \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                             \r";
                                $g = json_decode(dvfb("likepage",$id,null,$cookie),true);
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block Page\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                }
                                $s = nhantien('PAGE', $id);
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $t = date('H:i:s');
                                $rd = rand(1, 7);
                                
                                if ($s == 2) {
                                    $nv += 1;
                                    $sodu += 700;
                                    $duocne = $duocne + 1;
                                    //$tt = " \033[1;31m[\033[1;30m".$ytb."\033[1;31m]\033[1;33m[".$duocne."\033[1;33m] \033[1;31m| \033[1;36m$t\033[1;31m | \033[1;3".$rd."m PAGE  \033[1;31m| \033[1;30mSUCCESS \033[1;31m| \033[1;32m+600 \033[1;31m| \033[1;33m".$sodu."\n";
                                    $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m".$_SESSION["C_PAGE"]."\033[1;91m| \033[1;97m".$id."\033[1;91m |\033[1;92m +600 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m |\n";
                                    for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                        print $tt[$i];
                                        usleep(200);
                                    }
                                    if ($spam == 1) {
                                        break;
                                    }
                                    if (count($khoToken) > 1) {
                                        if ($duocne % $doiacc == 0) {
                                            $spam = 1;
                                            break;
                                        } else {
                                            usleep(1);
                                        }
                                    } else {
                                        usleep(1);
                                    }
                                    loadtime('delaypage');

                                    if ($nv == $nhiemvu) {
                                        chongbl('block');

                                        $nv = "0";
                                    }
                                } else {
                                    print "\r";
                                }
                            }
                        }
                    }
                } else if ($rand == 'share') {
                    
                    $x = getnv('share');
                    if ($x != "") {
                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mShare Tạm Thời Hết Nhiệm Vụ              \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                             \r";
                                $g = json_decode(dvfb("share",$id,null,$cookie),true);
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block Share\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                }
                                $s = nhantien('SHARE', $id);
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $t = date('H:i:s');
                                $rd = rand(1, 7);
                                
                                if ($s == 2) {
                                    $nv += 1;
                                    $sodu += 800;
                                    $duocne = $duocne + 1;
                                    $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m".$_SESSION["C_SHARE"]."\033[1;91m| \033[1;97m" . $id . "\033[1;91m |\033[1;92m +800 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m |\n";

                                    for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                        print $tt[$i];
                                        usleep(1500);
                                    }
                                    if ($spam == 1) {
                                        break;
                                    }
                                    if (count($khoToken) > 1) {
                                        if ($duocne % $doiacc == 0) {
                                            $spam = 1;
                                            break;
                                        } else {
                                            usleep(1);
                                        }
                                    } else {
                                        usleep(1);
                                    }
                                    loadtime('delayshare');

                                    if ($nv == $nhiemvu) {
                                        chongbl('block');

                                        $nv = "0";
                                    }
                                } else {
                                    print "\r";
                                }
                            }
                        }
                    }
                } else if ($rand == 'cx') {
                    
                    $x = getnv('reaction');
                    if ($x != "") {
                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            $type = $info["" . $d . ""]["type"];
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mReaction Tạm Thời Hết Nhiệm Vụ             \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                             \r";
                                $g = json_decode(dvfb($type,$id,null,$cookie),true);
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block Cảm xúc\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                }
                                $tp = $type;
                                $s = nhantien($tp, $id);

                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $t = date('H:i:s');
                                $rd = rand(1, 7);
                                
                                if ($s == 2) {
                                    $nv += 1;
                                    $sodu += 400;
                                    $duocne = $duocne + 1;
                                    //$tt = " \033[1;31m[\033[1;30m".$ytb."\033[1;31m]\033[1;33m[".$duocne."\033[1;33m] \033[1;31m| \033[1;36m$t\033[1;31m | \033[1;3".$rd."m".$type." \033[1;31m| \033[1;30mSUCCESS \033[1;31m| \033[1;32m+400 \033[1;31m| \033[1;33m".$sodu."\n";

                                    if (strpos($type, 'LIKE')) {
                                        $type = $_SESSION["C_LIKE"];
                                    }
                                    if (strpos($type, 'LOVE')) {
                                        $type = $_SESSION["C_LOVE"];
                                    }
                                    if (strpos($type, 'CARE')) {
                                        $type = $_SESSION["C_CARE"];
                                    }
                                    if (strpos($type, 'HAHA')) {
                                        $type = $_SESSION["C_HAHA"];
                                    }
                                    if (strpos($type, 'WOW')) {
                                        $type = $_SESSION["C_WOW"];
                                    }
                                    if (strpos($type, 'SAD')) {
                                        $type = $_SESSION["C_SAD"];
                                    }
                                    if (strpos($type, 'ANGRY')) {
                                        $type = $_SESSION["C_ANGRY"];
                                    }
                                    $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m | \033[1;93m" . $type . "\033[1;91m | \033[1;97m" . $id . "\033[1;91m |\033[1;92m +400 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m |\n";

                                    for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                        print $tt[$i];
                                        usleep(1500);
                                    }
                                    if ($spam == 1) {
                                        break;
                                    }
                                    if (count($khoToken) > 1) {
                                        if ($duocne % $doiacc == 0) {
                                            $spam = 1;
                                            break;
                                        } else {
                                            usleep(1);
                                        }
                                    } else {
                                        usleep(1);
                                    }
                                    loadtime('delaycx');

                                    if ($nv == $nhiemvu) {
                                        chongbl('block');

                                        $nv = "0";
                                    }
                                } else {
                                    print "\r";
                                }
                            }
                        }
                    }
                } elseif ($rand == 'cmt') {
                    
                    $x = getnv('comment');
                    if ($x != "") {
                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            $msg = $info["" . $d . ""]["msg"];
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mCMT Tạm Thời Hết Nhiệm Vụ               \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                             \r";
                                $g = json_decode(dvfb("comment",$id,$msg,$cookie),true);
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block CMT\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                }
                                    $s = nhantien('COMMENT', $id);
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $t = date('H:i:s');
                                    $rd = rand(1, 7);
                                    
                                    if ($s == 2) {
                                        $nv += 1;
                                        $sodu += 600;
                                        $duocne = $duocne + 1;
                                        //$tt = " \033[1;31m[\033[1;30m".$ytb."\033[1;31m]\033[1;33m[".$duocne."\033[1;33m] \033[1;31m| \033[1;36m$t\033[1;31m | \033[1;3".$rd."m CMT  \033[1;31m| \033[1;30mSUCCESS \033[1;31m| \033[1;32m+600 \033[1;31m| \033[1;33m".$sodu."\n";
                                        $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m".$_SESSION["C_CMT"]."\033[1;91m| \033[1;97m" . $id . "\033[1;91m |\033[1;96m $msg\033[1;91m |\033[1;92m +600 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m | \n";

                                        for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                            print $tt[$i];
                                            usleep(200);
                                        }
                                        if ($spam == 1) {
                                            break;
                                        }
                                        if (count($khoToken) > 1) {
                                            if ($duocne % $doiacc == 0) {
                                                $spam = 1;
                                                break;
                                            } else {
                                                usleep(1);
                                            }
                                        } else {
                                            usleep(1);
                                        }
                                        loadtime('delaycmt');

                                        if ($nv == $nhiemvu) {
                                            chongbl('block');

                                            $nv = "0";
                                        }
                                    } else {
                                        print "\r";
                                    }
                                //}
                            }
                        }
                    }
                } elseif ($rand == 'group') {
                    
                    $x = getnv('group');
                    if ($x != "") {
                        $info = json_decode($x, true);
                        $d = "0";
                        while (true) {
                            $id = $info["" . $d . ""]["id"];
                            if ($id < '1') {
                                print "$daucau2 \033[1;31mGroup Tạm Thời Hết Nhiệm Vụ             \r";
                                if (count($khoToken) > 1) {
                                    $demhetnv++;
                                }
                                if ($demhetnv == 4) {
                                    $spam = 1;
                                }
                                break;
                            } else {
                                $demhetnv = 0;
                                $d += 1;
                                echo "\033[1;37m".$id."                            \r";
                                $g = json_decode(dvfb("joingroup",$id,null,$cookie),true);
                                if ($g["status"]=="error") 
                                {
                                    if($g["message"]=="Bạn đã bị block !!!"){
                                        echo "                                                      \r";
                                        echo "\033[1;31m [\033[1;37m✓\033[1;31m]\033[1;37m => \033[1;32m" . $red . "Đã Bị Block join group\n";
                                        array_splice($khocookie, $xz, 1);
                                        $spam = 1;
                                        break;
                                    }
                                }
                                $s = nhantien('GROUP', $id);

                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $t = date('H:i:s');
                                $rd = rand(1, 7);
                                
                                if ($s == 2) {
                                    $nv += 1;
                                    $sodu += 1400;
                                    $duocne = $duocne + 1;
                                    //$tt = " \033[1;31m[\033[1;30m".$ytb."\033[1;31m]\033[1;33m[".$duocne."\033[1;33m] \033[1;31m| \033[1;36m$t\033[1;31m | \033[1;3".$rd."m LIKE  \033[1;31m| \033[1;30mSUCCESS \033[1;31m| \033[1;32m+300 \033[1;31m| \033[1;33m".$sodu."\n";
                                    $tt = "\r\033[1;31m|\033[1;37m" . $duocne . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m | \033[1;93m".$_SESSION["C_GROUP"]."\033[1;91m| \033[1;97m" . $id . "\033[1;91m |\033[1;92m +1400 \033[1;91m| \033[1;93m" . $sodu . "\e[0m\033[1;91m |\n";

                                    for ($i = 1; $i < (strlen($tt) + 1); $i++) {
                                        print $tt[$i];
                                        usleep(200);
                                    }
                                    if ($spam == 1) {
                                        break;
                                    }
                                    if (count($khoToken) > 1) {
                                        if ($duocne % $doiacc == 0) {
                                            $spam = 1;
                                            break;
                                        } else {
                                            usleep(1);
                                        }
                                    } else {
                                        usleep(1);
                                    }
                                    loadtime('delaygr');
                                    if ($nv == $nhiemvu) {
                                        chongbl('block');

                                        $nv = "0";
                                    }
                                } else {
                                    print "\r";
                                }
                            }
                        }
                        //nvsub
                    }
                }
            }
        }
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
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
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
    //echo "\n".$page."\n\n\n\n";

    // $code_post = explode('<span>', $page)[2];
    // $code_post = explode('</span>', $code_post)[0];
    //   echo "\n\n".$code_post;
    // $id_post = explode('mf_story_key":"', $code_post)[1];
    // $id_post = explode('"', $id_post)[0];


    // //tennguoidung
    return $page;
}

function page($id, $cookie)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/' . $id);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
	:'));
    $page = curl_exec($ch);
    if (explode('&amp;refid=', explode('pageSuggestionsOnLiking=1&amp;gfid=', $page)[1])[0]) {
        $get = explode('&amp;refid=', explode('pageSuggestionsOnLiking=1&amp;gfid=', $page)[1])[0];
        $link = 'https://mbasic.facebook.com/a/profile.php?fan&id=' . $id . '&origin=page_profile&pageSuggestionsOnLiking=1&gfid=' . $get . '&refid=17';
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
    }
    curl_close($ch);
}

function datnick($idfb)
{
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://traodoisub.com/api/?fields=run&id='.$idfb.'&access_token='.$_SESSION['token'],
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
    $response=json_decode($response,true);
    if(isset($response['success'])){
        $a=1;
    }
    return $a;
}



function getnv($loai)
{
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
function nhantien($loai, $id)
{
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://traodoisub.com/api/coin/?type='.$loai.'&id='.$id.'&access_token='.$_SESSION["token"],
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
    $s=json_decode($response,true);
    if(isset($s['success'])){
        $response=2;
    }
    return $response;
}

function loadtime($loai)
{
    $so = 0;
    $delay = $_SESSION['' . $loai . ''];
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

function chongbl($loai) {
    for ($x = $_SESSION['' . $loai . '']; $x--; $x) {
        echo "\r\033[1;97m Đang hoạt động chống block sẽ chạy lại sau $x giây"; sleep(1); echo "\r                                                       \r"; 
}}

function gettoken($cookie, $useragent)
{
    $head = array("Connection: keep-alive", "Keep-Alive: 300", "authority: business.facebook.com", "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5", "cache-control: max-age=0", "upgrade-insecure-requests: 1", "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9", "sec-fetch-site: none", "sec-fetch-mode: navigate", "sec-fetch-user: ?1", "sec-fetch-dest: document");
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://business.facebook.com/business_locations",
        CURLOPT_USERAGENT => $useragent,
        CURLOPT_COOKIE => $cookie,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_CONNECTTIMEOUT => 60,
        CURLOPT_FOLLOWLOCATION => TRUE
    ));
    $access = curl_exec($ch);
    curl_close($ch);
    $access_token = 'EAAG' . explode('","', explode('EAAG', $access)[1])[0];
    if (strlen($access_token) > 5) {
        return $access_token;
    } else {
        return 'die';
    }
}
function    getxu()
{
    $token=$_SESSION['token'];
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
    curl_close($curl);
    $json = json_decode($response, true);
    $sodu = $json["data"]["xu"];
    return $sodu;
}

function huyfollow($id, $useragent, $cookie)
{
    $ch = curl_init();
    if (strpos($id, '_')) {
        $uid = explode('_', $id, 2);
        $id2 = 'story.php?story_fbid=' . $uid[1] . '&id=' . $uid[0];
    } else {
        $id2 = $id;
    }

    $header = array(
        "Host:mbasic.facebook.com",
        "user-agent:$useragent",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "cookie:$cookie",
    );
       
    $linkbv = 'https://mbasic.facebook.com/' . $id2;
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
    // json_decode(curl_exec($ch), true);
    $post = curl_exec($ch);

    
    $link = explode('<a href="/a/subscriptions/remove?subject_id=', $post)[1];
    $link = explode('"', $link)[0];
    $link = html_entity_decode($link);
    $link = "https://mbasic.facebook.com/a/subscriptions/remove?subject_id=".$link;
    // echo $link;
    // die();
    $linkreac1 = $link;
    $header = array(
        "Host:mbasic.facebook.com",
        "user-agent:$useragent",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "referer:$linkbv",
        "cookie:$cookie",
    );
       
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $linkreac1);
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
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $page = curl_exec($ch);
    $aa = $page;
 
    return $aa;
}
function cmt_fb_cookie_new($id,$cookie,$msg){
$mr = curl_init();
$head = [
	"Host:mbasic.facebook.com",
	'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
	"sec-ch-ua-mobile:?1",
	"cache-control:max-age=0",
	"upgrade-insecure-requests:1",
	"dnt:1",
	"save-data:on",
	"user-agent:Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36",
	"accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
	"sec-fetch-site:same-origin",
	"sec-fetch-mode:navigate",
	"sec-fetch-user:?1",
	"sec-fetch-dest:document",
	"referer:https://mbasic.facebook.com/",
	"accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",];
curl_setopt($mr, CURLOPT_URL, "https://mbasic.facebook.com/$id");
curl_setopt($mr, CURLOPT_COOKIE, $cookie);
curl_setopt($mr, CURLOPT_HTTPHEADER, $head);
curl_setopt($mr, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($mr, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($mr, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($mr, CURLOPT_FOLLOWLOCATION, TRUE);
$mr2 = curl_exec($mr);
$fb_dtsg = explode('"',explode('fb_dtsg" value="',$mr2)[1])[0];
$jazoest = explode('"',explode('jazoest" value="',$mr2)[1])[0];
$cmt = explode('"',explode('action="/a/comment.php?',$mr2)[1])[0];
$text = "fb_dtsg=".$fb_dtsg."&jazoest=".$jazoest."&comment_text=".$msg;
curl_setopt($mr, CURLOPT_URL, "https://mbasic.facebook.com/a/comment.php?".htmlspecialchars_decode($cmt));
curl_setopt($mr, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($mr, CURLOPT_POSTFIELDS, $text);
$mr2 = curl_exec($mr);
curl_close($mr);
}
function thongtinck($cookie)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://mbasic.facebook.com/me");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.110", "Google Chrome";v="114.0.5735.110"',
        'sec-ch-ua-mobile: ?1',
        'sec-ch-ua-platform: "Android"',
        'sec-ch-ua-platform-version: "6.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'viewport-width: 400'
    ));

    $response = curl_exec($ch);
    $redirectUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $redirectUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'cache-control: max-age=0',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.110", "Google Chrome";v="114.0.5735.110"',
        'sec-ch-ua-mobile: ?1',
        'sec-ch-ua-platform: "Android"',
        'sec-ch-ua-platform-version: "6.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36',
        'viewport-width: 400',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    if(strpos($response,'profile_id=')){
        $name=explode('<head><title>',explode('</title><meta',$response)[0])[1];
        $id=explode('&',explode('profile_id=',$response)[1])[0];
        return json_encode(array(
            'name'=> $name,
            'id'=> $id
        ));
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
