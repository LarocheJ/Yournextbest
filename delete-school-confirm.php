<?php 
    require('includes/connection.php');
    
        $id = $_GET['id'];
        $sql = "DELETE FROM school_codes WHERE id=$id";

        if(mysqli_query($connection, $sql)){
            header('Location:admin.php?deletion=success');
        } else {
            header('Location:admin.php?deletion=error');
        }

    ?>