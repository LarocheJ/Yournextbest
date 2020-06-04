<?php 
    $pageTitle = "Home";
    require('includes/connection.php');
    include('includes/head.php');
?>

<div class="full-bg">

    <?php 
        include('includes/header.php');
    ?>
    <!-- Background video goes here if needed -->
    <!-- <video autoplay muted loop poster="static-bg.jpg" id="bg-video">
    <source src="videos/tree_over_water.mp4" type="video/mp4">
    <source src="videos/tree_over_water.ogv" type="video/ogv">
    <source src="videos/tree_over_water.webm" type="video/webm">
    Your browser does not support the HTML5 video.
</video> -->
    <div class="hero-wrapper">
        <h1>We're Glad you Made it!</h1>
        <section class="section-a fade-2">
            <h2>Get ready to get clear about who you are and where you are headed!</h2>

            <div>
                <div class="index-video">
                    <video controls>
                        <source src="videos/compressed/yournextbest_intro.mp4">
                        <source src="videos/compressed/yournextbest_intro.webm">
                        Your browser doesn't support the video tag.
                    </video>
                </div>
            </div>
            <div class="main-page-text">
                <h3>To get started, enter your code below:</h3>

                <form action="code-authentication.php" method="post">
                    <div class="code-container-1">
                        <input class="codebox-1" type="text" name="codebox" id="codebox" maxlength="4"
                            placeholder="CODE">
                    </div>
                    <?php 
                    if(isset($_GET['error'])){
                        print $_SESSION['message'];
                    }
                ?>

                    <input class="main-submit-1" type="submit" name="submit" value="Let's Go!">
                </form>
                <p>Already signed up? <a href="login.php">Click here to login!</a></p>
                <p>No access code? <a href="signup.php">Click here to get started!</a></p>
            </div> <!-- END main-page-text -->
        </section> <!-- END section-a -->
    </div> <!-- END hero-wrapper -->

    <section class="section-b">
        <div class="section-b-container">
            <h2>About your Guide</h2>
            <div class="text-container">
                <p>Inspiring people to see their potential and take a step toward their "All In Moment", this is what
                    Michael Chiasson is all about. As a dedicated public speaker and community leader, Michael exudes an
                    unparalleled passion for encouraging and helping others, onstage and off. It's more than a job, it's
                    his
                    life work.</p>
                <p>Michael has spoken at hundreds of events around the world speaking to thousands of students,
                    parents
                    and teachers each year. He has been the Keynote speaker at many events such as Teacher Conferences,
                    Parent Conferences, Schools and Corporate events.</p>
            </div>
        </div>
        <div class="bg-img"></div>
    </section>
    <?php 
        include('includes/footer.php');
    ?>

</div>