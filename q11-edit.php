<?php
    $pageTitle = "Edit";
    require('includes/connection.php');
    include('includes/head.php');

    $sql = "SELECT consequence_select FROM users WHERE email=?";
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
            <form class="form-edit" action="q11-edit-confirm.php" method="post">
                <!-- QUESTION 11 -->
                <label for="consequence-select">
                    <p class="form-questions"><?php print $q11 ?>
                    </p>
                </label>
                <select name="consequence-select" id="consequence-select" required>
                    <option value="">Select</option>
                    <option value="Never">Never</option>
                    <option value="Very seldom">Very seldom</option>
                    <option value="Most of the time">Most of the time</option>
                    <option value="Always">Always</option>
                </select>

                <div class="next-btn-wrapper">
                    <input class="main-btn-dark" type="submit" name="submit" value="Done Editing">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>