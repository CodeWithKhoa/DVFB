<?php
function kiem_tra_so($chuoi) {
  $do_dai = strlen($chuoi);
  for ($i = 0; $i < $do_dai; $i++) {
      if (!is_numeric($chuoi[$i])) {  // Kiểm tra xem ký tự có phải là con số hay không
          return false;
      }
  }
  return true;
}
function thongtin($cookie){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'authority: www.instagram.com',
      'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
      'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
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
      'viewport-width: 1010',
  ]);
  curl_setopt($ch, CURLOPT_COOKIE, $cookie);
  $response = curl_exec($ch);
  curl_close($ch);
  if(strpos($response,'username\":\"')!==false){
    $username= explode('\"',explode('username\":\"',$response)[1])[0];
    return $username;
  } else{
  }
}
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
    return "Cookie die";
  }
  $data = json_decode($result, true)['user'];
  $idig = $data['pk'];
  $username = $data['username'];
  return $idig.'|'.$username;
}
function shortcode_to_mediaid($shortcode,$cookie){

    $mediaid = false;

    $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/p/'.$shortcode);
$head[] = "Connection: keep-alive";
$head[] = "Keep-Alive: 300";
$head[] = "authority: www.instagram.com";
$head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
$head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
$head[] = "cache-control: max-age=0";
$head[] = "upgrade-insecure-requests: 1";
$head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
$head[] = "sec-fetch-site: none";
$head[] = "sec-fetch-mode: navigate";
$head[] = "sec-fetch-user: ?1";
$head[] = "sec-fetch-dest: document";
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$access = curl_exec($ch);
curl_close($ch);
if(strpos($access,'"media_id":"') !== false){
	$mediaid = explode('"',explode('"media_id":"',$access)[1])[0];
}
return $mediaid;
}
function comment($id,$noidung,$cookie){
$jsonData = 'comment_text='.urldecode($noidung);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/api/v1/web/comments/'.shortcode_to_mediaid($id,$cookie).'/add/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'authority: www.instagram.com',
      'accept: */*',
      'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
      'content-type: application/x-www-form-urlencoded',
      'origin: https://www.instagram.com',
      'referer: https://www.instagram.com/p/'.$id,
      'sec-ch-prefers-color-scheme: light',
      'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
      'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
      'sec-ch-ua-mobile: ?0',
      'sec-ch-ua-platform: "Windows"',
      'sec-ch-ua-platform-version: "15.0.0"',
      'sec-fetch-dest: empty',
      'sec-fetch-mode: cors',
      'sec-fetch-site: same-origin',
      'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
      'viewport-width: 1010',
      'x-asbd-id: 129477',
      'x-csrftoken: OR5DWTHtqXpToke4xn7AJeShe3PjFQ3I',
      'x-ig-app-id: 936619743392459',
      'x-ig-www-claim: hmac.AR0f1JwKb53JA-shOqn9qfB_dYhGueVJR8SD3UQUoA3BabS3',
      'x-instagram-ajax: 1007725698',
      'x-requested-with: XMLHttpRequest',
  ]);
  curl_setopt($ch, CURLOPT_COOKIE, 'ig_did=CEB3C997-510E-4691-B6E1-1D7B63358A77; datr=yz4PZLsKxltMVPbJnPzJAxJ2; mid=ZCRXgwALAAGpH4ELGUFs8ihTnGwB; ig_nrcb=1; fbm_124024574287414=base_domain=.instagram.com; ds_user_id=49961145101; csrftoken=OR5DWTHtqXpToke4xn7AJeShe3PjFQ3I; dpr=1.25; shbid="14259\\05449961145101\\0541718890709:01f7309010ea12077327704acf4234215fb6d0ab8c882f4972332e7478963615728a3b30"; shbts="1687354709\\05449961145101\\0541718890709:01f7c4f985e5ec2cf6951a3f11efabb9efae31ef64f24e088fed14bc885f5889b2047d89"; sessionid=49961145101%3AMm2sbCH4fuc0UL%3A4%3AAYc7TVpZa40VF-1KCyxHyx23frlEk7jdjIESZUyudw; fbsr_124024574287414=pCJqvWtA1xi_uZ50WKqGkiFkoDwjxzk-th3L0Rsa3fg.eyJ1c2VyX2lkIjoiMTAwMDI2MzE1MDAzMDY3IiwiY29kZSI6IkFRQUFZUkFEZFFYQTBMbDh3U0ROcWYySTktTmhFRmcxemo2R3hSb0V4dzd1WEtzY2xNeldQVHRFSnJPaUJvenRwTmlIUDZ0N0VpT21FaThmQ1dLdW1fdGxjMGY4WFg2WkNoRlV4VXRJd191aHVIWHR6YUo0RWRaQlpKUnF3S083X19Bb05qUmZjTjVkdXhTOGlLUExzUVRTTi02M1JGclZxbjBGeXhrOWtIUElnYnNmWkNVWFMwSDVzQm5YdUVyUkM3NDMyTlhOVzlGa0xJbVE5T3p5QTFvcHpXVDBuVG9VNXBlSlg2QVJmcVNPcFBYanhNUmctaEpCNVZiQ3JtSjVkOUMyNFYyM3dHTk1XTmsyY0RrOHpGQzcyUE80QWNpZUU3a016bGJtVmJNakVfSlV4ZXZ6ZENEMWNDdkNaRkVfVVhQR20wcllCQ1FPM3VuWE1OeE1RLUNfIiwib2F1dGhfdG9rZW4iOiJFQUFCd3pMaXhuallCQUJ5dkZRSnR2R0piWkFDaHdVTjR4TzBGcW54Q0xMdXhsckFSY0NBT2ljMnhiY3VUbVBQTnVNaFl0WkE0QVpBYUsyVEFRYTk3UkxzWkM3U1NYeVBIaE0zRGhaQ2preU5tWkFVRkcxSVNvTTEwQ1dTd0M1Vk1ybjd1dHNaQkE2OWUzOFREb1pBN0tES05qY1lUSHRaQ1hieHlWNm9PRWFGVFJtYWdZTVdPN0RaQlVEMVpDUlg3dERaQWFza1pEIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE2ODc0NDE3MDl9; fbsr_124024574287414=pCJqvWtA1xi_uZ50WKqGkiFkoDwjxzk-th3L0Rsa3fg.eyJ1c2VyX2lkIjoiMTAwMDI2MzE1MDAzMDY3IiwiY29kZSI6IkFRQUFZUkFEZFFYQTBMbDh3U0ROcWYySTktTmhFRmcxemo2R3hSb0V4dzd1WEtzY2xNeldQVHRFSnJPaUJvenRwTmlIUDZ0N0VpT21FaThmQ1dLdW1fdGxjMGY4WFg2WkNoRlV4VXRJd191aHVIWHR6YUo0RWRaQlpKUnF3S083X19Bb05qUmZjTjVkdXhTOGlLUExzUVRTTi02M1JGclZxbjBGeXhrOWtIUElnYnNmWkNVWFMwSDVzQm5YdUVyUkM3NDMyTlhOVzlGa0xJbVE5T3p5QTFvcHpXVDBuVG9VNXBlSlg2QVJmcVNPcFBYanhNUmctaEpCNVZiQ3JtSjVkOUMyNFYyM3dHTk1XTmsyY0RrOHpGQzcyUE80QWNpZUU3a016bGJtVmJNakVfSlV4ZXZ6ZENEMWNDdkNaRkVfVVhQR20wcllCQ1FPM3VuWE1OeE1RLUNfIiwib2F1dGhfdG9rZW4iOiJFQUFCd3pMaXhuallCQUJ5dkZRSnR2R0piWkFDaHdVTjR4TzBGcW54Q0xMdXhsckFSY0NBT2ljMnhiY3VUbVBQTnVNaFl0WkE0QVpBYUsyVEFRYTk3UkxzWkM3U1NYeVBIaE0zRGhaQ2preU5tWkFVRkcxSVNvTTEwQ1dTd0M1Vk1ybjd1dHNaQkE2OWUzOFREb1pBN0tES05qY1lUSHRaQ1hieHlWNm9PRWFGVFJtYWdZTVdPN0RaQlVEMVpDUlg3dERaQWFza1pEIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE2ODc0NDE3MDl9; rur="EAG\\05449961145101\\0541718977756:01f74877b46419368e86cbee2097408cfe2cf1de6f986fc247f91040bdd1939989c43de4"');
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
  $response = curl_exec($ch);
  curl_close($ch);
  $response=json_decode($response,true);
  if(isset($response["status"])){
    if($response["status"]=="ok"){
        $response="success";
    } else {
      $response= "error";
    }
  } else {
    $response= "die";
  }
  return $response;
}
function follow($id,$cookie){
  if(!kiem_tra_so($id)){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/'.$id.'/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'authority: www.instagram.com',
      'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
      'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
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
      'viewport-width: 559',
  ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    $id=explode('"',explode('profile_id":"',$response)[1])[0];
  }
  $csrftoken = explode(';',explode('csrftoken=', $cookie)[1])[0];
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://i.instagram.com/api/v1/web/friendships/'.$id.'/follow/');
	$headers = [
    'x-requested-with: XMLHttpRequest',
    'x-ig-www-claim: hmac.AR2KtRYzNVfelijR0GD6-VLJU3G-vRVGUezuXpjzaQ5m4MmZ',
    'x-ig-app-id: 936619743392459',
    'x-csrftoken: '.$csrftoken.'',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36',
    'x-instagram-ajax: bd344c4b4f36',
    'referer: https://www.instagram.com/'
];
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36');
	curl_setopt($ch, CURLOPT_ENCODING, '');
	curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
	curl_setopt($ch, CURLOPT_POST,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS,array());
	$access = curl_exec($ch);
	curl_close($ch);
  $js=json_decode($access,true);
  if(isset($js["message"])){
    if($js["message"]=="checkpoint_required"){
      return "checkpoint";
    }
  }
  if(isset($js["result"])){
    if($js["status"]=="ok" or $js["result"]=="following"){
    return "success";
    }
  } else {
    return "die";
  }
}
function tym($id,$cookie){
  $csrftoken = explode(';',explode('csrftoken=', $cookie)[1])[0];
$mediaid = shortcode_to_mediaid($id,$cookie);
if($mediaid !==false){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://i.instagram.com/api/v1/web/likes/'.$mediaid.'/like/');
$headers = [
  'x-requested-with: XMLHttpRequest',
  'content-length: 0',
  'content-type: application/x-www-form-urlencoded',
  'x-ig-www-claim: hmac.AR2KtRYzNVfelijR0GD6-VLJU3G-vRVGUezuXpjzaQ5m4MmZ',
  'x-ig-app-id: 936619743392459',
  'x-csrftoken: '.$csrftoken.'',
  'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36',
  'x-instagram-ajax: 1005633491',
  'referer: https://www.instagram.com/'
];
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36');
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,array());
$access = curl_exec($ch);
curl_close($ch);
$a=json_decode($access,true);
if(isset($a["status"])){
  if($a["status"]=="ok"){
    return "success";
  }
}
}else{
  return '';
}
}