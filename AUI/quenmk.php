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
if (isset($_POST['nutguiyeucau']) == true) {
  $email = $_POST['email'];
  $conn = new PDO("mysql:host=localhost;dbname=sales;charset=utf8", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT* FROM users WHERE email =?";
  $conn->prepare($sql);
  $stmt = $conn->prepare($sql);
  $stmt->execute([$email]);
  $count = $stmt->rowCount();
  if ($count == 0) {
    $loi = "Email ban chua dang ki thanh vien";
  } else {
    $matkhaumoi = substr(md5(rand(0, 999999)), 0, 8);
    $sql = "UPDATE users SET matkhau=? WHERE email =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$matkhaumoi, $email]);
    // echo "da cap nhat ";
    $kq = GuiGmail($email, $matkhaumoi);
    if ($kq == true) {
      echo "Tin nhắn email đã được gửi đến cho bạn ";
    } else {

    }
  }
}
?>
<?php
function GuiGmail($email, $matkhaumoi)
{
  require "PHPMailer-master/src/PHPMailer.php";
  require "PHPMailer-master/src/SMTP.php";
  require 'PHPMailer-master/src/Exception.php';
  $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
  try {
    $mail->SMTPDebug = 0; //0,1,2: chế độ debug
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = 'smtp.gmail.com';  //SMTP servers
    $mail->SMTPAuth = true; // Enable authentication
    $mail->Username = 'phamngochoai04@gmail.com'; // SMTP username
    $mail->Password = 'leov ebju sqjq pgws';   // SMTP password
    $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
    $mail->Port = 465;  // port to connect to                
    $mail->setFrom('phamngochoai04@mail.com', 'admin');
    $mail->addAddress($email);
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Tiêu đề thư gui mat khau';
    $noidungthu = "mat khau cua ban la {$matkhaumoi}";
    $mail->Body = $noidungthu;
    $mail->smtpConnect(array(
      "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
        "allow_self_signed" => true
      )
    ));
    $mail->send();
    return true;

  } catch (Exception $e) {
    echo 'Error: ', $mail->ErrorInfo;
    return false;
  }

}
?>

<body>
  <form method="post" style="width: 600px;" class="form1 border border-2 m-auto p-2">
    <h1 style="text-align: center; margin: 10px">Forget Password </h1>
    <?php if ($loi != "") { ?>
      <div class="alert alert alert-danger"><?= $loi ?></div>
    <?php } ?>

    <label for="email" class="form-label">Nhập Email</label>
    <input type="email" value="<?php if (isset($email) == true)
      echo $email ?>" class="form-control" id="email" name="email">
      </div>
      <div class="d-flex justify-content-center m-4">
        <button type="submit" name="nutguiyeucau" value="nutyeucaugui" class="bn5 btn btn-primary">Gửi yêu cầu</button>
      </div>
    </form>

  </body>

  </html>