<?php 
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $video_7 = 'Video 7';
        $video_id = 7;

        $_SESSION['inspire'] = $_POST['inspire'];
        $_SESSION['impact'] = $_POST['impact'];

        // DATA SANITATION
        $inspire = mysqli_real_escape_string($connection, $_POST['inspire']);
        $impact = mysqli_real_escape_string($connection, $_POST['impact']);
        
        $sql = "UPDATE users SET inspire=?, impact=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssis", $inspire, $impact, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_8.php");
        exit();
        
    } else {
        print 'There was an error while processing the form.';
    } 	
?>

<?php include('includes/footer.php'); ?>