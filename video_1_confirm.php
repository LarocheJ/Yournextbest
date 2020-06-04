<?php
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $video_1 = 'Video 1';
        $video_id = 1;
        
        $_SESSION['priorities'] = $_POST['priorities'];

        // DATA SANITATION
        $journal = mysqli_real_escape_string($connection, $_POST['journal']);
        $priorities = mysqli_real_escape_string($connection, $_POST['priorities']);
        
        $sql = "UPDATE users SET journal=?, priorities=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssis", $journal, $priorities, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_2.php");
        exit();
    }
        
?>