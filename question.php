<?php
session_start();
include "config.php";
if (isset($_SESSION['id'])) {

    if (isset($_GET['n']) && is_numeric($_GET['n'])) {
        $qno = $_GET['n'];
        if ($qno == 1) {
            $_SESSION['quiz'] = 1;
        }
    } else {
        header('location: question.php?n=' . $_SESSION['quiz']);
    }
    if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == $qno) {
        $query = "SELECT * FROM questions WHERE qid = '$qno'";
        $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($run) > 0) {
            $row = mysqli_fetch_array($run);
            $qno = $row['qid'];
            $question = $row['question'];
            $opt1 = $row['opt1'];
            $opt2 = $row['opt2'];
            $opt3 = $row['opt3'];
            $opt4 = $row['opt4'];
            $correct_answer = $row['correct_ans'];
            $_SESSION['quiz'] = $qno;
            $checkqsn = "SELECT * FROM questions";
            $runcheck = mysqli_query($conn, $checkqsn) or die(mysqli_error($conn));
            $countqsn = mysqli_num_rows($runcheck);
        } else {
            echo "<script> alert('something went wrong');
			window.location.href = 'home.php'; </script> ";
        }
    } else {
        echo "<script> alert('error');
			window.location.href = 'home.php'; </script> ";
    }
?>
    <?php
    $total = "SELECT * FROM questions ";
    $run = mysqli_query($conn, $total) or die(mysqli_error($conn));
    $totalqn = mysqli_num_rows($run);

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
                <div >Question <?php echo $qno; ?> of <?php echo $totalqn; ?></div>
                <p><?php echo $question; ?></p>
                <form method="post" action="checker.php">
                    <ul>
                        <li><input name="choice" type="radio" value="a" required=""><?php echo $opt1; ?></li>
                        <li><input name="choice" type="radio" value="b" required=""><?php echo $opt2; ?></li>
                        <li><input name="choice" type="radio" value="c" required=""><?php echo $opt3; ?></li>
                        <li><input name="choice" type="radio" value="d" required=""><?php echo $opt4; ?></li>

                    </ul>
                    <input type="submit" value="Submit" class="btn btn-primary">
                    <input type="hidden" name="number" value="<?php echo $qno; ?>">
                    <br>
                    <br>
                    <a href="results.php" class="btn btn-primary">End Quiz</a>
                </form>
            </div>
        </main>
    </body>

    </html>

<?php } else {
    header("location: home.php");
}
?>