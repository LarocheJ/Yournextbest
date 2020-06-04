<?php
    $pageTitle = "Recap";
    require('includes/connection.php');
    include('includes/head.php');

    $sql = "SELECT * FROM users WHERE email=?";
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
        <h1 class="page-heading">Recap</h1>
    </div>
    <div class="fade-2">
        <div class="blurred-bg-2">
            <?php include("includes/breadcrumbs.php") ?>
            <div class="content-wrapper">
                <h2>Change your answers as you wish.</h2>
                <div class="recap-grid">
                    <?php
                    if($result){
                        while($row = mysqli_fetch_array($result)){
                            print '<div class="answer-card">';
                            print '<h2>'.$q1.'</h2>';
                            print '<p>'.$row['journal'].'</p>';
                            print '<a href="q1-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q2.'</h2>';
                            print '<p>'.stripslashes($row['priorities']).'</p>';
                            print '<a href="q2-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q3.'</h2>';
                            print '<p>'.$row['decision_radio'].'</p>';
                            print '<a href="q3-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q4.'</h2>';
                            print '<p>'.stripslashes($row['decision']).'</p>';
                            print '<a href="q4-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q5.'</h2>';
                            print '<p>'.stripslashes($row['distraction']).'</p>';
                            print '<a href="q5-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q6.'</h2>';
                            print '<p>'.$row['sleep'].'</p>';
                            print '<a href="q6-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q7.'</h2>';
                            print '<p>'.$row['confidence'].'</p>';
                            print '<a href="q7-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q8.'</h2>';
                            print '<p>'.stripslashes($row['joy']).'</p>';
                            print '<a href="q8-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q9.'</h2>';
                            print '<p>'.stripslashes($row['commitment']).'</p>';
                            print '<a href="q9-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q10.'</h2>';
                            print '<p>'.$row['friends'].'</p>';
                            print '<a href="q10-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q11.'</h2>';
                            print '<p>'.$row['consequence_select'].'</p>';
                            print '<a href="q11-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q12.'</h2>';
                            print '<p>'.$row['mentor'].'</p>';
                            print '<a href="q12-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q13.'</h2>';
                            print '<p>'.stripslashes($row['consequence_face']).'</p>';
                            print '<a href="q13-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q14.'</h2>';
                            print '<p>'.$row['inspire'].'</p>';
                            print '<a href="q14-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q15.'</h2>';
                            print '<p>'.stripslashes($row['impact']).'</p>';
                            print '<a href="q15-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q16.'</h2>';
                            print '<p>'.$row['routine'].'</p>';
                            print '<a href="q16-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q17.'</h2>';
                            print '<p>'.$row['bedtime'].'</p>';
                            print '<a href="q17-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q18.'</h2>';
                            print '<p>'.stripslashes($row['habit']).'</p>';
                            print '<a href="q18-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q19.'</h2>';
                            print '<p>'.$row['relationship'].'</p>';
                            print '<a href="q19-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q20.'</h2>';
                            print '<p>'.stripslashes($row['younger_self']).'</p>';
                            print '<a href="q20-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q21.'</h2>';
                            print '<p>'.stripslashes($row['older_self']).'</p>';
                            print '<a href="q21-edit.php">Edit</a>';
                            print '</div>';
                            print '<div class="answer-card">';
                            print '<h2>'.$q22.'</h2>';
                            print '<p>'.stripslashes($row['difference']).'</p>';
                            print '<a href="q22-edit.php">Edit</a>';
                            print '</div>';
                        }
                    }
                ?>
                </div> <!-- END recap-grid -->
            </div> <!-- END content-wrapper -->
        </div> <!-- END blurred-bg-2 -->
    </div> <!-- END fade-2 -->
</div> <!-- END wrapper -->

<?php include("includes/footer.php"); ?>