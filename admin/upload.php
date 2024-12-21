<?php

if ($_FILES['file']['name']) {
    $filename = $_FILES['file']['name'];
    $tmpname = $_FILES['file']['tmp_name'];
    $path = "uploads/" . $filename;

    // check if file already exists
    if (!file_exists("uploads")) {
        // create folder
        mkdir(dirname("uploads"), 0777, true);
    }

    move_uploaded_file($tmpname, $path);
    echo $path;
}
