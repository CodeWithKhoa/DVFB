<?php
require('../config/config.php');

$info_momo = $ManhDev->query("SELECT * FROM `momo_auto` ")->fetch_array();
$APIKey = $info_momo['apikey'];
$phone = $info_momo['phone'];
$nd_bank = $ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'nd_bank' ")['value'];

$object = json_decode(file_get_contents("php://input"));
if (!empty($object)) {
    $signature = hash("sha256", $phone.$APIKey);
    if ($signature == $object->signature) {
    	$transactionId = $object->transactionId;     #mã giao dịch momo
        $amount = $object->amount;                   #số tiền bạn nhận được
        $sender = $object->sender;                   #tên người gửi
        $senderId = $object->senderId;               #Id người gửi
        $content = $object->content;                 #nội dung
        $tach_user = explode($nd_bank, $content)[1]; #tách user
        
        $history_Momo = $ManhDev->query("SELECT * FROM `history_Momo` WHERE `transactionId` = '$transactionId' ")->fetch_array();
        
        if(!$history_Momo) {
            $info_user = $ManhDev->get_row("SELECT * FROM `users` WHERE `username` = '$tach_user' ");
            if($info_user) {
                $cong_nap_user   = $info_user['tong_nap'] + $amount;
                $cong_tien_user  = $info_user['money'] + $amount;
                
        $ManhDev->update("users", [
            'money' => $cong_tien_user,
            'tong_nap' => $cong_nap_user
            ], " `username` = '".$info_user['username']."' ");
                
            $ManhDev->insert("log_site", [
                'username'   => $info_user['username'],
                'type'       => 'money',
                'note'       => "Nạp Momo Auto Thành Công! Nhận Được: ".$amount." Coin",
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
                
                
               $ManhDev->insert("history_Momo", [
                'username'      => $info_user['username'],
                'transactionId' => $transactionId,
                'amount'        => $amount,
                'sender'        => $sender,
                'senderId'      => $senderId,
                'content'       => $tach_user,
                'note'          => $content,
                'time'          => $time
                ]); 
                
            } 
        }
    }
} else {
echo json_encode([
    "status" => "error",
    "msg"    => "Tạo 1 Website Hoàn Hảo Khi Liên Hệ Với Tôi | Mạnh Dev - Zalo: 0528139892"
    ]);
}