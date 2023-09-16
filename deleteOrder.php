<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    // Check if the form was submitted
    if(isset($_POST['order_id']))
    {
        $order_id= $_POST['order_id'];
    } else
    {
        header("location:manager.php");
        exit();
    }
        // Database connection
        require_once("settings.php"); 
        
        // SQL query to delete the order
        $deleteQuery = "DELETE FROM orders WHERE order_id = '$order_id' AND order_status = 'PENDING'";
        
        // Execute the query
        $result = mysqli_query($dbConnect, $deleteQuery);
        
        if ($result) {
            header("location:manager.php?message=".mysqli_affected_rows($dbConnect). "   record(s) deleted. <br/>");
        } else {
            header("location:manager.php?message=Error deleting order.<br/>");
        }
        
        // Close the database connection
        mysqli_close($dbConnect);
    
?>
</body>
</html>