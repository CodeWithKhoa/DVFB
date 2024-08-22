<?php require('../../../../../config/config.php');
if( isset($_GET['mgd'])) {
    $token = check_string($_GET['mgd']);
    $query = $ManhDev->query("SELECT * FROM `account` WHERE `username` = '".$ManhDev->users('username')."' AND `trading` = '$token' ");
    $query_order = $ManhDev->query("SELECT * FROM `orders` WHERE `username` = '".$ManhDev->users('username')."' AND `trading` = '$token' ");
    $array = $query_order->fetch_array();
    $clone = 'Mã Hóa Đơn: '.$array['trading'].' | Sản Phẩm: '.$array['title'].' | Số lượng: '.$array['amount'].' | Giá: '.tien($array['money']).'đ';
    while( $row = $query->fetch_assoc()) {
        $clone = $clone.PHP_EOL.$row['note'];
    }
    $file = $token.".txt";
    $txt = fopen($file, "w") or die("Unable to open file!");
    fwrite($txt, $clone);
    fclose($txt);
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    header("Content-Type: text/plain");
    readfile($file);
    unlink($token.'.txt');
}
?>