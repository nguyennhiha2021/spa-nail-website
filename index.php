<!DOCTYPE html>
<html lang="en" id="index">

<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa - Home</title>
   <meta name="description" content="An introductory / home page" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/enhancements.css">
    <script src="scripts/part2.js"></script>
</head>
<body>
   <?php
            include_once("header.inc");
        ?> 
    <section class="title-container">
        <h1>Welcome to Luna Nail&Spa</h1>
        <p>Relax and indulge in our luxurious nail treatments.</p>
    </section>
    <img src="images/BOOK-NOW-BUTTON.png" alt="Nail Spa" usemap="#spa-map" class="center">
        <map name="spa-map">
            <area shape="rect" coords="94,104,570,850" href="enquire.php" alt="BOOK NOW">
        </map>
    <?php
            include_once("footer.inc");
        ?>
</body>
</html>
