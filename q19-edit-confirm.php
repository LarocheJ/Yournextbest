<?php
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // DATA SANITATION
        $relationship = mysqli_real_escape_string($connection, $_POST['relationship']);
        
        $sql = "UPDATE users SET relationship=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $relationship, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: recap.php");
        exit();
    }
?>