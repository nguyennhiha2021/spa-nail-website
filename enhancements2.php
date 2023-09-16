<!DOCTYPE html>
<html lang="en" id="enhancements">
<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa -  Enhancements 2</title>
    <meta name="description" content="A page that lists any enhancements you have made" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
     <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body id="enhancements2">
     <?php
            include_once("header.inc");
        ?> 
    <section>
        <h1>Enhancements 2</h1>
              <div class="title-container">
                <p>1. On payment.html, implement a timer so that the user only has a limited time to complete the payment after which a warning is displayed / then the browser redirects to the home page.</p>
                <p> A programmer has to use setInterval() function and clearInterval() to implement this feature</p>
                <p> It has been used in <a href ="payment.php">Payment</a></p>
                <p>Reference source: <a href= "https://www.w3schools.com/jsref/met_win_setinterval.asp">https://www.w3schools.com/jsref/met_win_setinterval.asp </a>,
                <a href= "https://www.w3schools.com/jsref/met_win_clearinterval.asp">https://www.w3schools.com/jsref/met_win_clearinterval.asp</a></p>
                <p>2. Use features to put 2 javascript files in 1 html file without conflict </p>
                <p> A programmer has to use window.addEventListener() function implement this feature, cannot use window.onload=init.</p>
                <p> It has been used in <a href ="payment.php">Payment</a></p>
                 <p>Reference source: <a href= "https://stackoverflow.com/questions/67212323/two-js-files-with-window-onload-function-are-conflicting">https://stackoverflow.com/questions/67212323/two-js-files-with-window-onload-function-are-conflicting</a></p>
            </div>
    </section>

    <?php
            include_once("footer.inc");
        ?>
</body>
</html>
