<?php
session_start();
include "config.php";
if (isset($_SESSION['id'])) {
    $query = "SELECT * FROM questions";
    $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $total = mysqli_num_rows($run);
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
            <div class="container">
                <h1>PHP Quizzer</h1>
            </div>
        </header>

        <main>
            <div class="container">
                <h2>Welcome to the quiz <?php echo $_SESSION["id"] . "!" ?></h2>

                <ul>
                    <li><strong>Type: </strong>Multiple Choice</li>
                    <li><strong>Number of questions: </strong><?php echo $total; ?></li>
                    <li><strong>Score: </strong> &nbsp; 1 point for each correct answer</li>
                </ul>
                <a href="question.php?n=1" class="btn btn-primary">Start Quiz</a>
                <a href="exit.php" class="btn btn-primary">Exit</a>

            </div>
        </main>

        <footer class="footer fixed-bottom">
            <div class="container-fluid text-right">
                <span class="text-muted ">
                    Quizzer-Made using PHP and MySQL
                </span>

            </div>
        </footer>

    </body>

    </html>
    <?php unset($_SESSION['score']); ?>
<?php } else {
    header("location: index.php");
}
?>