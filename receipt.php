<!DOCTYPE html>
<html lang="en" id="receipt">
<head>
	<meta charset="UTF-8">
    <title>Luna Nail&Spa - Receipt</title>
    <meta name="description" content="A product receipt page" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body id="receipt">
  <?php
        include_once("header.inc");
    ?> 
    <section class="title-container">
	<h1>Receipt</h1>
	</section>
	<section id= "timetable">
		<fieldset>
			<legend>Order Receipt </legend>
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Database connection
    require_once("settings.php"); 
    
    if (isset($_GET['fullname']) && isset($_GET['email']))
        {
        	 $fullname = $_GET['fullname'];
        	 $email = $_GET['email'];
    
    $query = "SELECT * FROM orders where full_name ='$fullname' and email ='$email';";
  
  
	// Checks if connection is successful
	if ($dbConnect) {
		$result = mysqli_query($dbConnect, $query);
		if ($result) {
			$record = mysqli_fetch_assoc($result);

			if($record) {

				echo "<table border = '1'>";
				echo "<tr>
					  <th>Order ID</th>
					  <th>Full Name</th>
					  <th>Email</th>
					  <th>Service Name</th>
					  <th>Order Amount</th>
					  <th>Order Cost</th>
					  <th>Order Time</th>
					  <th>Order Status</th>
					  <th>Credit Card Information</th>
					  </tr>";

				
					echo "<tr>"; // Opening <tr> tag

				    echo "<td>{$record['order_id']}</td>";
				    echo "<td>$fullname</td>";
				    echo "<td>$email</td>";
				    echo "<td>{$record['product_name']}</td>";
				    echo "<td>{$record['payment_amount']}</td>";
				    echo "<td>$" . $record['order_cost'] . "</td>";
				    echo "<td>{$record['order_time']}</td>";
				    echo "<td>{$record['order_status']}</td>";
				    echo "<td>
				    		********
				    </td>";

				    echo "</tr>"; // Closing </tr> tag

					$record = mysqli_fetch_assoc($result); //END OF WHILE 

				
				echo "</table>";
				mysqli_free_result($result);
				
			} else {

				 echo "<p style = 'color:red'>No records</p>";  
			}
		} else {

			echo "<p style = 'color:red'>Table does not exist or select operation is unsuccessful</p>";  
		}
		mysqli_close($dbConnect);

	} else {

		echo "<p style = 'color:red'>Unable to connect database</p>"; 
	}
}

?>
</fieldset>
</section>
 <?php
            include_once("footer.inc");
        ?>
</body>
</html>