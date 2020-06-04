<?php
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $video_4 = 'Video 4';
        $video_id = 4;
        
        $_SESSION['confidence'] = $_POST['confidence'];
        $_SESSION['joy'] = $_POST['joy'];

        // DATA SANITATION
        $confidence = mysqli_real_escape_string($connection, $_POST['confidence']);
        $joy = mysqli_real_escape_string($connection, $_POST['joy']);
        
        $sql = "UPDATE users SET confidence=?, joy=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssis", $confidence, $joy, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_5.php");
        exit();
        
    } else {
        print 'There was an error while processing the form.';
    } 	
?>

<?php include('includes/footer.php'); ?>