<?php
session_start();
include "config.php";
if (isset($_SESSION['admin'])) {
    header("location: admin/adminhome.php");
}
if (isset($_POST['password'])) {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
    if (password_verify($password, $adminpass)) {
        $_SESSION['admin'] = "active";
        header("Location: admin/adminhome.php");
    } else {
        echo  "<script> alert('wrong password');</script>";
    }
}


?>



<html>

<head>
    <title>PHP Quizzer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/main.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light shadow rounded">
            <a class="navbar-brand" href="index.php">PHP Quizzer</a>
            <a class="nav-link" href="admin.php">Admin Login</a>
        </nav>
    </header>

    <main>
        <div class="container h-100 d-flex justify-content-center form-group">

            <form method="POST" action="" class="shadow rounded p-5 my-auto text-center">
                <h3>Enter Password</h3>

                <input type="password" name="password" required="true" class="form">
                <input type="submit" name="submit" value="Login" class="btn btn-secondary">
            </form>


        </div>


    </main>

    <footer class="footer fixed-bottom">
        <div class="container-fluid text-right">
            <span>
                Quizzer-Made using PHP, Bootstrap and MySQL
            </span>

        </div>
    </footer>

</body>

</html>