<!DOCTYPE html>
<html lang="en" id="log_in">
<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa - Log In</title>
    <meta name="description" content="A product log in page" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body id="receipt">
  <?php
        include_once("header.inc");
    ?> 
   
    <section>
    	 <form action="log_in.php" method="post">
            <fieldset>
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            if (isset($_POST['username']) && isset($_POST['password'])) {
                session_start();
                $errMsg = "";
                // Get the form data
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Database connection
                require_once("settings.php");

                $query = "SELECT * FROM users where username = '$username' and password = '$password';";

                // Checks if connection is successful
                if ($dbConnect) {
                    $result = mysqli_query($dbConnect, $query);
                    if ($result) {
                        $record = mysqli_fetch_assoc($result);

                        if ($record) {
                            $_SESSION['username'] = $username;
                            $_SESSION['password'] = $password;
                            header("location: manager.php");
                        } else {
                            echo "<p style='color:red'>Invalid username or password.</p>";
                        }
                    } else {
                        echo "<p style='color:red'>Invalid username or password.</p>";
                    }
                    mysqli_close($dbConnect);
                } else {
                    echo "<p style='color:red'>Unable to connect to database.</p>";
                }
            } 

        ?>
                <legend>Log In</legend>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Log In">
                <a href="index.php"><input type="button" value="Cancel"></a>
            </fieldset>
        </form>
    </section>
    <?php
        include_once("footer.inc");
    ?>
</body>
</html>
