<?php 
    $pageTitle = "Log In";
    require('includes/connection.php');
    include('includes/head.php');
?>

<div class="full-bg">
    <div class="full-page">
        <?php 
            include('includes/header.php');
        ?>
        <div class="login-wrapper fade-2">
            <h1>Login</h1>
            <form action="authentication.php" method="post">
                <?php 
            if(isset($_GET['error'])){
                print '<p class="error-msg">'.$_SESSION['message'].'</p>'; 
            }
            if(isset($_GET['error_1'])){
                print '<p class="error-msg">'.$_SESSION['message'].'</p>'; 
            }
            if(isset($_GET['login'])){
                print '<p class="success-msg">'.$_SESSION['message'].'</p>';
            }
            if(isset($_GET['signup'])){
                print '<p class="success-msg">'.$_SESSION['message'].'</p>';
            }
        ?>
                <div class="input-container">
                    <label for="user">
                        Email
                        <input type="email" name="user" id="user" placeholder="jane@gmail.com" value="<?php 
                    if(isset($_GET['error_1']) || isset($_GET['error'])){
                        print $_SESSION['userName'];
                    }
                ?>">
                    </label>
                </div>

                <div class="input-container">
                    <label for="password">
                        Password
                        <input type="password" name="password" id="password">
                    </label>
                </div>
                <div class="login-options">
                    <input class="login-submit" type="submit" name="submit" value="Login">
                    <ul>
                        <li><a href="signup.php">Create Account</a></li>
                        <li><a href="reset-password.php">Reset Password</a></li>
                    </ul>
                </div>
            </form>
            <?php 
                if(isset($_GET['newpwd'])){
                    if($_GET['newpwd'] == "updatesuccess"){
                        print '<p class="success-msg">Your password has been reset!</p>'; 
                    }
                }
            ?>
        </div>
        <!--END login-wrapper -->
    </div>
    <!--END full-page -->

    <?php 
        include('includes/footer.php');
    ?>

</div> <!-- END full-bg -->