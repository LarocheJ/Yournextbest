<?php 
    require('includes/connection.php'); 

    session_unset();
    session_destroy();
    header("Location: index.php");
?>