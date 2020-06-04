<?php 
    require('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //DATA SANITATION
        $name = mysqli_real_escape_string($connection, $_POST['fName']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $userPassword = $_POST['password'];
        $password_confirm = $_POST['password-confirm'];
        $grade = mysqli_real_escape_string($connection, $_POST['grade']);
        $gender = mysqli_real_escape_string($connection, $_POST['gender']);
        $code = mysqli_real_escape_string($connection, $_SESSION['code']);
        $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
        $date = date("Y-m-d");

        if(empty($email) || empty($userPassword) || empty($password_confirm)){
            header("Location: signup.php?error=emptyfields&name=".$name."&mail=".$email."&grade=".$grade."&gender=".$gender);
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['grade'] = $grade;
            $_SESSION['gender'] = $gender;
            $_SESSION['birthday'] = $birthday;
            $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> Please fill out all the required fields.';
            exit();
        } 
        elseif($userPassword !== $password_confirm){
            header("Location: signup.php?error=emptyfields&name=".$name."&mail=".$email."&grade=".$grade."&gender=".$gender);
            $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> Your passwords must match.';
            exit();
        }
        else {
            $sql = "SELECT email FROM users WHERE email=?";
            $stmt = mysqli_stmt_init($connection);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: signup.php?error=sqlerror");
                $_SESSION['message'] = 'There was an unexpected error, please try again later. Error message: '.mysqli_error($sql);
                exit();
            } 
            else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                $resultCheck = mysqli_stmt_num_rows($stmt);

                if($resultCheck > 0){
                    header("Location: signup.php?error=nouser");
                    $_SESSION['message'] = '<i class="fas fa-exclamation-triangle"></i> Sorry, this email address already exists.';
                    exit();
                }
                else {
                    $sql = "INSERT INTO users (code, date, name, email, password, grade, gender, birthday) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($connection);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: signup.php?error=sqlerror");
                        $_SESSION['message'] = 'There was an unexpected error, please try again later. Error message: '.mysqli_error($sql);
                        exit();
                    } 
                    else {
                        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "ssssssss", $code, $date, $name, $email, $hashedPassword, $grade, $gender, $birthday);
                        mysqli_stmt_execute($stmt);
                        $_SESSION['message'] = '<i class="far fa-check-circle"></i> Thank you for signing up! Please enter your information below.';
                        header("Location: login.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    } 
    else {
        header("Location: signup.php");
    } 
?>

<?php include('includes/footer.php'); ?>