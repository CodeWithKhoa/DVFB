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
while(true){
    echo $daucau.$luc."Nhập Cookie: ".$vang;
    $cookie=trim(fgets(STDIN));
    $thongtin=json_decode(dvfb("thongtin",null,null,$cookie),true);
    if($thongtin['message']=='Cookie die'){
        echo $do."Cookie die";
        continue;
    }
    $name=$thongtin['message']['name'];
    $id=$thongtin['message']['id'];
    echo $luc."Cấu Hình: ".$vang.$name.$luc." ID: ".$vang.$id."\n";
    break;
}
echo $daucau.$luc."Nhập Id: ".$vang;
$idshare=trim(fgets(STDIN));
banner();
echo $thanhngang;
echo $luc."Cấu Hình:$vang $name$luc Id:$vang $id \n";
echo $thanhngang;
$stt=0;
while(true){
	$share=json_decode(dvfb("shareao",$idshare,null,$cookie),true);
	if($share['message']=='Cookie die'){
		echo $do.'Cookie die';
		die;
	}
	if($share['status']=="success"){
		$stt++;
		$tt = "\r\033[1;31m|\033[1;37m" . $stt . "\033[1;31m|\033[1;91m | \033[1;96m" . date("H:i:s") . "\033[1;91m |\033[1;93m".$share['message']."\033[1;91m|\n";
        for ($i=0;$i<strlen($tt);$i++){echo $tt[$i]; usleep(100);}
	} else {
        echo $share['message']."         \r";
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