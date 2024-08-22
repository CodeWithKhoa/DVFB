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
$ress = "\033[0;32m";
$res = "\033[0;33m";
$red = "\033[0;31m";
$green = "\033[0;37m";
$yellow = "\033[0;33m";
$white = "\033[0;33m";
$banner = "\r";
$xnhac = "\033[1;96m";
$den = "\033[1;90m";
$do = "\033[1;91m";
$luc = "\033[1;92m";
$vang = "\033[1;93m";
$xduong = "\033[1;94m";
$hong = "\033[1;95m";
$trang = "\033[1;97m";
$cuongdz = $do."[".$luc."●".$do."] ".$trang."=> ";
$cuongvip = $do."[".$luc."●".$do."]";
$thanhngang = "\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m==\033[1;93m\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\033[1;92m=\033[1;93m=\n";
date_default_timezone_set("Asia/Ho_Chi_Minh");
@system('clear');
	if(!$sock = @fsockopen('www.google.com', 80))
{
    echo 'Vui lòng bật kết nối mạng';
    exit();
}

banner();
//login
$dem = 0;
if (file_exists('TokenIG.txt')){
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Bạn Đã Đăng Nhập Trước Đó! Bấm $vang Enter $luc Để Tiếp Tục!\n";
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập $do No $luc Để Xóa: $trang";
	$choice=trim(fgets(STDIN));
	if ($choice=='no' or $choice =='No'){
		@system('rm TokenIG.txt');
		}
	}
	if (!file_exists('TokenIG.txt')){
echo $cuongdz.$luc."Vào Web ".$trang."Topig.vn".$luc." Bấm Cài Đặt Trên Web\n";
echo $cuongdz.$luc."Sao Chép ".$vang."Access_token".$luc." Dán Vào\n";
echo $thanhngang;
  echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập Access_token TOPIG: $vang";
  $tokenacc = trim(fgets(STDIN));
  $k = fopen('TokenIG.txt','a+');
  fwrite($k,$tokenacc);
}
else{
  $tokenacc = file_get_contents('TokenIG.txt');
}
for ($makep=28;$makep > 0;$makep--){
  echo $vang."-";
  usleep(15000);
  echo $red."-";
  }echo "\n";  
//Token 
$khoToken = [];
if (file_exists('CookiIG.txt')){
	echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập ".$vang."[".$trang." 1 ".$vang."] ".$luc."Chạy Cookie IG Mới\n";
	echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập ".$vang."[".$trang." 2 ".$vang."] ".$luc."Chạy Tiếp Cookie IG Cũ\n";
	echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập: $vang";
	$choice=trim(fgets(STDIN));
	if ($choice=='1'){
		@system('rm CookiIG.txt');
		}
	}
if (!file_exists('CookiIG.txt')){
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập Cookie Instagram,$vang Nếu Muốn Dừng Bấm Xuống Hàng Nhé\n";
for($a = 1; $a < 999999;$a++){
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập Cookie Instagram Thứ $a: $trang";
$nhapck = (string)trim(fgets(STDIN));
if($nhapck == ''){break;}
array_push($khoToken,$nhapck);
}
$js=json_encode($khoToken);
$demcki=count($khoToken);
$k = fopen("CookiIG.txt","a+");
fwrite($k, $js);
fclose($k);
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Tìm Thấy ".$vang.$demcki." ".$luc." Cookie IG\n";
sleep(2);
	}else{
		$khoToken = json_decode(fread(fopen("CookiIG.txt","r"),filesize("CookiIG.txt")),true);
		$demcki = count($khoToken);
	}

//Check token TOPIG
$info = check_token_tds($tokenacc);
if ($info["error"]) {
    @system('rm TokenIG.txt');
    exit ($info["error"]);
}

