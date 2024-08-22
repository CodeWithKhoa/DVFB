<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://4gsoftbank.com/api/v1/passport/api/register');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'authority: 4gsoftbank.com',
    'accept: */*',
    'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
    'cache-control: no-cache',
    'content-language: vi-VN',
    'content-type: application/x-www-form-urlencoded',
    'origin: https://4gsoftbank.com',
    'pragma: no-cache',
    'referer: https://4gsoftbank.com/',
    'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
   // 'accept-encoding: gzip',
]);
curl_setopt($ch, CURLOPT_COOKIE, 'cf_clearance=PQR9OPUOnnZd3cd05EOvyi.OrjVKfv2LBdzYKvlazOA-1691832605-0-1-5587dc84.f18e0fee.98fc93f2-0.2.1691832605');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.random().'%40gmail.com&password=kdafgjkkgfjd&invite_code=&email_code=');

$response = curl_exec($ch);

curl_close($ch);
echo $response;
function random(){
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    
    $email = '';
    
    // Generate random username
    for ($i = 0; $i < 6; $i++) {
        $email .= $alphabet[rand(0, strlen($alphabet) - 1)];
    }
    
    // Generate random numbers for username
    for ($i = 0; $i < 3; $i++) {
        $email .= $numbers[rand(0, strlen($numbers) - 1)];
    }
    
    // Append Gmail domain
    //$email .= '@gmail.com';
    return $email;
}