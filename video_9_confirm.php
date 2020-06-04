<?php 
    require('includes/connection.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $video_9 = 'Video 9';
        $video_id = 9;
        
        $_SESSION['relationship'] = $_POST['relationship'];
        $_SESSION['younger_self'] = $_POST['younger_self'];
        $_SESSION['older_self'] = $_POST['older_self'];

        // DATA SANITATION
        $relationship = mysqli_real_escape_string($connection, $_POST['relationship']);
        $younger_self = mysqli_real_escape_string($connection, $_POST['younger_self']);
        $older_self = mysqli_real_escape_string($connection, $_POST['older_self']);
        
        $sql = "UPDATE users SET relationship=?, younger_self=?, older_self=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sssis", $relationship, $younger_self, $older_self, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_10.php");
        exit();
        
    } else {
        print 'There was an error while processing the form.';
    } 	
?>