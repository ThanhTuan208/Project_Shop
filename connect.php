<?php
// Cấu hình cơ sở dữ liệu
if (!defined('DB_NAME')) {
    define('DB_NAME', 'sales');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}
if (!defined('PORT')) {
    define('PORT', '3306');
}
if (!defined('DB_CHARSET')) {
    define('DB_CHARSET', 'utf8');
}

// Tạo kết nối
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, PORT);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Đặt charset (nếu cần)
$conn->set_charset(DB_CHARSET);
?>
