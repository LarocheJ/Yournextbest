<?php
    $pageTitle = "Edit";
    require('includes/connection.php');
    include('includes/head.php');

    $sql = "SELECT priorities FROM users WHERE email=?";
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
            <form class="form-edit" action="q2-edit-confirm.php" method="post">
                <!-- QUESTION 2 -->
                <h2><?php print $q2 ?></h2>
                <div class="text-area-container">
                    <p class="form-questions">
                        <label for="priorities">
                            <?php print $q2 ?>
                        </label>
                    </p>
                    <textarea name="priorities" id="priorities" cols="50" rows="5"
                        placeholder="Enter your answer here..." required><?php 
                            mysqli_stmt_prepare($stmt, $sql);
                            mysqli_stmt_bind_param($stmt, "s", $user);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                    print stripslashes($row['priorities']);
                                } 
                            } else {
                                print 'No data';
                            }
                            
                        ?></textarea>
                </div>

                <div class="next-btn-wrapper">
                    <input class="main-btn-dark" type="submit" name="submit" value="Done Editing">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>