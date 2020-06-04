<?php 
    require('includes/connection.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $video_10 = 'Video 10';
        $video_id = 10;

        $_SESSION['difference'] = $_POST['difference'];

        // DATA SANITATION
        $difference = mysqli_real_escape_string($connection, $_POST['difference']);
        
        $sql = "UPDATE users SET difference=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sis", $difference, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: welcome.php");
        exit();
        
    } else {
        print 'There was an error while processing the form.';
    } 	
?>