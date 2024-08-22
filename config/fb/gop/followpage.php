<?php
header('Content-Type: text/html; charset=utf-8');
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if($userAgent!='TOOL TĐK'){
    require_once ($_SERVER['DOCUMENT_ROOT'].'/404.php');
    die;
}
?>
#TOOL TĐK
system("clear");
banner();
echo $daucau.$luc." Nhập Cookie: ".$vang;
$ck = trim(fgets(STDIN));

$sb_1 = explode(';', explode('sb=', $ck)[1])[0];
$sb_2 = explode(';', explode('datr=', $ck)[1])[0];
$sb_3 = explode(';', explode('c_user=', $ck)[1])[0];
$sb_4 = explode(';', explode('xs=', $ck)[1])[0];
$sb_5 = explode(';', explode('fr=', $ck)[1])[0];
$sb_6 = explode(';', explode('wd=', $ck)[1])[0];
$id_pro = getpro5($ck);
$sl = count($id_pro);
echo $luc." Đã tìm Thấy : ".$trang.$sl.$luc." Page Pro5 \n";
$tong_id=[];
while (true){
	$so_i = $so_i +1 ;
	echo $daucau.$luc." Nhập ID Facebook Cần Follow Thứ ".$trang.$so_i.$luc." : ".$vang;
	$idddd = trim(fgets(STDIN));
	if (!$idddd){
		break;
	}else{
	array_push($tong_id,$idddd);
	}
}
banner();
while (true){
	for ($so_id = 0; $so_id < $so_i ; $so_id++) {
		$so_d = $so_i -2 ;
		$id_fl = $tong_id[$so_id];
		echo $thanhngang;
		echo $luc." Tài Khoản Follow : ".$vang.$id_fl." \n";
		echo $thanhngang;
		for ($so = 0; $so < $sl ; $so++) {
			$id_5 = $id_pro[$so]["profile"]["id"];
			$name = $id_pro[$so]["profile"]["name"];
			$ck_pro5 = "sb=".$sb_1."; datr=".$sb_2."; c_user=".$sb_3."; wd=".$sb_6."; xs=".$sb_4."; fr=".$sb_5."; i_user=".$id_5.";";
			$fl = follow($ck_pro5, $id_5, $id_fl);
			$tt = $tt +1;
    		$ttt = "\r\033[1;31m|\033[1;37m" . $tt . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m".$id_fl."\033[1;91m| \033[1;97mFOLLOW\033[1;91m | \033[1;97m" . $id_5 . "\033[1;91m | \033[1;97m" . $name . "\033[1;91m |\n";
        for ($i=0;$i<strlen($ttt);$i++){echo $ttt[$i]; usleep(100);}
      }
    if ( $so_d == $so_id ){
    	echo $vanv." Follow Thành Công \n";
    	exit();
    }
	}
}
function getpro5($ck){
$url_1 = "https://mbasic.facebook.com/";
$tsm = array(
'authority:mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'accept-language:vi,en;q=0.9,vi-VN;q=0.8,fr-FR;q=0.7,fr;q=0.6,en-US;q=0.5',
        'cache-control:max-age=0',
        'cookie:'.$ck,
        'origin:https://www.facebook.com',
        'referer:https://www.facebook.com',
        'sec-ch-ua:"Google Chrome";v="107", "Chromium";v="107", "Not=A?Brand";v="24"',
        'sec-ch-ua-mobile:?0',
        'sec-ch-ua-platform:"Windows"',
        'sec-fetch-dest:document',
        'sec-fetch-mode:navigate',
        'sec-fetch-site:none',
        'sec-fetch-user:?1',
        'upgrade-insecure-requests:1',
        'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
);
$mr = curl_init();
curl_setopt_array($mr, array(
  CURLOPT_PORT => "443",
  CURLOPT_URL => "$url_1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => $tsm));
$mr2 = curl_exec($mr); curl_close($mr);
$_SESSION['fb_dtsg'] = explode('"', explode('<input type="hidden" name="fb_dtsg" value="', $mr2)[1])[0];
$_SESSION['jazoest'] = explode('"', explode('<input type="hidden" name="jazoest" value="', $mr2)[1])[0];

$url_2 = "https://www.facebook.com/api/graphql/";
$data = array(
'fb_dtsg' => $_SESSION['fb_dtsg'] ,
'jazoest' => $_SESSION['jazoest'],
'variables' => '{"showUpdatedLaunchpointRedesign":true,"useAdminedPagesForActingAccount":false,"useNewPagesYouManage":true}',
'doc_id' => '5300338636681652',
);
$mr = curl_init();
curl_setopt_array($mr, array(
  CURLOPT_PORT => "443",
  CURLOPT_URL => "$url_2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => $tsm));
$mr3 = curl_exec($mr); curl_close($mr);
$js = json_decode($mr3,true);
$id_pro = $js['data']['viewer']['actor']['profile_switcher_eligible_profiles']['nodes'];

$sl = count($id_pro);

return $id_pro ;
}
function follow($ck, $id_page, $id_fl){
$url = "https://www.facebook.com/api/graphql/";
$data = array(
            'fb_dtsg' => $_SESSION['fb_dtsg'] ,
            'jazoest' => $_SESSION['jazoest'],
            'fb_api_caller_class' =>'RelayModern',
            'fb_api_req_friendly_name' => 'CometUserFollowMutation',
            'variables' => '{"input":{"attribution_id_v2":"ProfileCometTimelineListViewRoot.react,comet.profile.timeline.list,via_cold_start,1667114418950,431532,190055527696468,","subscribe_location":"PROFILE","subscribee_id":"'.$id_fl.'","actor_id":"'.$id_page.'","client_mutation_id":"1"},"scale":1}',
            'server_timestamps' => 'true',
            'doc_id' => '5032256523527306',
);
$tsm = array(
                'authority:www.facebook.com',
                'accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'accept-language:vi',
                'cookie:'.$ck,
                'sec-ch-prefers-color-scheme:light',
                'sec-ch-ua:"Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"',
                'sec-ch-ua-mobile:?0',
                'sec-ch-ua-platform:"Windows"',
                'sec-fetch-dest:document',
                'sec-fetch-mode:navigate',
                'sec-fetch-site:none',
                'sec-fetch-user:?1',
                'upgrade-insecure-requests:1',
                'user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
                'viewport-width:1366',
            );
$mr = curl_init();
curl_setopt_array($mr, array(
  CURLOPT_PORT => "443",
  CURLOPT_URL => "$url",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => $tsm));
$mr3 = curl_exec($mr); curl_close($mr);
$js = json_decode($mr3,true);

$check = $js["data"]["actor_subscribe"]["subscribee"]["subscribe_status"];
$id_1 = $js["data"]["actor_subscribe"]["subscribee"]["id"];

	return $mr3;


}



