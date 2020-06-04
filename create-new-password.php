<?php 
    $pageTitle = "Create new Password";
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
            <?php 
                $selector = $_GET['selector'];
                $validator = $_GET['validator'];

                if(empty($selector) || empty($validator)){
                    print 'Could not validate your request.';
                } else {
                    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                        ?>
            <form action="includes/reset-password.inc.php" method="post">
                <input type="hidden" name="selector" value="<?php print $selector; ?>">
                <input type="hidden" name="validator" value="<?php print $validator; ?>">
                <div class="input-container">
                    <input type="password" name="password" placeholder="Enter a new password" required>
                </div>
                <div class="input-container">
                    <input type="password" name="password-confirm" placeholder="Confirm new password" required>
                </div>
                <input class="reset-password-submit" type="submit" name="reset-password-submit" value="Reset Password">
            </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <?php 
        include('includes/footer.php');
    ?>

</div>