//$thongtin
$user = strtolower($info["data"]["user"]);
$xuhientai = $info["data"]["xu"];
$xupen = $info["data"]["xupen"];
$xudie = $info["data"]["xudie"];
$datablock = [];
$data_ig = [];
$listjob = [];
$dem = 0;
@system('clear');
banner();
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Tool Đa Luồng: ".$vang."TOPIG.VN\n";
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Số Acc IG Chạy Tool: ".$vang.$demcki."\n";
for ($makep=28;$makep > 0;$makep--){
  echo $vang."-";
  usleep(0);
  echo $red."-";
  }echo "\n";  
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Tài Khoản TOPIG: ".$vang.$user."\n";
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Số Xu Hiện Tại : ".$vang.$xuhientai."\n";
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Số Xu Đợi Duyệt : ".$vang.$xupen."\n";
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Số Xu Bị Trừ Do Vi Phạm: ".$vang.$xudie."\n";
for ($makep=28;$makep > 0;$makep--){
  echo $vang."-";
  usleep(0);
  echo $red."-";
  }echo "\n";  
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập ".$do."[".$vang."1".$do."]".$luc." Chạy Job Like\n";
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập ".$do."[".$vang."2".$do."]".$luc." Chạy Job Follow\n";
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập ".$do."[".$vang."12".$do."]".$luc." Để Chạy Ngẫu Nhiên Like & Follow\n";

echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập Số Để Chạy Nhiệm Vụ: $vang";
$nhiemvu = trim(fgets(STDIN));
if (strpos('_'.$nhiemvu, "1")){
  array_push($listjob,'like');
}
if (strpos('_'.$nhiemvu, "2")){
  array_push($listjob,'follow');
}

echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập Thời Gian Làm Nhiệm Vụ".$luc.": $vang";
$delay = trim(fgets(STDIN));
if ($delay < 3){exit($do."Ít 3 Giây\n");}
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Chuyển Nick Sau Bao Nhiêu Job: $vang";
$nvvong = trim(fgets(STDIN));
echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Sau ".$vang.$nvvong.$luc." Nhiệm Vụ Nghỉ Ngơi Bao Nhiêu Giây: $vang";
$delayvong = trim(fgets(STDIN));
for ($makep=28;$makep > 0;$makep--){
  echo $vang."-";
  usleep(0);
  echo $red."-";
  }echo "\n";  
