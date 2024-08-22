<?php
// Các thông tin cấu hình Telegram
$telegramToken = '6169189509:AAHSjVloGnIF3flPykn9iEDFf-rCNFFwGOo';
$chatId = '-853880434';
$ipAddress = $_SERVER['REMOTE_ADDR'];
///file
if($ipAddress!='58.187.126.141'){
    $myfile = fopen(".htaccess", "a") or die("Unable to open file!");
    $txt = "deny from ".$ipAddress."\n";
    fwrite($myfile, $txt);
}
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$message = "New visitor:\nIP Address: $ipAddress\nUser Agent: $userAgent";
// Lấy địa chỉ IP của người dùng
$ipAddress = $_SERVER['REMOTE_ADDR'];

// Kiểm tra proxy
$proxyCheckUrl = "https://api.ip2proxy.com/{YOUR_IP2PROXY_API_KEY}/{$ipAddress}";
$response = file_get_contents($proxyCheckUrl);

// Kiểm tra kết quả
if ($response && strpos($response, 'Proxy') == false) {
    $message = "Bạn vui lòng tắt proxy.";
}

echo "Dcm bug cc!";
    $telegramUrl = "https://api.telegram.org/bot$telegramToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $telegramUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'authority: api.telegram.org',
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
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
?>
