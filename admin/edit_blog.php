<link rel="stylesheet" href="style.css">
<?php
include "headerCRUD.php";
include_once "../connect.php";


$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: ./blog.php");
    exit;
}

$query = "SELECT * FROM blogs WHERE id = $id";
$result = mysqli_query($conn, $query);
$blog = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

if (!$blog) {
    header("Location: ./blog.php");
    exit;
}

// set time zone HCM Vietnam
date_default_timezone_set('Asia/Ho_Chi_Minh');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['blog_title']) && isset($_POST['blog_content'])) {
        $blog_title = $_POST['blog_title'];
        $blog_content = $_POST['blog_content'];
        $author = $_POST['author'];
        $blog_file = $_FILES['blog_image']['name'];
        $blog_image = $blog[0]['blog_image'];

        if ($blog_file) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($blog_file);

            // create folder
            if (!file_exists('uploads')) {
                mkdir(dirname('uploads'), 0777, true);
            }

            $blog_image = $target_file;

            move_uploaded_file($_FILES['blog_image']['tmp_name'], $target_file);
        }

        $query = "UPDATE blogs SET blog_title = '$blog_title', blog_content = '$blog_content', author = '$author', blog_image = '$blog_image' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: ./blog.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./summernote/summernote-bs5.min.css">
    <script src="./summernote/summernote-bs5.min.js"></script>

    <title>Cập nhật bài viết</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h1>Cập nhật bài viết</h1>
                    </div>
                </div>

                <a href="./blog.php" class="btn btn-primary mt-2">Quay về</a>

                <div class="mt-5">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="author" class="form-label">Tác giả</label>
                            <input type="text" name="author" class="form-control"
                                value="<?php echo $blog[0]['author']; ?>" autofocus id="author"
                                aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Vui lòng không nhập kí tự đặc biệt</div>
                        </div>

                        <div class="mb-3">
                            <label for="blog_title" class="form-label">Tiêu đề</label>
                            <input type="text" name="blog_title" class="form-control"
                                value="<?php echo $blog[0]['blog_title']; ?>" id="blog_title"
                                aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Vui lòng không nhập kí tự đặc biệt</div>
                        </div>

                        <div class="mb-3">
                            <label for="blog_image" class="form-label">Ảnh bài viết</label>
                            <input type="file" name="blog_image" class="form-control" id="blog_image"
                                aria-describedby="emailHelp">

                            <div style="width: 200px; height: 200px; margin-top: 10px;border: 1px solid #ccc">
                                <img src="./<?= $blog[0]['blog_image']; ?>" alt="" class="w-100 h-100 object-fit-cover">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="blog_content" class="form-label">Nội dung</label>

                            <textarea required id="editor"
                                name="blog_content"><?php echo $blog[0]['blog_content']; ?></textarea>
                        </div>

                        <button name="submit" type="submit" class="btn btn-success">Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendFile(file, editor, welEditable) {

            const data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "upload.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function (url) {
                    $('#editor').summernote("insertImage", url);
                }
            });

            return false;
        }

        $(document).ready(function () {
            $('#editor').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    }
                }
            });
        });
    </script>
</body>

</html>