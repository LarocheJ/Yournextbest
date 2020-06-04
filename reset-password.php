<?php 
    $pageTitle = "Reset Password";
    require('includes/connection.php');
    include('includes/head.php');
?>

<div class="full-bg">
    <div class="full-page">
        <?php 
            include('includes/header.php');
        ?>

        <div class="login-wrapper fade-2">
            <h1>Reset your Password</h1>
            <p>An e-mail will be sent to you with instructions on how to reset your password.</p>
            <form action="includes/reset-request.inc.php" method="post">
                <div class="input-container">
                    <label for="email">Please enter your e-mail address</label>
                    <input type="email" name="email" placeholder="jane@email.com">
                </div>
                <div class="input-container">
                    <input class="reset-password-submit" type="submit" name="reset-request-submit"
                        value="Reset password">
                </div>
            </form>
            <?php 
                if(isset($_GET['reset'])){
                    if($_GET['reset'] == "success"){
                        print '<p class="success-msg">Please check your e-mail.</p>'; 
                    }
                }
            ?>
        </div>
    </div>
    <?php 
        include('includes/footer.php');
    ?>

</div>