<?php
    $pageTitle = "Episode 9";
    require('includes/connection.php');
    include('includes/head.php');

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_stmt_init($connection);
    $user = mysqli_real_escape_string($connection, $_SESSION['userEmail']);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($result){
        while($row = mysqli_fetch_array($result)){
            if($row['habit'] == ""){
                header("Location: welcome.php?error=video_locked");
                $_SESSION['message'] = 'Please watch all previous videos before proceeding!';
            }
        }
    }
?>
<div class="upper-video">
    <?php include('includes/header.php'); ?>


    <div class="video-wrapper">
        <h1 class="page-heading">Episode 9: Relationships</h1>
        <video controls id="ynb-video">
            <source src="videos/compressed/A52_your_next_best_ep9.mp4">
            <source src="videos/compressed/A52_your_next_best_ep9.mkv">
            <p>Your browser does not support the video tag.</p>
        </video>
    </div>
</div>
<div class="under-video">
    <?php 
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_stmt_init($connection);
    $user = mysqli_real_escape_string($connection, $_SESSION['userEmail']);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($result){
        while($row = mysqli_fetch_array($result)){
            if($row['older_self'] == ""){
?>

    <div class="form-wrapper fade-2">
        <h2 class="" id="form-title">Watch the full video before proceeding.</h2>

        <div class="form-hide" id="userForm">
            <form action="video_9_confirm.php" method="post">

                <!-- QUESTION 19 -->
                <p class="form-questions"><?php print $q19 ?></p>
                <div class="radio-btn-container">
                    <label class="custom-radio-container" for="relationship-yes">Yes
                        <input type="radio" name="relationship" id="relationship-yes" value="Yes" required>
                        <span class="custom-radio-btn"></span>
                    </label>
                    <label class="custom-radio-container" for="relationship-no">No
                        <input type="radio" name="relationship" id="relationship-no" value="No" required>
                        <span class="custom-radio-btn"></span>
                    </label>
                </div>

                <!-- QUESTION 20 -->
                <div class="text-area-container">
                    <label for="younger_self">
                        <p class="form-questions"><?php print $q20 ?></p>
                    </label>
                    <textarea name="younger_self" id="younger_self" cols="50" rows="5"
                        placeholder="Enter your answer here..." required></textarea>
                </div>

                <!-- QUESTION 21 -->
                <div class="text-area-container">
                    <label for="older_self">
                        <p class="form-questions"><?php print $q21 ?></p>
                    </label>
                    <textarea name="older_self" id="older_self" cols="50" rows="5"
                        placeholder="Enter your answer here..." required></textarea>
                </div>

                <div class="next-btn-wrapper">
                    <input class="next-btn" type="submit" name="submit" value="Next Video">
                </div>
            </form>
        </div>
    </div>

    <script>
    window.addEventListener('load', function() {
        var video = document.getElementById('ynb-video');
        var element = document.querySelector('.under-video');
        video.onended = function() {
            //the video ended
            //get the distance between the element and the top of the document.
            var scrollDistance = document.body.scrollTop;
            var elemRect = element.getBoundingClientRect();
            var elemOffsetViewportDistance = elemRect.top;
            var totalOffset = scrollDistance + elemOffsetViewportDistance;
            window.scrollTo(0, totalOffset);
        };
    });

    document.getElementById("ynb-video").addEventListener('ended', showForm, false);

    function showForm() {
        var form = document.getElementById("userForm");
        var title = document.getElementById("form-title");
        form.classList.remove("form-hide");
        title.innerHTML = "Please fill out the following information";
    }
    </script>
    <?php 
    } 
        } 
            } 
?>
    <div class="align-center">
        <?php 
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($result){
                while($row = mysqli_fetch_array($result)){
                    if($row['older_self'] != ""){
                        print '<a href="video_10.php" class="main-btn">Next Video</a>';
                        //print '<p class="larger-p align-center"><a href="recap.php">Recap</a></p>';
                    }
                }
            }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>