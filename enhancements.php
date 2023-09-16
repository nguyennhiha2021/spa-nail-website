<!DOCTYPE html>
<html lang="en" id="enhancements">
<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa -  Enhancements</title>
    <meta name="description" content="A page that lists any enhancements you have made" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body>
  <?php
            include_once("header.inc");
        ?> 
    <section>
        <h1>Enhancements</h1>
        <h2><a class = "button-link" href="enhancements2.php">Enhancements 2</a> </h2>
        <h2><a class = "button-link" href="enhancements3.php">Enhancements 3</a> </h2>
              <div class="title-container">
                <p>1. Elevated title: This title can show up from under.</p>
                <p> It has been used in <a href ="index.php">Home</a>, <a href="product.php">Product</a>, <a href="enquire.php">Enquire</a>, <a href="about.php">About</a>, <a href="enhancements.php">Enhancements</a></p>
                <p>Reference source: <a href= "https://codepen.io/matchboxhero/pen/XexJoL">https://codepen.io/matchboxhero/pen/XexJoL </a></p>
                <p>2. Can click the image button and enquiry form will show up </p>
                <p> It has been used in <a href ="index.php">Home</a></p>
                 <p>Reference source: <a href= "https://www.w3schools.com/html/html_images_imagemap.asp">https://www.w3schools.com/html/html_images_imagemap.asp </a></p>
            </div>
        <img src="images/BOOK-NOW-BUTTON.png" alt="Nail Spa" usemap="#spa-map">
        <map name="spa-map">
            <area shape="rect" coords="94,104,570,850" href="enquire.php" alt="BOOK NOW">
        </map>
    </section>

    <?php
        include_once("footer.inc");
        ?>
</body>
</html>
