<?php session_start(); ?>
<?php include "../config.php";
if (isset($_SESSION['admin'])) {

    if (isset($_POST['submit'])) {
        $question = htmlentities(mysqli_real_escape_string($conn, $_POST['question']));
        $choice1 = htmlentities(mysqli_real_escape_string($conn, $_POST['choice1']));
        $choice2 = htmlentities(mysqli_real_escape_string($conn, $_POST['choice2']));
        $choice3 = htmlentities(mysqli_real_escape_string($conn, $_POST['choice3']));
        $choice4 = htmlentities(mysqli_real_escape_string($conn, $_POST['choice4']));
        $correct_answer = mysqli_real_escape_string($conn, $_POST['answer']);


        $checkqsn = "SELECT * FROM questions";
        $runcheck = mysqli_query($conn, $checkqsn) or die(mysqli_error($conn));
        $qno = mysqli_num_rows($runcheck) + 1;

        $query = "INSERT INTO questions(qid, question , opt1, opt2, opt3, opt4, correct_ans) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') ";
        $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('Question successfully added'); </script> ";
        } else {
            "<script>alert('error, try again!'); </script> ";
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
        <link rel="stylesheet" href="../assets/main.css">
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    </head>

    <body>
        <header>
            <nav class="navbar navbar-light bg-light shadow rounded">
                <a class="navbar-brand" href="../index.php">PHP Quizzer</a>
                <a class="nav-link" href="../admin.php">Admin Login</a>
            </nav>
        </header>

        <main>
            <div class="container h-100 d-flex justify-content-center">
                <div class="my-auto text-center shadow rounded p-5">
                    <h2>Add a question</h2>
                    <form method="post" action="">

                        <p>
                            <label>Question</label>
                            <input type="text" name="question" required="true">
                        </p>
                        <p>
                            <label>Choice 1</label>
                            <input type="text" name="choice1" required="true">
                        </p>
                        <p>
                            <label>Choice 2</label>
                            <input type="text" name="choice2" required="true">
                        </p>
                        <p>
                            <label>Choice 3</label>
                            <input type="text" name="choice3" required="true">
                        </p>
                        <p>
                            <label>Choice 4</label>
                            <input type="text" name="choice4" required="true">
                        </p>
                        <p>
                            <label>Correct answer</label>
                            <select name="answer">
                                <option value="a">Choice 1 </option>
                                <option value="b">Choice 2</option>
                                <option value="c">Choice 3</option>
                                <option value="d">Choice 4</option>
                            </select>
                        </p>
                        <p>

                            <input type="submit" name="submit" value="Add Question" class="btn btn-secondary">

                        </p>
                        <a href="adminhome.php" class="btn btn-secondary ">Go Back</a>
                    </form>
                </div>


            </div>
        </main>



    </body>

    </html>

<?php } else {
    header("location: admin.php");
}
?>