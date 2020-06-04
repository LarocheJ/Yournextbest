<?php

    if(isset($_POST['reset-request-submit'])){

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = 'www.yournextbest.com/create-new-password.php?selector='.$selector.'&validator='.bin2hex($token).'';

        $expires = date("U") + 1800;

        require 'connection.php';

        $userEmail = $_POST['email'];

        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
        $stmt = mysqli_stmt_init($connection);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            print 'There was a server(sql:1) error. Please try again later.';
            exit();
        } else {
            //replace ? with user data (string:s)
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
        $stmt = mysqli_stmt_init($connection);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            print 'There was a server(sql:2) error. Please try again later.';
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            //replace ? with user data (string:s)
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($connection);

        $to = $userEmail;

        $subject = "Yournextbest Password Reset.";

        $message = '<p>We received a password reset request. The link to reset your password can be found below. If you did not make this request, you can ignore this email.</p>';
        $message .= '<p>Here is your password reset link: <br>';
        $message .= '<a href="'.$url.'">'.$url.'</a></p>';

        $headers = "From: yournextbest <info@yournextbest.com>\r\n";
        $headers .= "Reply-to: info@yournextbest.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        header("Location:../reset-password.php?reset=success");

    } else {
        header("Location: ../index.php");
    }

?>