<?php 
session_start();
include "config.php";
if (isset($_SESSION['id'])) {
   
	if(!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;
	}

    if ($_POST) {
            $qno = $_POST['number'];
            $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
            $selected_choice = $_POST['choice'];
            $nextqno = $qno + 1;

            $query = "SELECT correct_ans FROM questions WHERE qid= '$qno' ";
            $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($run) > 0) {
                $row = mysqli_fetch_array($run);
                $correct_answer = $row['correct_ans'];
            }
            if ($correct_answer == $selected_choice) {
                $_SESSION['score']++;
            }

            $query1 = "SELECT * FROM questions ";
            $run = mysqli_query($conn, $query1) or die(mysqli_error($conn));
            $totalqn = mysqli_num_rows($run);

            if ($qno == $totalqn) {
                header("location: results.php");
            } else {
                header("location: question.php?n=" . $nextqno);
            }
        }
    else {
        header("location: home.php");
    }
    } 
    else {
    header("location: home.php");
}
?>