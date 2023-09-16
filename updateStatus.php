<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    // Check if the form was submitted
    if(isset($_GET['status_update']))
    {
        $status_update = $_GET['status_update'];
        $order_id = $_GET['order_id'];
    } else
    {
        header("location:manager.php");
        exit();
    }
        // Database connection
        require_once("settings.php"); 
        
        // SQL query to delete the order
        $updateQuery = "UPDATE orders SET order_status = $status_update where order_id = $order_id;";
        
        // Execute the query
        $result = mysqli_query($dbConnect, $updateQuery);
        
        if ($result) {
            header("location:manager.php?message=".mysqli_affected_rows($dbConnect)." record(s) updated.&updated_order_id=$order_id <br/>");
        } else {
            header("location:manager.php?message=Error updating order.<br/>");
        }
        
        // Close the database connection
        mysqli_close($dbConnect);
    
?>
</body>
</html>