<?php
    $pageTitle = "Edit";
    require('includes/connection.php');
    include('includes/head.php');

    $sql = "SELECT bedtime FROM users WHERE email=?";
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
            <form class="form-edit" action="q17-edit-confirm.php" method="post">
                <!-- QUESTION 17 -->
                <label for="bedtime">
                    <p class="form-questions"><?php print $q17 ?>
                    </p>
                </label>
                <select name="bedtime" id="bedtime" required>
                    <option value="">Select</option>
                    <option value="8pm-9pm">8pm-9pm</option>
                    <option value="9pm-10pm">9pm-10pm</option>
                    <option value="10pm-11pm">10pm-11pm</option>
                    <option value="After midnight">After midnight</option>
                </select>

                <div class="next-btn-wrapper">
                    <input class="main-btn-dark" type="submit" name="submit" value="Done Editing">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>