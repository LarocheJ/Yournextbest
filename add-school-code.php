<?php 
require('includes/connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // DATA SANITATION
    $code = mysqli_real_escape_string($connection, strtoupper($_POST['code']));
    $school = mysqli_real_escape_string($connection, $_POST['school']);

    $sql = "INSERT INTO school_codes (code, school) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($connection);    

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: admin.php?school_code=error");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $code, $school);
        mysqli_stmt_execute($stmt);
        header("Location: admin.php?school_code=success");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
} else {
    header('Location: admin.php');
}

?>