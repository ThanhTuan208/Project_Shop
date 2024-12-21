<link rel="stylesheet" href="style.css">
<?php
include_once "../connect.php";
// set time zone HCM Vietnam
date_default_timezone_set('Asia/Ho_Chi_Minh');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['blog_title']) && isset($_POST['blog_content'])) {
        $blog_title = $_POST['blog_title'];
        $blog_content = $_POST['blog_content'];
        $author = $_POST['author'];
        $blog_file = $_FILES['blog_image']['name'];
        $blog_image = "";

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

        $blog_date = date("Y-m-d H:i:s");

        $query = "INSERT INTO blogs(blog_title, blog_content, blog_date, author, blog_image) VALUES('$blog_title', '$blog_content', '$blog_date', '$author', '$blog_image')";
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

    <title>Thêm bài viết</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->

            <?php include "sidebar.php"; ?>


            <!-- Content -->
            <div class="col-12 col-md-9 p-4">
                <h1>Thêm bài viết</h1>
                <a href="./blog.php" class="btn btn-primary mt-2">Quay về</a>

                <!-- Form thêm bài viết -->
                <div class="mt-4">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="author" class="form-label">Tác giả</label>
                            <input type="text" name="author" class="form-control" autofocus id="author" required>
                            <div class="form-text">Vui lòng không nhập kí tự đặc biệt</div>
                        </div>

                        <div class="mb-3">
                            <label for="blog_title" class="form-label">Tiêu đề</label>
                            <input type="text" name="blog_title" class="form-control" id="blog_title" required>
                            <div class="form-text">Vui lòng không nhập kí tự đặc biệt</div>
                        </div>

                        <div class="mb-3">
                            <label for="blog_image" class="form-label">Ảnh bài viết</label>
                            <input type="file" name="blog_image" class="form-control" id="blog_image" required>
                        </div>

                        <div class="mb-3">
                            <label for="blog_content" class="form-label">Nội dung</label>
                            <textarea id="editor" name="blog_content" required></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success">Xuất bản</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Editor -->
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