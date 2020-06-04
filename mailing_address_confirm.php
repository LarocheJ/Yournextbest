<?php 
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($connection);

        //DATA SANITATION
        $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $postal = mysqli_real_escape_string($connection,$_POST['postal']);
        $country = mysqli_real_escape_string($connection,$_POST['country']);
        $city = mysqli_real_escape_string($connection, $_POST['city']);

        $sql = "SELECT address FROM users WHERE address=?";
        $stmt = mysqli_stmt_init($connection);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: mailing_address.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $address);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){
                header("Location: mailing_address.php?error=address_exists");
                exit();
            } else {
                $sql = "UPDATE users SET full_name=?, address=?, postal_code=?, country=?, city=? WHERE email=?";
                $stmt = mysqli_stmt_init($connection);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    //header("Location: mailing_address.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssssss", $fullName, $address, $postal, $country, $city, $_SESSION['userEmail']);
                    mysqli_stmt_execute($stmt);
                    header("Location: welcome.php?form=success");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    } else {
        header("Location: welcome.php");
    }

?>