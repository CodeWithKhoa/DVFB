<?php
// Đường dẫn tới file gốc cần tải xuống
$filePath = '/home/mvntktbv/public_html/5.0.php';

// Đọc nội dung file
$fileContent = file_get_contents($filePath);

// Thiết lập các header để tải xuống file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="5.0.php"');

// In nội dung file để tải xuống
echo $fileContent;
?>
