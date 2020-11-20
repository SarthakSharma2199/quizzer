<?php
session_start();
include "config.php";
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
    

</head>

<body>
    <header>
        <div class="container-fluid">
            <h1>PHP-quiz</h1>
            <a href="index.php" class="start">Home</a>
            <a href="admin.php" class="start">Admin Panel</a>

        </div>
    </header>

    <main>
        <div class="container-fluid">
            <h2>Enter Your Name</h2>
            <form method="POST" action="" class="form">
                <input type="name" name="name" required="true">
                <input type="submit" name="submit" value="Start Now">

        </div>


    </main>

    <footer>
        <div class="container-fluid">
            Quizzer-Made using PHP and MySQL
        </div>
    </footer>

</body>

</html>