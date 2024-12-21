<?php
require "AUI/PHPMailer-master/src/PHPMailer.php";
require "AUI/PHPMailer-master/src/SMTP.php";
require "AUI/PHPMailer-master/src/Exception.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="cssButton.css">
    <link rel="stylesheet" href="style1.css">
</head>
<?php
$loi = "";
if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $conn = new PDO("mysql:host=localhost;dbname=sales;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT* FROM users WHERE email =?";
    $conn->prepare($sql);
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $loi = "Tài khoản email $email không tồn tại";
    } else {

        $kq = GuiGmail($email);
        if ($kq) {
            echo "Tin nhắn email đã được gửi đến cho bạn ";
        } else {

        }
    }
}
?>
<?php
function GuiGmail($email)
{

    try {
        // Khởi tạo PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        // Cấu hình SMTP
        $mail->isHTML(true);
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tuanthichthucung@gmail.com';
        $mail->Password = 'hpny voyz kbna hudk';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Kiểm tra và làm sạch dữ liệu đầu vào
        $email = $_POST['email'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if (!$email) {
            die('Email không hợp lệ.');
        }

        // Cấu hình thông tin người gửi và người nhận
        $mail->setFrom('tuanthichthucung@gmail.com', 'Website Admin');
        $mail->addReplyTo($email, $name); // Người nhận có thể trả lời
        $mail->addAddress($email);

        // Cấu hình nội dung email
        $mail->Subject = 'Thông tin được gửi qua Contact_Us';
        $title = " <h1>Xin chào admin, đây là thông tin khách hàng gửi đến bạn.</h1>";
        $body = "<strong>Tôi là: </strong> $name <br> <strong>Nội dung: </strong> $subject <br> <strong>Thông tin khách hàng: </strong> $message";
        $mail->Body = $title . " <br> " . $body;

        // Gửi email
        $mail->send();
        header('Location: contact.php');
        return true;
    } catch (Exception $e) {
        echo 'Lỗi khi gửi email: ', $mail->ErrorInfo;
        return false;
    }

}
?>