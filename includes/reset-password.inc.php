<?php

    if(isset($_POST['reset-password-submit'])){

        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $newPassword = $_POST['password'];
        $passwordConfirm = $_POST['password-confirm'];

        if(empty($newPassword) || empty($passwordConfirm)){
            header("Location: ../create-new-password.php?error=emptypwd");
            exit();
        } elseif($newPassword != $passwordConfirm){
            header("Location: ../create-new-password.php?error=nomatch");
            exit();
        }

        $currentDate = date("U");

        require 'connection.php';

        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >=?;";
        $stmt = mysqli_stmt_init($connection);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            print 'There was a server error(sql:1) error. Please try again.';
            exit();
        } else {
            //replace ? with user data (string:s)
            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if(!$row = mysqli_fetch_assoc($result)){
                print 'There was a server error(sql:2). Please try again.';
                exit();
            } else {
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

                if($tokenCheck === false){
                    print 'There was a server error(sql:3). Please try again.';
                    exit();
                } elseif($tokenCheck === true){
                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM users WHERE email=?;";

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        print 'There was a server error(sql:4). Please try again.';
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        if(!$row = mysqli_fetch_assoc($result)){
                            print 'There was a server error(sql:5). Please try again.';
                            exit();
                        } else {
                            $sql = "UPDATE users SET password=? WHERE email=?;";
                            $stmt = mysqli_stmt_init($connection);

                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                print 'There was a server error(sql:6). Please try again.';
                                exit();
                            } else {
                                $newPwdHash = password_hash($newPassword, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                                $stmt = mysqli_stmt_init($connection);

                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    print 'There was a server error(sql:7). Please try again.';
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../login.php?newpwd=updatesuccess");
                                }
                            }
                        }
                    }
                }
            }
        }

    } else {
        header("Location: ../index.php");
    }

?>