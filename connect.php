<?php
/** The name of the database*/
define('DB_NAME', 'sales');
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** port number of DB */
define('PORT', '3306');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, PORT);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Đặt charset (nếu cần)
$conn->set_charset(DB_CHARSET);

