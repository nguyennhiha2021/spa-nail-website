<!DOCTYPE html>
<html lang="en" id="enhancements">
<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa -  Enhancements 3</title>
    <meta name="description" content="A page that lists any enhancements you have made" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body id="enhancements3">
  <?php
            include_once("header.inc");
        ?> 
    <section>
        <h1>Enhancements 3</h1>
              <div class="title-container">
                <p>1.Create a "Log-in" page to use the stored data (can view "users" table in database to get username and password for log in), and control access to the manager web pages. Ensure the manager web page cannot be entered directly using a URL.</p>
                <p> A programmer has to use session_start() function to implement this feature</p>
                <p> It has been used in <a href ="log_in.php">Log In</a></p>
                <p>Reference source:
                <a href= "https://www.w3schools.com/php/php_sessions.asp">https://www.w3schools.com/php/php_sessions.asp</a></p>
                <p>2. Create a  "Log-out” button. Provide a ‘log-out’ link on the manager page if ‘logged in’. </p>
                <p> A programmer has to use session_unset() and session_destroy() function implement this feature</p>
                <p> It has been used in <a href ="manager.php">Log Out</a></p>
                <p>Reference source:
                <a href= "https://www.w3schools.com/php/php_sessions.asp">https://www.w3schools.com/php/php_sessions.asp</a></p>
            </div>
    </section>

    <?php
            include_once("footer.inc");
        ?>
</body>
</html>
