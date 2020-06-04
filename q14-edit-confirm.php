<?php
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // DATA SANITATION
        $inspire = mysqli_real_escape_string($connection, $_POST['inspire']);
        
        $sql = "UPDATE users SET inspire=? WHERE email=?";
        $stmt = mysqli_stmt_init($connection);        

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $inspire, $_SESSION['userEmail']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: recap.php");
        exit();
    }
?>