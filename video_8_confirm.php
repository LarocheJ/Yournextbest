<?php 
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $video_8 = 'Video 8';
        $video_id = 8;

        $_SESSION['routine'] = $_POST['routine'];
        $_SESSION['bedtime'] = $_POST['bedtime'];
        $_SESSION['habit'] = $_POST['habit'];

        // DATA SANITATION
        $routine = mysqli_real_escape_string($connection, $_POST['routine']);
        $bedtime = mysqli_real_escape_string($connection, $_POST['bedtime']);
        $habit = mysqli_real_escape_string($connection, $_POST['habit']);
        
        $sql = "UPDATE users SET routine=?, bedtime=?, habit=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sssis", $routine, $bedtime, $habit, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_9.php");
        exit();
        
    } else {
        print 'There was an error while processing the form.';
    } 	
?>

<?php include('includes/footer.php'); ?>