<?php 
    require('includes/connection.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        $video_6 = 'Video 6';
        $video_id = 6;

        $_SESSION['consequence-select'] = $_POST['consequence-select'];
        $_SESSION['mentor'] = $_POST['mentor'];
        $_SESSION['consequence_face'] = $_POST['consequence_face'];

        // DATA SANITATION
        $consequence_select = mysqli_real_escape_string($connection, $_POST['consequence-select']);
        $mentor = mysqli_real_escape_string($connection, $_POST['mentor']);
        $consequence_face = mysqli_real_escape_string($connection, $_POST['consequence_face']);
        
        $sql = "UPDATE users SET consequence_select=?, mentor=?, consequence_face=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sssis", $consequence_select, $mentor, $consequence_face, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_7.php");
        exit();
        
    } else {
        print 'There was an error while processing the form.';
    } 	
?>

<?php include('includes/footer.php'); ?>