<?php 
require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $user = mysqli_real_escape_string($connection, $_POST['user']);
        $password = $_POST['password'];
        
        if(empty($user) || empty($password)){
            header("Location: login.php?error=emptyfields");
            $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> Please enter both your email address and password.';
            exit();
        }
        else {
            $sql = "SELECT * FROM users WHERE email=?";
            $stmt = mysqli_stmt_init($connection);
            date_default_timezone_set("America/Edmonton");
            $date = date("Y-m-d H:i:s");
            
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: login.php?error=sqlerror");
                $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> There was an error with the SQL connection. Please <a href="contact.php">contact</a> the administrator.';
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $user);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password, $row['password']);
                    if($pwdCheck == false){
                        header("Location: login.php?error=wrongpwd");
                        $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> Wrong password.';
                        $_SESSION['userName'] = $user;
                        exit();
                    }
                    elseif($user == "admin@email.com" && $pwdCheck == true){
                        header("Location: admin.php"); 
                        $_SESSION['admin'] = 'Admin';                         
                        exit();
                    }
                    elseif($pwdCheck == true) {

                        $_SESSION['userName'] = $row['name'];  
                        $_SESSION['userEmail'] = $row['email'];  
                        
                        $sql = "UPDATE users SET last_login=? WHERE email=?";
                        $stmt = mysqli_stmt_init($connection);        
                
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_bind_param($stmt, "ss", $date, $_SESSION['userEmail']);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        mysqli_close($connection);
                        
                        header("Location: welcome.php");  

                        exit();
                    }
                    else {
                        header("Location: login.php?error=wrongpwd_err2");
                        $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> Wrong 
                        password.';
                        $_SESSION['userName'] = $user;
                        exit();
                    }
                } 
                else {
                    header("Location: login.php?error=nouser");
                    $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> No accounts were found with this email.';
                    $_SESSION['userName'] = $user;
                    exit();
                }
            }
        }

    }
    else {
        header("Location: login.php");
        $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> You must login first!';
        exit();
    }
?>