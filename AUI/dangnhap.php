<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="cssButton.css">
<link rel="stylesheet" href="style1.css">

<?php
session_start();
if (isset($_POST['nutdangnhap'])) {
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $conn = new PDO("mysql:host=localhost;dbname=sales;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE tendangnhap =? AND matkhau=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tendangnhap, $matkhau]);

    if ($stmt->rowCount() == 1) {
        $users = $stmt->fetch();
        $_SESSION['login_id'] = $users['id'];
        $_SESSION['login_user'] = $users['tendangnhap'];

        if ($_SESSION['login_user'] != "admin") {
            header("location:../index.php");
        } else
            header("location:../admin/itemProducts.php");
        exit();
    } else {
        header("location:dangnhap.php");
        exit();
    }
}
if (isset($_POST['nutdangki'])) {
    header("location:register.php");
}
if (isset($_POST['nutquenmk'])) {
    header("location:quenmk.php");
}

?>
<div class="container">
    <form method="post" style="width:600px" class="form1 border border-2 rounded m-auto p-2"
        onsubmit="return validateForm()">
        <h1 style="text-align: center;">Sign In</h1>
        <div class="mb-3">
            <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
            <input type="text" value="<?php if (isset($tendangnhap))
                echo $tendangnhap; ?>" class="form-control" id="tendangnhap" name="tendangnhap"
                placeholder="Nhập tên đăng nhập" required>
        </div>
        <div class="mb-3">
            <label for="matkhau" class="form-label">Mật khẩu</label>
            <input type="password" value="<?php if (isset($matkhau))
                echo $tendangnhap; ?>" class="form-control" id="matkhau" name="matkhau" placeholder="Nhập mật khẩu"
                required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="nho" name="nho" required>
            <label class="form-check-label" for="nho">Ghi nhớ </label>
        </div>
        <input type="hidden" id="id" name="id">
        <div class="d-flex justify-content-center m-3">
            <button type="submit" name="nutdangnhap" value="dn" class="bn5 btn btn-primary mx-2">Đăng nhập</button>
        </div>
    </form>

    <form method="post" style="width:600px" class="form2 p-2">
        <div class="d-flex justify-content-center">
            <button type="submit" name="nutdangki" value="dn" class="bn5 btn btn-primary mx-2">Đăng Kí</button>
            <button type="submit" name="nutquenmk" value="dn" class="bn5 btn btn-primary mx-2">Quên Mật Khẩu</button>
        </div>
    </form>
</div>
<script>
    function validateForm() {
        var username = document.getElementById("tendangnhap").value;
        var password = document.getElementById("matkhau").value;
        var checkbox = document.getElementById("nho").checked;
        if (username === "" || password === "" || !checkbox) {
            alert("Vui lòng điền đầy đủ thông tin và chọn ô 'Ghi nhớ'."); return false;
        }
    } 
</script>