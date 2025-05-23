<?php
session_start();

include 'connect.php';
include 'model/database.php';

$con = Database::getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $con->prepare('SELECT * FROM users WHERE username = ?');
    $sql->bind_param('s', $username);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        //chuyen thanh hash(password) de kiem tra khop voi md5(password)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'user') {
                header('Location: index.php');
            } else {
                header('Location: signup.php');
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }
}
