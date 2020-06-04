<?php 
    $pageTitle = "My Profile";
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
<?php
    //Check if user logged in
    if(isset($_SESSION['userEmail'])){
?>
<div class="wrapper">
    <?php 
        include('includes/header.php');
    ?>
    <div class="welcome-header">
        <div class="user-info">
            <h1>
                <?php 
                    if(isset($_SESSION['userName'])){
                        print 'Welcome, '.$_SESSION['userName'].'!'; 
                        print '<h2>'.$_SESSION['userEmail'].'</h2>';     
                    }
                    elseif(isset($_SESSION['userEmail'])){
                        print 'Welcome back!';
                    }
                    else {
                        print 'Welcome to Your Next Best!';
                    }
                ?>
            </h1>
        </div>
        <div class="videos-completed">
            <h2>Videos Completed:</h2>
            <div class="circle">
                <p>
                    <?php 
                        if($result){
                            while($row = mysqli_fetch_array($result)){
                                if($row['video_id'] == 1){
                                    print '1';
                                }
                                elseif($row['video_id'] == 2){
                                    print '2';
                                }
                                elseif($row['video_id'] == 3){
                                    print '3';
                                }
                                elseif($row['video_id'] == 4){
                                    print '4';
                                }
                                elseif($row['video_id'] == 5){
                                    print '5';
                                }
                                elseif($row['video_id'] == 6){
                                    print '6';
                                }
                                elseif($row['video_id'] == 7){
                                    print '7';
                                }
                                elseif($row['video_id'] == 8){
                                    print '8';
                                }
                                elseif($row['video_id'] == 9){
                                    print '9';
                                }
                                elseif($row['video_id'] == 10){
                                    print '10';
                                } else {
                                    print 0;
                                }
                            }
                        }
                    ?>
                </p>
            </div>
        </div>
    </div> <!-- END Welcome header -->
    <div class="fade-2">
        <div class="blurred-bg">

            <?php
                if(isset($_GET["form"])){
                    if($_GET["form"] == "success"){
                        $to = "michael@access52.com, matthew@access52.com, jimmy@access52.com";

                        $subject = "A user has completed all 10 videos!";

                        $message = '<p>Hi Michael,<br></p>';
                        $message .= '<p>This is an automated message to let you know that a user with the following email: <strong> '.$_SESSION['userEmail'].'</strong> has completed all 10 videos from Your Next Best and entered their mailing address.<br>';
                        $message .= 'To log into the admin panel, <a href="yournextbest.com/admin.php">click here.</a></p>';

                        $headers = "From: yournextbest <info@yournextbest.com>\r\n";
                        $headers .= "Reply-to: info@yournextbest.com\r\n";
                        $headers .= "Content-type: text/html\r\n";

                        mail($to, $subject, $message, $headers);
                        ?>
            <div class="white-box">
                <p class="success-msg">
                    <i class="fas fa-box"></i> Thank you! Your package is on its way!
                </p>
            </div>
            <?php
                    }
                }
            ?>

            <?php  
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, "s", $user);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);     
                    
                if($result){
                    while($row = mysqli_fetch_array($result)){
                        if($row['video_id'] == 10){
                        ?>
            <div class="white-box">
                <p><i class="fas fa-award"></i> <strong>Congratulations!</strong> <i class="fas fa-award"></i></p>
                <p>We are so thankful and proud that you have completed "Your Next Best". We would love to mail you a
                    small gift for completing the program. Please let us know where to send it below.</p>
                <p>Moving ahead, we
                    will occasionally stay in contact with you over email, and please feel free to reach out to us
                    anytime. If you have any suggestions or ideas of how we can make the next series even better, we
                    welcome your feedback.</p>
                <div class="white-box-link-box">
                    <a class="recap" href="mailing_address.php">Send me stuff!</a>
                    <a class="recap" href="recap.php">View recap</a>
                </div>
            </div>
            <div class="white-box">
                <p><i class="fas fa-paper-plane"></i> <strong>Stay in touch</strong></p>
                <div class="social">
                    <p><a href="tel:1-800-270-1009"><i class="fas fa-mobile-alt"></i> 1.800.270.1009</a></p>
                    <p><a href="https://www.instagram.com/access52/" target="_blank"><i class="fab fa-instagram"></i>
                            @access52</a></p>
                    <p><a href="mailto:411@access52.com"><i class="fas fa-envelope"></i> 411@access52.com</a></p>
                    <p><a href="https://www.facebook.com/access52/"><i class="fab fa-facebook"></i> @access52</a></p>
                </div>
            </div>
            <?php
                        } else {
                            ?>
            <div class="info-msg">
                <p><i class="fas fa-info-circle"></i> Watch all 10 videos to get access to your recap and a special
                    message from Michael.</p>
            </div>
            <?php
                        }
                    }
                }
            ?>
            <div class="video-wrapper">
                <h2>Here are the videos you have access to:</h2>
                <?php 
                    if(isset($_GET['error'])){
                        print '<p class="error-msg"><i class="fas fa-exclamation-triangle"></i> '.$_SESSION['message'].'</p>'; 
                    }
                ?>

                <div class="video-grid">

                    <!-- EPISODE 1 -->
                    <div class="videos-container">
                        <p>Episode 1: Priorities</p>
                        <a href="video_1.php">
                            <div class="videos video_1 video-hover-effect">
                                <i class="fas fa-play"></i>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 2 -->
                    <div class="videos-container">
                        <p>Episode 2: Intentional Decisions</p>
                        <a href="video_2.php">
                            <div class="videos video_2 video-hover-effect">
                                <?php                       
                                mysqli_stmt_prepare($stmt, $sql);
                                mysqli_stmt_bind_param($stmt, "s", $user);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                if($result){
                                    while($row = mysqli_fetch_array($result)){
                                        if($row['priorities'] == ""){
                                            print '<i class="fas fa-lock"></i>';
                                        } else {
                                            print '<i class="fas fa-play"></i>';
                                        }
                                    }
                                } else {
                                    $_SESSION['message'] = 'There was an SQL error.';
                                }
                            ?>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 3 -->
                    <div class="videos-container">
                        <p>Episode 3: Distractions</p>
                        <a href="video_3.php">
                            <div class="videos video_3 video-hover-effect">
                                <?php                       
                                mysqli_stmt_prepare($stmt, $sql);
                                mysqli_stmt_bind_param($stmt, "s", $user);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                            
                                if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            if($row['decision'] == ""){
                                                print '<i class="fas fa-lock"></i>';
                                            } else {
                                                print '<i class="fas fa-play"></i>';
                                            }
                                        }
                                    } else {
                                        $_SESSION['message'] = 'There was an SQL error.';
                                    }
                            ?>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 4 -->
                    <div class="videos-container">
                        <p>Episode 4: The Outcome</p>
                        <a href="video_4.php">
                            <div class="videos video_4 video-hover-effect">
                                <?php
                                    mysqli_stmt_prepare($stmt, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $user);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            if($row['distraction'] == ""){
                                                print '<i class="fas fa-lock"></i>';
                                            } else {
                                                print '<i class="fas fa-play"></i>';
                                            }
                                        }
                                    } else {
                                        $_SESSION['message'] = 'There was an SQL error.';
                                    }
                                ?>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 5 -->
                    <div class="videos-container">
                        <p>Episode 5: Actions</p>
                        <a href="video_5.php">
                            <div class="videos video_5 video-hover-effect">
                                <?php
                                    mysqli_stmt_prepare($stmt, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $user);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            if($row['joy'] == ""){
                                                print '<i class="fas fa-lock"></i>';
                                            } else {
                                                print '<i class="fas fa-play"></i>';
                                            }
                                        }
                                    } else {
                                        $_SESSION['message'] = 'There was an SQL error.';
                                    }
                                ?>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 6 -->
                    <div class="videos-container">
                        <p>Episode 6: Consequences</p>
                        <a href="video_6.php">
                            <div class="videos video_6 video-hover-effect">
                                <?php
                                    mysqli_stmt_prepare($stmt, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $user);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            if($row['commitment'] == ""){
                                                print '<i class="fas fa-lock"></i>';
                                            } else {
                                                print '<i class="fas fa-play"></i>';
                                            }
                                        }
                                    } else {
                                        $_SESSION['message'] = 'There was an SQL error.';
                                    }
                                ?>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 7 -->
                    <div class="videos-container">
                        <p>Episode 7: Students</p>
                        <a href="video_7.php">
                            <div class="videos video_7 video-hover-effect">
                                <?php
                                    mysqli_stmt_prepare($stmt, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $user);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            if($row['consequence_face'] == ""){
                                                print '<i class="fas fa-lock"></i>';
                                            } else {
                                                print '<i class="fas fa-play"></i>';
                                            }
                                        }
                                    } else {
                                        $_SESSION['message'] = 'There was an SQL error.';
                                    }
                                ?>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 8 -->
                    <div class="videos-container">
                        <p>Episode 8: Habits</p>
                        <a href="video_8.php">
                            <div class="videos video_8 video-hover-effect">
                                <?php
                                    mysqli_stmt_prepare($stmt, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $user);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                
                                    if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            if($row['impact'] == ""){
                                                print '<i class="fas fa-lock"></i>';
                                            } else {
                                                print '<i class="fas fa-play"></i>';
                                            }
                                        }
                                    } else {
                                        $_SESSION['message'] = 'There was an SQL error.';
                                    }
                                ?>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 9 -->
                    <div class="videos-container">
                        <p>Episode 9: Relationships</p>
                        <a href="video_9.php">
                            <div class="videos video_9 video-hover-effect">
                                <?php
                                    mysqli_stmt_prepare($stmt, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $user);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);

                                    if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            if($row['habit'] == ""){
                                                print '<i class="fas fa-lock"></i>';
                                            } else {
                                                print '<i class="fas fa-play"></i>';
                                            }
                                        }
                                    } else {
                                        $_SESSION['message'] = 'There was an SQL error.';
                                    }
                                ?>
                            </div>
                        </a>
                    </div>

                    <!-- EPISODE 10 -->
                    <div class="videos-container">
                        <p>Episode 10: What is Love?</p>
                        <a href="video_10.php">
                            <div class="videos video_10 video-hover-effect">
                                <?php
                                    mysqli_stmt_prepare($stmt, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $user);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    
                                    if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            if($row['older_self'] == ""){
                                                print '<i class="fas fa-lock"></i>';
                                            } else {
                                                print '<i class="fas fa-play"></i>';
                                            }
                                        }
                                    } else {
                                        $_SESSION['message'] = 'There was an SQL error.';
                                    }
                                ?>
                            </div>
                        </a>
                    </div>
                </div> <!-- END video-grid -->
            </div> <!-- END blurred-bg -->
        </div> <!-- END video-wrapper -->
    </div> <!-- END fade-2 -->
</div> <!-- END wrapper -->
<?php
    } else {
        //if user hasn't logged in, redirect them to login page.
        header("Location: login.php");
    }
?>
<?php 
    include('includes/footer.php');
?>