<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146838744-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-146838744-1');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="shortcut icon" type="image/png" href="images/ynb_favicon.png" />
    <script src="https://kit.fontawesome.com/7b956aa31a.js"></script>
    <title>Your Next Best | <?php print $pageTitle ?></title>
    <?php 
        if($pageTitle == 'Sign Up'){
            print '<script src="https://www.google.com/recaptcha/api.js?render=6LfLxscUAAAAAIWhHkq0EeIoftn1jW1qP0jUVtli"></script>';
        }
    ?>
</head>

<body>