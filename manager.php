<!DOCTYPE html>
<html lang="en" id="manager">
<head>
	<meta charset="UTF-8">
	<title>Luna Nail&Spa - Manager</title>
 	<meta name="description" content="A product manager page" >
 	<meta name="keywords" content="HTML5, tags">
 	<meta name="author" content="Ha Nguyen" >
 	<link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
 	<link rel="stylesheet" href="styles/enhancements.css">
</head>
<body id="manager">
    <?php
            include_once("header.inc");
        ?> 
    <section class="title-container">
	<h1>Order Management</h1>
	</section>
		<section>

		<fieldset>
		<legend><strong>Search customer</strong></legend>
		<form method="post" action="manager.php">
			<p><label for="fullname">Full Name: <input type="text" name="fullname" id="fullname"/> </label></p>
			<p><label for="email">Email: <input type="text" name="email" id="email"/> </label></p>
			<input type="submit" value="Search"/>
	</form>
	</fieldset>

		<fieldset>
		<legend><strong>Search order</strong></legend>
		<form method="post" action="manager.php">
			<p><label for="order_id">Order Enquire Number: <input type="text" name="order_id" id="order_id"/> </label></p>
			<p><label for="product_name">Service: <input type="text" name="product_name" id="product_name"/> </label></p>
			<p><label for="order_status">Order Status: <input type="text" name="order_status" id="order_status"/> </label></p>
			<input type="submit" value="Search"/>
	</form>
	</fieldset>

		<fieldset>
		<legend><strong>Delete order</strong></legend>
		<form method="post" action="deleteOrder.php">
			<p><label for="order_id">Order Enquire Number: <input type="text" name="order_id" id="order_id"/> </label></p>
			<input type="submit" value="Delete"/>
	</form>
	</fieldset>

		<fieldset>
		<legend><strong>Sort by total cost</strong></legend>
		<form method="post" action="manager.php">
			<input type="submit" name="asc" value="ascending"/><br><br>
			<input type="submit" name="desc" value="descending"/><br><br>
	</form>
	</fieldset>
	</section>

	<hr />
	<section id= "timetable">
		<fieldset>
			<legend>Order Details </legend>
<?php
	error_reporting(E_ALL);
ini_set('display_errors', 1);

    if (isset($_GET['message']))
    {
    	$message = $_GET['message'];
        echo "<p style = 'color:brown'>$message</p>";   
    }

    require_once('settings.php');

    if(isset($_POST['fullname']) && isset($_POST['email']))
    {
    	$fullname = $_POST['fullname'];
    	$email = $_POST['email'];
    	$query = "SELECT * from orders where full_name like '%$fullname%' and email like '%$email%';"; 
    }
    else if (isset($_POST['order_id']))
    {
    	$order_id = $_POST['order_id'];
    	$product_name = $_POST['product_name'];
    	$order_status = $_POST['order_status'];
    	$query = "SELECT * from orders where order_id = '$order_id' and product_name = '$product_name' AND order_status = '$order_status';";
    }
     else if (isset($_POST['asc']))
    {
    	$query = "SELECT * from orders order by order_cost asc;";
    }
     else if (isset($_POST['desc']))
    {
    	$query = "SELECT * FROM orders order by order_cost desc;";
    }
    else if (isset($_GET['updated_order_id'])) 
    {
        $updated_order_id = $_GET['updated_order_id'];
            
        // Modify the query to fetch the specific updated row
        $query = "SELECT * FROM orders WHERE order_id = '$updated_order_id';";
    }
    else {
    	//All Orders
    	$query = "SELECT * FROM orders;";
    }
  
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
					  <th>Update status here</th>
					  </tr>";

				while($record)
				{
					echo "<tr>"; // Opening <tr> tag

				    echo "<td>{$record['order_id']}</td>";
				    echo "<td>{$record['full_name']}</td>";
				    echo "<td>{$record['email']}</td>";
				    echo "<td>{$record['product_name']}</td>";
				    echo "<td>{$record['payment_amount']}</td>";
				    echo "<td>$" . $record['order_cost'] . "</td>";
				    echo "<td>{$record['order_time']}</td>";
				    echo "<td>{$record['order_status']}</td>";
				    echo "<td>
				    		<a href='updateStatus.php?status_update=\"PENDING\"&order_id={$record['order_id']}'>PENDING</a><br/>
				    		<a href='updateStatus.php?status_update=\"FULFILLED\"&order_id={$record['order_id']}'>FULFILLED</a><br/>
				    		<a href='updateStatus.php?status_update=\"PAID\"&order_id={$record['order_id']}'>PAID</a><br/>
				    		<a href='updateStatus.php?status_update=\"ARCHIVED\"&order_id={$record['order_id']}'>ARCHIVED</a><br/>
				    </td>";

				    echo "</tr>"; // Closing </tr> tag

					$record = mysqli_fetch_assoc($result); //END OF WHILE 

				}
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

?>
</fieldset>
<hr/>
<form action="log_out.php" method="post">        
                <input type="submit" value="Log Out">     
        </form>
</section>

 <?php
            include_once("footer.inc");
        ?>
</body>
</html>