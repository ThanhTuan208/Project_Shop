<?php

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: ./blog.php");
    exit;
}


include_once "../connect.php";


$query = "DELETE FROM blogs WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: ./blog.php");
}

mysqli_close($conn);
