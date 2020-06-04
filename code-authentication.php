<?php 
    require('includes/connection.php');

    // ACCESS CODES
    // $code1 = "BABE";
    // $code2 = "BEST";
    // $code3 = "WINN";

    $_SESSION['message'] = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 

        $codebox = mysqli_real_escape_string($connection, $_POST['codebox']);

        if(empty($codebox)){
            header("Location: index.php?error=emptyfield");
            $_SESSION['message'] = '<p class="error-msg-2">Please enter a code!</p>';
        } else {
            $sql = "SELECT * FROM school_codes WHERE code=?";
            $stmt = mysqli_stmt_init($connection);

            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "s", $codebox);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){
                header("Location: signup.php?success");
                $_SESSION['code'] = strtoupper($codebox);
                exit();
            } else {
                header("Location: index.php?error=codenotfound");
                $_SESSION['message'] = '<p class="error-msg-2">Sorry, this is not a valid code</p>';
            }
        } 
    } else {
        header('Location: index.php');
    }

?>