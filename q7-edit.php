<?php
    $pageTitle = "Edit";
    require('includes/connection.php');
    include('includes/head.php');

    $sql = "SELECT confidence FROM users WHERE email=?";
    $stmt = mysqli_stmt_init($connection);
    $user = mysqli_real_escape_string($connection, $_SESSION['userEmail']);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
?>
<div class="wrapper">
    <?php include('includes/header.php'); ?>

    <div class="page-header">
        <h1 class="page-heading">Edit</h1>
    </div>
    <div class="fade-2">
        <div class="edit-wrapper">
            <form class="form-edit" action="q7-edit-confirm.php" method="post">
                <!-- QUESTION 7 -->
                <p class="form-questions"><?php print $q7 ?></p>
                <div class="radio-btn-container">
                    <label class="custom-radio-container" for="confidence-yes">Yes
                        <input type="radio" name="confidence" id="confidence-yes" value="Yes" required>
                        <span class="custom-radio-btn"></span>
                    </label>
                    <label class="custom-radio-container" for="confidence-no">No
                        <input type="radio" name="confidence" id="confidence-no" value="No" required>
                        <span class="custom-radio-btn"></span>
                    </label>
                </div>

                <div class="next-btn-wrapper">
                    <input class="main-btn-dark" type="submit" name="submit" value="Done Editing">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>