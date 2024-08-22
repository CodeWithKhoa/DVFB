<?php
# API Momo Auto Cho Danh Mục Chẵn Lẻ Tại Thanh Menu
# Link Của Đường Dẫn Là: https://tên_miền_của_bạn}/api/service/momo
# Ví Dụ: https://keyvip.net/api/service/momo ***
# Điền Link Website Của Bạn Vào Chỗ Callback Của Web momo.k04team.com Nha
# Api Momo Được Đấu Qua https://momo.k04team.com (Rẻ Nhất và OK Nhất)

include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$info_momo = $ManhDev->query("SELECT * FROM `accmomo` ")->fetch_array();

$APIKey = $info_momo['apikey'];
$phone = $info_momo['phone'];
$object = json_decode(file_get_contents("php://input"));
if (!empty($object)) {
    $signature = hash("sha256", $phone.$APIKey);
    
    if ($signature == $object->signature) {
    	$transactionId = $object->transactionId;     #mã giao dịch momo
        $amount        = $object->amount;            #số tiền bạn nhận được
        $sender        = $object->sender;            #tên người gửi
        $senderId      = $object->senderId;          #Id người gửi
        $content       = $object->content;           #nội dung
        $tachCl        = $content;                   #chẵn hoặc lẻ
        $tachmgd       = substr($transactionId, -1); #check số cuối mgd
        
    if($tachCl == 'C' || $tachCl ==  'c' || $tachCl ==  'l' || $tachCl ==  'L') {
      if($tachCl == 'C' || $tachCl ==  'c') {
          if($tachmgd %2 == 0) {
        $sotien = $amount * 2;
        $amount1 = intval("$sotien");
        $arr = array(
            "APIKey" => $APIKey,
            "phone" => $phone,
            "receiver" => $senderId,
            "amount" => $amount1,
            "content" => "Trả Thường Phiên Chẵn, Đánh To Thắng To Nha",
);

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://momo.k04team.com/api/v2/chuyen-tien.asp",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($arr),
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
    ),
));

$response = json_decode(curl_exec($curl));
curl_close($curl);
$status = $response->status; #trạng thái
$msg = $response->msg;       #nội dung lỗi
if ($status == "success") {
	$transId = $response->transId;
	$balance = $response->balance;
	
	$ManhDev->insert("history_CLmomo", [
                'phone'         => "Hacker",
                'money'         => $amount,
                'receiveMoney'  => $sotien,
                'note'          => $tachCl,
                'time'          => $time
                ]);
} else { } 

      }
    } } else if($tachCl == 'L' || $tachCl ==  'l') {
             if($tachmgd %2 != 0) {
        $sotien = $amount * 2;
        $amount1 = intval("$sotien");
        $arr = array(
            "APIKey" => $APIKey,
            "phone" => $phone,
            "receiver" => $senderId,
            "amount" => $amount1,
            "content" => "Trả Thường Phiên Lẻ, Đánh To Thắng To Nha",
);

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://momo.k04team.com/api/v2/chuyen-tien.asp",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($arr),
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
    ),
));

$response = json_decode(curl_exec($curl));
curl_close($curl);
$status = $response->status; #trạng thái
$msg = $response->msg;       #nội dung lỗi
if ($status == "success") {
	$transId = $response->transId;
	$balance = $response->balance;
	
	$ManhDev->insert("history_CLmomo", [
                'phone'         => "Hacker",
                'money'         => $amount,
                'receiveMoney'  => $sotien,
                'note'          => $tachCl,
                'time'          => $time
                ]);
} else { } 
        }
    }
  }
}






