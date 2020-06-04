<?php 
    $pageTitle = "Admin Panel";
    require('includes/connection.php');
    include('includes/head.php');
    
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$id";

        if(mysqli_query($connection, $sql)){
            header('Location:admin.php?action=success');
        } else {
            header('Location:admin.php?action=failed');
        }

    ?>