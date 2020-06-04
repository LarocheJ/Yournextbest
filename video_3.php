<?php
    $pageTitle = "Episode 3";
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
            if($row['decision'] == ""){
                header("Location: welcome.php?error=video_locked");
                $_SESSION['message'] = 'Please watch all previous videos before proceeding!';
            }
        }
    } 
?>
<div class="upper-video">
    <?php include('includes/header.php'); ?>

    <div class="video-wrapper">
        <h1 class="page-heading">Episode 3: Distractions</h1>
        <video controls id="ynb-video">
            <source src="videos/compressed/A52_your_next_best_ep3.mkv">
            <source src="videos/compressed/A52_your_next_best_ep3.mp4">
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
            if($row['distraction'] == ""){
?>

    <div class="form-wrapper fade-2">
        <h2 class="" id="form-title">Watch the full video before proceeding.</h2>
        <div class="form-hide" id="userForm">
            <form action="video_3_confirm.php" method="post">

                <!-- QUESTION 5 -->
                <label for="distraction">
                    <p class="form-questions"><?php print $q5 ?></p>
                </label>
                <div class="text-area-container">
                    <textarea name="distraction" id="distraction" cols="50" rows="5"
                        placeholder="Enter your answer here..." required></textarea>
                </div>

                <!-- QUESTION 6 -->
                <label for="sleep">
                    <p class="form-questions"><?php print $q6 ?></p>
                </label>
                <select name="sleep" id="sleep">
                    <option value="<4">Less than 4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9 or more</option>
                </select>

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
                        if($row['distraction'] != ""){
                            print '<a href="video_4.php" class="main-btn">Next Video</a>';
                            //print '<p class="larger-p align-center"><a href="recap.php">Recap</a></p>';
                        }
                    }
                }
            ?>
    </div>
</div>
<?php include('includes/footer.php'); ?>