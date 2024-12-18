<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="cssButton.css">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <?php
    if (isset($_POST['btndangki'])) {
        $tendangnhap = $_POST['tendangnhap'];
        $matkhau = $_POST['matkhau'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];

        $conn = new PDO("mysql:host=localhost;dbname=sales;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users SET tendangnhap =?, matkhau=?,email=?,phone = ?";
        $st = $conn->prepare($sql);
        $st->execute([$tendangnhap, $matkhau, $email, $sdt]);

        header("location:dangnhap.php");
    }
    ?>
    <form style="width: 600px" class="form1 border border-2 rounded m-auto p-2" method="post">
        <h1 style="text-align: center;">Sign Up</h1>
        <label for="email" class="form-label">Tài Khoản Gmail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập tên đăng nhập">
        <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
        <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" placeholder="Nhập tên đăng nhập">
        <label for="matkhau" class="form-label">Số điện thoại</label>
        <input type="number" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại">
        <label for="matkhau" class="form-label">Mật Khẩu </label>
        <input type="text" class="form-control" id="matkhau" name="matkhau" placeholder="Nhập tên đăng nhập"
            autocomplete="new-password">
        <br><br>

        <div class="d-flex justify-content-center">
            <button type="sunmit " name="btndangki" value="nut" class="bn5 btn btn-primary"> Đăng Kí </button>
        </div>

    </form>

</body>

</html>