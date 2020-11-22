<?php session_start(); ?>
<?php include "../config.php";
if (isset($_SESSION['admin'])) {
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

        <div class="container h-100 d-flex justify-content-center">
            <div class="my-auto text-center shadow rounded p-5">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Question</th>
                            <th>Option1</th>
                            <th>Option2</th>
                            <th>Option3</th>
                            <th>Option4</th>
                            <th>Correct Answer </th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $query = "SELECT * FROM questions ORDER BY qid ASC";
                        $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        if (mysqli_num_rows($select_questions) > 0) {
                            while ($row = mysqli_fetch_array($select_questions)) {
                                $qno = $row['qid'];
                                $question = $row['question'];
                                $option1 = $row['opt1'];
                                $option2 = $row['opt2'];
                                $option3 = $row['opt3'];
                                $option4 = $row['opt4'];
                                $Answer = $row['correct_ans'];
                                echo "<tr>";
                                echo "<td>$qno</td>";
                                echo "<td>$question</td>";
                                echo "<td>$option1</td>";
                                echo "<td>$option2</td>";
                                echo "<td>$option3</td>";
                                echo "<td>$option4</td>";
                                echo "<td>$Answer</td>";
                                echo "<td> <a href='editquestion.php?qno=$qno'> Edit </a></td>";

                                echo "</tr>";
                            }
                        }
                        ?>

                    </tbody>

                </table>
                <div class="row mx-auto text-center justify-content-center mt-3">
                    <a href="adminhome.php" class="btn btn-secondary ">Go Back</a>
                </div>
            </div>

        </div>
    </body>

    </html>

<?php } else {
    header("location: ../admin.php");
}
?>