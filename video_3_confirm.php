<?php 
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $video_3 = 'Video 3';
        $video_id = 3;
        
        $_SESSION['distraction'] = $_POST['distraction'];
        $_SESSION['sleep'] = $_POST['sleep'];
        
        // DATA SANITATION
        $distraction = mysqli_real_escape_string($connection, $_POST['distraction']);
        $sleep = mysqli_real_escape_string($connection, $_POST['sleep']);
        
        $sql = "UPDATE users SET distraction=?, sleep=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssis", $distraction, $sleep, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_4.php");
        exit();

    } else {
        print 'There was an error while processing the form.';
    } 	
?>