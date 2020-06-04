<?php 
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $video_2 = 'Video 2';
        $video_id = 2;
        
        $_SESSION['decision'] = $_POST['decision'];
        $_SESSION['decision-radio'] = $_POST[' decision-radio'];

        // DATA SANITATION
        $decisionRadio = mysqli_real_escape_string($connection, $_POST['decision-radio']);
        $decision = mysqli_real_escape_string($connection, $_POST['decision']);
        
        $sql = "UPDATE users SET decision=?, decision_radio=?, video_id=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssis", $decision, $decisionRadio, $video_id, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: video_3.php");
        exit();
        
    } else {
        print 'There was an error while processing the form.';
    } 
?>