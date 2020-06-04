    <header>
        <?php 
            if(isset($_SESSION['userEmail'])){
        ?>
        <nav role='navigation'>
            <div class="logo">
                <a href="index.php"><img src="images/yournextbest_logo.png" alt="Your Next Best Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="welcome.php">My Profile</a></li>
                <li><a class="logout-btn" href="logout.php">Logout</a></li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <?php
            } else {
        ?>
        <nav role='navigation'>
            <div class="logo">
                <a href="index.php"><img src="images/yournextbest_logo.png" alt="Your Next Best Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <?php
            }
        ?>
        <!-- </div> -->
    </header>
    <?php 
    //QUESTIONS
        $q1 = "Do you journal?";
        $q2 = "What/who are your top 3 priorities?";
        $q3 = "Do you find making decisions stressful?";
        $q4 = "What is one area you need to make an intentional decision if your life?";
        $q5 = "What is one specific distraction that you need to do less or eliminate?";
        $q6 = "How many hours of sleep do you get per night on average?";
        $q7 = "Do you struggle with confidence?";
        $q8 = "What brings you joy?";
        $q9 = "Why do you think it is hard for people to make a commitment?";
        $q10 = "How many true close friends do you have?";
        $q11 = "How often do you think about the consequences before you make a decision?";
        $q12 = "Are you open or willing to have a mentor?";
        $q13 = "What is one of the most difficult consequences you have ever had to face?";
        $q14 = "Is your school or job a place that inspires you?";
        $q15 = "What teacher or mentor has made the greatest impact in your life, and how?";
        $q16 = "Do you have a consistent morning routine?";
        $q17 = "What time do you get to bed?";
        $q18 = "If you could eliminate one habit that is not the best for you, what would it be?";
        $q19 = "Are you currently in a relationship?";
        $q20 = "What relationship advice would you give your younger self";
        $q21 = "What do you want your older self to never forget?";
        $q22 = "How has yournestbest* made a difference in your life?";
    ?>