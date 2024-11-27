<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .btn {
            border-radius: 20px;
        }
    </style>
</head>

<?php
include 'model/users.php';
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-5">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required
                                placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required
                                placeholder="Enter your password">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary btn-block py-2"><b>LOGIN</b></button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="signup.php" class="btn btn-secondary btn-block py-2"><b>SIGN UP</b></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <a href="forgot.php" class="text-muted">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>