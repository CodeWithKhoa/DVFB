<?php
function getid($url) {
    $apiUrl = 'https://id.traodoisub.com/api.php';

    // Dữ liệu truyền vào cho API, mã hóa dưới dạng form data
    $postData = array(
        'link' => $url,
    );

    // Cấu hình cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

    // Thêm các header như trong yêu cầu
    $headers = array(
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-mobile: ?0',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
        'Accept: application/json, text/javascript, */*; q=0.01',
        'Referer: https://id.traodoisub.com/',
        'X-Requested-With: XMLHttpRequest',
        'sec-ch-ua-platform: "Windows"'
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Gửi yêu cầu cURL và nhận kết quả trả về
    $response = curl_exec($ch);

    // Kiểm tra lỗi nếu có
    if (curl_errno($ch)) {
        echo 'Lỗi cURL: ' . curl_error($ch);
    }

    // Đóng cURL
    curl_close($ch);

    // Xử lý kết quả trả về từ API
    $data = json_decode($response, true);
    return $data['id'];
}

// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ trường input có name="idpost"
    $url_or_uid = $_POST['idpost'];

    // Gọi hàm lấy ID từ URL
    $id = getid($url_or_uid);

    // Kiểm tra xem có lấy được ID từ URL không
    if ($id !== null) {
        echo $id;
    } else {
        echo "Link không tồn tại hoặc chưa để chế độ công khai.";
    }
}
?>