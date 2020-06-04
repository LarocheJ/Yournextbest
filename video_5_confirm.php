<?php 
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $video_5 = 'Video 5';
        $video_id = 5;

        $_SESSION['commitment'] = $_POST['commitment'];
        $_SESSION['friends'] = $_POST['friends'];

        // DATA SANITATION
        $commitment = mysqli_real_escape_string($connection, $_POST['commitment']);
        $friends = mysqli_real_escape_string($connection, $_POST['friends']);
        
        $sql = "UPDATE users SET commitment=?, friends=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssis", $commitment, $friends, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_6.php");
        exit();

    } else {
        print 'There was an error while processing the form.';
    } 	
?>

<?php include('includes/footer.php'); ?>