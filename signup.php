<?php 
    $pageTitle = "Sign Up";
    require('includes/connection.php');
    include('includes/head.php');
?>

<div class="full-bg">
    <div class="full-page">
        <?php 
        include('includes/header.php');
    ?>
        <div class="form-wrapper fade-2">
            <?php 
            if(isset($_GET['error'])){
                print '<p class="error-msg">'.$_SESSION['message'].'</p>';
            } elseif(isset($_GET['success'])){
                print '<p class="success-msg">Thank you for using your code: '.$_SESSION['code'].'</p>'; 
            }
        ?>
            <h2>Before we get started with the program, we'd love to get to know you a little.</h2>
            <form class="signup-form" action="signup_confirm.php" method="post">
                <div class="input-container">
                    <label for="fName">
                        Name
                        <input type="text" name="fName" id="fName" placeholder="Jane" value="<?php 
                    if(isset($_GET['error']) && isset($_SESSION['name'])){
                        print $_SESSION['name'];
                    }
                ?>">
                    </label>
                </div>
                <div class="input-container">
                    <label for="email">
                        Email (required)
                        <input type="email" name="email" id="email" placeholder="jane@gmail.com" value="<?php 
                    if(isset($_GET['error']) && isset($_SESSION['email'])){
                        print $_SESSION['email'];
                    }
                ?>
                " required>
                    </label>
                </div>

                <div class="input-container">
                    <label for="password">
                        Password (required)
                        <input type="password" name="password" id="password" value="" required>
                    </label>
                </div>

                <div class="input-container">
                    Confirm Password (required)
                    <label for="password-confirm">
                        <input type="password" name="password-confirm" id="password-confirm" value="" required>
                    </label>
                    </p>
                </div>

                <div class="input-container">
                    When is your Birthday?
                    <label for="birthday">
                        <input type="date" name="birthday" id="birthday" value="<?php if(isset($_GET['error']) && isset($_SESSION['birthday'])){ print $_SESSION['birthday'];
                    }
                ?>
                ">
                    </label>
                </div>

                <div class="input-container">
                    <p class="form-questions">Are you in school right now?</p>
                    <div class="custom-select">
                        <select name="grade" id="grade">
                            <option value="0">Please Select</option>
                            <option value="grade 7">Grade 7</option>
                            <option value="grade 8">Grade 8</option>
                            <option value="grade 9">Grade 9</option>
                            <option value="grade 10">Grade 10</option>
                            <option value="grade 11">Grade 11</option>
                            <option value="grade 12">Grade 12</option>
                            <option value="post high school">Post High School</option>
                            <option value="college/university">College/University</option>
                            <option value="professional">I'm a Professional</option>
                            <option value="parent">I'm a Parent</option>
                            <option value="teacher">I'm a Teacher</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="input-container">
                    <p class="form-questions">What is your gender?</p>
                    <div class="radio-btn-container">
                        <label class="custom-radio-container" for="gender-male">Male
                            <input type="radio" name="gender" id="gender-male" value="Male">
                            <span class="custom-radio-btn"></span>
                        </label>
                        <label class="custom-radio-container" for="gender-female">Female
                            <input type="radio" name="gender" id="gender-female" value="Female">
                            <span class="custom-radio-btn"></span>
                        </label>
                        <label class="custom-radio-container" for="gender-none">Prefer not to say
                            <input type="radio" name="gender" id="gender-none" value="Prefer not to say">
                            <span class="custom-radio-btn"></span>
                        </label>
                    </div>
                </div>

                <div class="g-recaptcha" data-sitekey="6LfLxscUAAAAAIWhHkq0EeIoftn1jW1qP0jUVtli"></div>

                <div class="next-btn-wrapper">
                    <!-- <p><em>*This information will never be shared. It is simply to help us help you.</em></p> -->
                    <input class="signup-submit" type="submit" name="submit" value="Submit">
                    <input type="hidden" id="token" name="token">
                </div>
            </form>
        </div>

        <?php 
            include('includes/footer.php');
        ?>
    </div> <!-- END full-page -->
</div> <!-- END full-bg -->