if(count($khoToken) == 0){
    echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập Cookie IG, Nếu Muốn Dừng Bấm Xuống Hàng Nhé\n";
    for($a = 1; $a < 999999;$a++){
      echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Nhập Cookie IG Thứ $a: $vang";
      $nhapck = (string)trim(fgets(STDIN));
      if($nhapck == ''){break;}
      array_push($khoToken,$nhapck);
    }
    $js=json_encode($khoToken);
    $demcki=count($khoToken);
    $k = fopen("TokenIG.txt","a+");
    fwrite($k, $js);
    fclose($k);
    echo $do."[".$luc."●".$do."] ".$trang."=> ".$luc."Tìm Thấy ".$vang.$demcki." ".$luc."Cookie IG\n";
}
foreach ($khoToken as $value) {
  $check = get_info_ig($value);
  if ($check == 'unknown'){
    echo $do."Lỗi kết nối! vui lòng kiểm tra token IG\n";
  }else if (strpos($check, '|')){
    $idig = explode('|', $check)[0];
    $datablock[$idig] = $listjob;
    array_push($data_ig, $check);
  }
}
while (True) {
  if (count($data_ig) == 0){
    break;
  }
  foreach ($data_ig as $haha) {
      $giainen = explode('|', $haha);
      $idig = $giainen[0];
      $username = $giainen[1];
      $cookie = $giainen[2];
      $csrftoken = $giainen[3];
      if (count($datablock[$idig]) == 0){
          if (($key = array_search($haha, $data_ig)) !== false) {
              unset($data_ig[$key]);
          }
      }
      if (count($data_ig) == 0){
        break;
      }
      $demjoblam = 0;
      $cauhinh = cau_hinh($idig,$tokenacc);
      if ($cauhinh == 'unknown'){
         echo $do."Lỗi kết nối hoặc lỗi sever, sẽ cấu hình lại sau 5 giây nữa!\n";
         delay(5);
         continue;
      }else if($cauhinh == 'ok'){
      	echo $thanhngang;
         echo $vang."Quân-Tool$luc - Cấu hình ID: ".$vang.$username."\n";
         echo $thanhngang;
      }else{
        echo $do.$cauhinh."\n";
        if (($key = array_search($haha, $data_ig)) !== false) {
          unset($data_ig[$key]);
        }
        continue;
      }

      $rand = $datablock[$idig][array_rand($datablock[$idig],1)];
      if ($rand == 'like'){
          for ($i = 0; $i < 5; $i++) {
            $listlike = get_job('like', $tokenacc);
            if ($listlike == 'countdown'){
               continue;
            }else if($listlike == 'error'){
               echo $do."ID: ".$username." chưa cấu hình, chuyển nick\n";
               if (($key = array_search($haha, $data_ig)) !== false) {
                 unset($data_ig[$key]);
               }
               break;
            }else if ($listlike == 'limit'){
              echo $do."ID: ".$username." đã đạt giới hạn nhiệm vụ like trong ngày\n";
              if (($key = array_search('like', $datablock[$idig])) !== false) {
                 unset($datablock[$idig][$key]);
              }
              break;
            }else{
              break;
            }
          }
          $demjobvong = 0;
          foreach ($listlike as $xxx) {
             if ($demjobvong == $nvvong){
                break;
             }
             $uid = $xxx['id'];
             $a = lam_like($idig, $username, $uid, $cookie, $csrftoken);
             if ($a == 368){
                echo $do."ID: ".$username." -> Block like\n";
                if (($key = array_search('like', $datablock[$idig])) !== false) {
                  unset($datablock[$idig][$key]);
                }
                break;
             }else if($a == 190){
                echo $do."ID: ".$username." -> Die Cookie\n";
                if (($key = array_search($haha, $data_ig)) !== false) {
                  unset($data_ig[$key]);
                }
                break;
             }
             $demjobvong++;
             delay(rand($delay,$delay+3));
          }
      }

      else if($rand == 'follow'){
          for ($i = 0; $i < 5; $i++) {
            $listlike = get_job('follow', $tokenacc);
            if ($listlike == 'countdown'){
               continue;
            }else if($listlike == 'error'){
               echo $do."ID: ".$username." chưa cấu hình, chuyển nick\n";
               if (($key = array_search($haha, $data_ig)) !== false) {
                 unset($data_ig[$key]);
               }
               break;
            }else if ($listlike == 'limit'){
              echo $do."ID: ".$username." đã đạt giới hạn nhiệm vụ follow trong ngày\n";
              if (($key = array_search('follow', $datablock[$idig])) !== false) {
                 unset($datablock[$idig][$key]);
              }
              break;
            }else{
              break;
            }
          }
          $demjobvong = 0;
          foreach ($listlike as $xxx) {
             if ($demjobvong == $nvvong){
                break;
             }
             $uid = $xxx['id'];
             $a = lam_follow($idig, $username, $uid, $cookie, $csrftoken);
             if ($a == 368){
                echo $do."ID: ".$username." -> Block follow\n";
                if (($key = array_search('follow', $datablock[$idig])) !== false) {
                  unset($datablock[$idig][$key]);
                }
                break;
             }else if($a == 190){
                echo $do."ID: ".$username." -> Die Cookie\n";
                if (($key = array_search($haha, $data_ig)) !== false) {
                  unset($data_ig[$key]);
                }
                break;
             }
             $demjobvong++;
             delay(rand($delay,$delay+5));
          }
      }
      delay(rand($delayvong,$delayvong+3));   
  }
}
echo $vang."Hoàn Thành!";
#Lam_Follow
function lam_follow($idig, $username, $uid, $cookie, $csrftoken){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/web/friendships/'.$uid.'/follow/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  $headers = array();
  $headers[] = 'Authority: www.instagram.com';
  $headers[] = 'Content-Length: 0';
  $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"';
  $headers[] = 'X-Ig-App-Id: 1217981644879628';
  $headers[] = 'Sec-Ch-Ua-Mobile: ?1';
  $headers[] = 'X-Instagram-Ajax: d26a8ffbcd2b';
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  $headers[] = 'Accept: */*';
  $headers[] = 'X-Requested-With: XMLHttpRequest';
  $headers[] = 'X-Asbd-Id: 198387';
  $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36';
  $headers[] = 'X-Csrftoken: '.$csrftoken;
  $headers[] = 'Sec-Ch-Ua-Platform: \"Android\"';
  $headers[] = 'Origin: https://www.instagram.com';
  $headers[] = 'Sec-Fetch-Site: same-origin';
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Sec-Fetch-Dest: empty';
  $headers[] = 'Referer: https://www.instagram.com/';
  $headers[] = 'Accept-Language: en-US,en;q=0.9,vi;q=0.8';
  $headers[] = 'Cookie: '.$cookie;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $result = curl_exec($ch);
  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);
  if ($result == '{"result":"following","status":"ok"}' || $result =='{"result":"requested","status":"ok"}' || $result =='{"status":"ok"}'){
    nhantien ('FOLLOW',$idig,$username,$uid,$GLOBALS['tokenacc']);
  }else if($result == 'Please wait a few minutes before you try again.'){
    return 368;
  }else{
    return 190;
  }
}
#Lam_Like
function lam_like($idig, $username, $uid, $cookie, $csrftoken){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/web/likes/'.$uid.'/like/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  $headers = array();
  $headers[] = 'Authority: www.instagram.com';
  $headers[] = 'Content-Length: 0';
  $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"';
  $headers[] = 'X-Ig-App-Id: 1217981644879628';
  $headers[] = 'Sec-Ch-Ua-Mobile: ?1';
  $headers[] = 'X-Instagram-Ajax: d26a8ffbcd2b';
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  $headers[] = 'Accept: */*';
  $headers[] = 'X-Requested-With: XMLHttpRequest';
  $headers[] = 'X-Asbd-Id: 198387';
  $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Mobile Safari/537.36';
  $headers[] = 'X-Csrftoken: '.$csrftoken;
  $headers[] = 'Sec-Ch-Ua-Platform: \"Android\"';
  $headers[] = 'Origin: https://www.instagram.com';
  $headers[] = 'Sec-Fetch-Site: same-origin';
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Sec-Fetch-Dest: empty';
  $headers[] = 'Referer: https://www.instagram.com/';
  $headers[] = 'Accept-Language: en-US,en;q=0.9,vi;q=0.8';
  $headers[] = 'Cookie: '.$cookie;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);
  if ($result == '{"status":"ok"}'){
    nhantien ('LIKE',$idig,$username,$uid,$GLOBALS['tokenacc']);
  }else if($result == 'Sorry, this photo has been deleted'){
    nhantien ('LIKE',$idig,$username,$uid,$GLOBALS['tokenacc']);
  }else if($result == 'Please wait a few minutes before you try again.'){
    return 368;
  }else{
    return 190;
  }
}
#nhan_tien
function nhantien ($t,$idig,$username,$uid,$token){
  $data = curl_topig('https://topig.vn/api/coin/?fields='.$t.'&id='.$uid.'&access_token='.$token);
  if (array_key_exists("success", $data)){
     $GLOBALS['dem']++;
     $xu = $data['data']['xupen'];
     $xujob = $data['data']['msg'];
     hoanthanh($GLOBALS['dem'], $t, $uid, $xujob, $xu);
  }
}
#hoan_thanh
function hoanthanh($dem, $type, $id, $xujob, $xu) {
    $a = "\033[1;93m[\033[1;93m".$dem."\033[1;93m]\033[1;91m ● \033[1;96m".date("H:i:s")."\033[1;91m ●\033[1;93m $type\033[1;91m ● \033[1;97m".$id."\033[1;91m ●\033[1;92m ".$xujob." \033[1;91m● \033[1;93m".$xu."\e[0m\n";
    $len = strlen($a);
    for ($x = 0; $x < $len; $x++) {
        echo $a[$x];
        usleep(1000);
    }
}
#Get_Info_IG_Cookie
function get_info_ig($cookie){
  #Xu_ly_cookie
  if (!strpos($cookie, 'ds_user_id') || !strpos($cookie, 'csrftoken')){
      return "cookie_err";
  }
  $idig = trim(explode(';',explode('ds_user_id=', $cookie)[1])[0]);
  $csrftoken = trim(explode(';',explode('csrftoken=', $cookie)[1])[0]);
  #End_xu_ly
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://i.instagram.com/api/v1/users/'.$idig.'/info/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  $headers = array();
  $headers[] = 'Authority: i.instagram.com';
  $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"';
  $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
  $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36';
  $headers[] = 'Accept: */*';
  $headers[] = 'X-Asbd-Id: 198387';
  $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
  $headers[] = 'X-Ig-App-Id: 936619743392459';
  $headers[] = 'Origin: https://www.instagram.com';
  $headers[] = 'Sec-Fetch-Site: same-site';
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Sec-Fetch-Dest: empty';
  $headers[] = 'Referer: https://www.instagram.com/';
  $headers[] = 'Accept-Language: en-US,en;q=0.9';
  $headers[] = 'Cookie: '.$cookie;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $result = curl_exec($ch);
  if (curl_errno($ch)) {
     echo 'unknown';
  }
  curl_close($ch);

  if (!strpos($result, '"status":"ok"')){
    return "cookie_err";
  }
  $data = json_decode($result, true)['user'];
  $idig = $data['pk'];
  $username = $data['username'];
  echo $GLOBALS['luc']." Tài Khoản IG: ".$GLOBALS['vang'].$data['full_name']." ".$GLOBALS['luc']."Username: ".$GLOBALS['vang'].$username."\n";
  return $idig.'|'.$username.'|'.$cookie.'|'.$csrftoken;
}
#Get_Job
function get_job($t, $token_topig){
  $data = curl_topig('https://topig.vn/api/?fields='.$t.'&access_token='.$token_topig);
  if (array_key_exists("countdown", $data)){
    delay($data['countdown']);
    return 'countdown';
  }else if(array_key_exists("nvdalam", $data)){
    return 'limit';
  }else if (array_key_exists("error", $data)) {
    return 'error';
  }else{
    return $data;
  }
}
#Cau_Hinh_Nick
function cau_hinh($idig,$token_topig){
  $data = curl_topig('https://topig.vn/api/?fields=run&id='.$idig.'&access_token='.$token_topig);
  if (array_key_exists("error", $data)){
    return $data['error'];
  }else if (array_key_exists("success", $data)){
    return "ok";
  }else{
    return "unknown";
  }
}

#Check_Token_TopIG
function check_token_tds($token_topig){
  $data = curl_topig('https://topig.vn/api/?fields=profile&access_token='.$token_topig);
  return $data;
}

#Curl_TopIG
function curl_topig($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
  $headers = array();
  $headers[] = 'Authority: topig.vn';
  $headers[] = 'Cache-Control: max-age=0';
  $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"93\", \" Not;A Brand\";v=\"99\", \"Chromium\";v=\"93\"';
  $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
  $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
  $headers[] = 'Upgrade-Insecure-Requests: 1';
  $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36';
  $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
  $headers[] = 'Sec-Fetch-Site: none';
  $headers[] = 'Sec-Fetch-Mode: navigate';
  $headers[] = 'Sec-Fetch-User: ?1';
  $headers[] = 'Sec-Fetch-Dest: document';
  $headers[] = 'Accept-Language: en-US,en;q=0.9,vi;q=0.8';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $result = curl_exec($ch);
  if (curl_errno($ch)) {
      return 'error_net';
  }
  curl_close($ch);
  return json_decode($result, true);
}

#delay
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