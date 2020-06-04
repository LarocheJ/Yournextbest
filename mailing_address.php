<?php 
    $pageTitle = "Address";
    require('includes/connection.php');
    include('includes/head.php');
?>
<div class="wrapper">
    <?php 
        include('includes/header.php');
    ?>
    <div class="page-header">
        <h1>Tell us where to send your package</h1>
    </div><!-- END welcome-header -->
    <div class="fade-2">
        <div class="blurred-bg">
            <?php include("includes/breadcrumbs.php") ?>
            <div class="white-box">
                <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'address_exists'){
                        ?>
                <p class="error-msg"><i class="fas fa-exclamation-triangle"></i> Sorry, this address already exists.</p>
                <?php
                    } elseif($_GET['error'] == 'sqlerror'){
                        ?>
                <p class="error-msg"><i class="fas fa-exclamation-triangle"></i> Sorry, there was an error. Please try
                    again later.</p>
                <?php
                    }
                }
                ?>
                <form action="mailing_address_confirm.php" method="post" class="mailing_address_form">
                    <label for="fullName">Full Name</label>
                    <input type="text" name="fullName" id="fullName">

                    <div class="same-line">
                        <div id="address">
                            <label for="address">Address</label>
                            <input type="text" name="address">
                        </div>

                        <div id="postal">
                            <label for="postal">Postal Code</label>
                            <input type="text" name="postal">
                        </div>
                    </div>

                    <div class="same-line">
                        <div id="country">
                            <label for="country">Country</label>
                            <select name="country">
                                <option value="canada">Canada</option>
                                <option value="usa">USA</option>
                            </select>
                        </div>

                        <div id="city">
                            <label for="city">City</label>
                            <input type="text" name="city">
                        </div>
                    </div>

                    <input type="submit" name="address_submit" value="Send me stuff!">
                </form>
            </div>
        </div><!-- END blurred-bg -->
    </div><!-- END fade-2 -->
</div><!-- END wrapper -->
<?php 
    include('includes/footer.php');
?>