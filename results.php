<?php
session_start();
include "config.php";
if (isset($_SESSION['id'])) {
?>
    <?php if (!isset($_SESSION['score'])) {
        header("location: question.php?n=1");
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
            <div class="container h-100 d-flex justify-content-center">
                <div class="my-auto shadow rounded p-5">
                    <h2>Quiz Ended</h2>
                    <p>You have successfully completed the quiz</p>
                    <p>Total Questions:
                        <?php
                        $total = "SELECT * FROM questions ";
                        $run = mysqli_query($conn, $total) or die(mysqli_error($conn));
                        $totalqn = mysqli_num_rows($run);
                        echo $totalqn;
                        ?>
                    </p>
                    <p>Correct answer count: <?php
                                                echo $_SESSION['score'];
                                                ?>
                    </p>
                    <p>
                        Incorrect answer count: <?php echo ($totalqn - $_SESSION['score']);
                                                ?>
                    </p>


                    <a href="home.php" class="btn btn-secondary">Go Home</a>

                </div>
                
            </div>
        </main>
    </body>

    </html>


<?php } else {
    header("location: home.php");
}
?>