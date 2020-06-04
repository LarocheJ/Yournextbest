<?php 
    $pageTitle = "Admin Panel";
    require('includes/connection.php');
    include('includes/head.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    // $sql = "SELECT * FROM school_codes WHERE id=$id";
    $stmt = mysqli_stmt_init($connection);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
?>

<?php include('includes/admin-header.php'); ?>
<div class="page-header">
    <div class="user-info">
        <h1>Admin Panel</h1>
    </div>
</div>
<div class="delete-wrapper">

    <div class="warning-box">

        <h2>Hold Up!</h2>
        <p>You are about to permanently delete the following user from the database:</p>
        <p class="bold"><?php print $row['name'] ?></p>
        <p> Are you sure you wish
            to
            proceed?</p>
        <div class="flex around mt-3">
            <a class="yes" href="delete-user.php?id=<?php print $id ?>">Yes</a>
            <a class="no" href="admin.php">No</a>
        </div>

    </div>

</div>

<?php 
    include('includes/footer.php');
?>