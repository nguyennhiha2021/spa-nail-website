<!DOCTYPE html>
<html lang="en">
	<head></head>
	<body>
		<?php
			error_reporting(E_ALL);
			ini_set('display_errors', 1);

			function sanitize_input($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;

			}

				if (isset($_POST['firstName'])) //Come from Enquire Form
				{
				$errMsg = "";
				// Get the form data
				$firstName = $_POST['firstName'];
				$firstName = sanitize_input($firstName);

				$lastName = $_POST['lastName'];
				$lastName = sanitize_input($lastName);

				$email = $_POST['email'];
				$email = sanitize_input($email);

				$streetAddress = $_POST['streetAddress'];
				$streetAddress = sanitize_input($streetAddress);

				$suburb = $_POST['suburb'];
				$suburb = sanitize_input($suburb);

				$state = $_POST['state'];

				$postcode = $_POST['postcode'];
				$phone = $_POST['phone'];
				$contactMethod = $_POST['contactMethod'];
				$product = $_POST['product'];
				$features = $_POST['features'];
				$quantity = $_POST['quantity'];
				$comment = $_POST['comment'];

				// Validate the form data
				if (empty($firstName)) 
				    $errMsg .= 'Please enter your first name. <br />';
				else if (strlen($firstName) > 20 )
				    $errMsg .= 'Firstname cannot be more than 20 characters <br />';
				else if (!preg_match("/^[a-zA-Z ]*$/",$firstName) ) 
				    $errMsg .= 'Firstname cannot be more than 20 characters <br />';
				
				if (empty($lastName)) 
				    $errMsg .= 'Please enter your last name. <br />';
				else if (strlen($lastName) > 20 )
				    $errMsg .= 'Lastname cannot be more than 20 characters <br />';
				else if (!preg_match("/^[a-zA-Z ]*$/",$lastName) ) 
				    $errMsg .= 'Lastname cannot be more than 20 characters <br />';
				
				if (empty($email)) 
				    $errMsg .= 'Please enter your email address.<br />';
				else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				    $errMsg .= 'Please enter a valid email address.<br />';

				if (empty($streetAddress)) 
				    $errMsg .= 'Please enter your street address.<br />';
				
				if (empty($suburb)) 
				    $errMsg .= 'Please enter your suburb or town.<br />';
				if (empty($state)) 
				    $errMsg .= 'Please select your state.<br />';
				if (empty($postcode)) 
				    $errMsg .= 'Please enter your postcode.<br />';
				if (empty($phone)) 
				    $errMsg .= 'Please enter your phone number.<br />';
				
				if (empty($contactMethod )) 
    				$errMsg .= "Invalid contact method! <br/>";

    			if (empty($product)) 
    				$errMsg .= "Please select a service. <br/>";

    			if (empty($features))
    				$errMsg .= "Please select at least one service. <br/>";

    			// Quantity check
    			if (empty($quantity))
    				$errMsg .= "Please select quantity. <br/>";
			    else if (!is_numeric($quantity) || $quantity <= 0) 
			    	$errMsg .= "Quantity must be a positive integer.<br />";

				// Postcode/State check
				if (!validatePostcodeAndState($postcode, $state)) 
			    $errMsg .= "Invalid postcode and state combination.<br />"; 
		
				// Decide
				if($errMsg != "")
				{
					header("location:enquire.php?message=$errMsg");
					exit();
				}
				else 
				{
					header("location:payment.php");
					exit();
				}
			}
			else if (isset($_POST['card-type'])) //Come from Payment Form
			{

				$errMsg = "";

				$fullname = $_POST['fullname'];

				$email = $_POST['email'];
				$product = $_POST['product'];
				$quantity = $_POST['quantity'];
				$totalprice = $_POST['totalprice'];

				//Calculate total cost
			    $price = 0;
			    if ($product == "Manicure") {
			        $price = 25;
			    } elseif ($product == "Pedicure") {
			        $price = 35;
			    }

			    $totalprice = $quantity*$price;

				// Get the form data
				$cardType = $_POST['card-type'];

				$cardName = $_POST['card-name'];
				$cardName = sanitize_input($cardName);

				$cardNumber = $_POST['card-number'];
				$cardNumber = sanitize_input($cardNumber);

				$expiryDate = $_POST['expiry-date'];
				$expiryDate = sanitize_input($expiryDate);

				$cvv = $_POST['cvv'];
				$cvv = sanitize_input($cvv);


				// Validate the form data
				if (empty($cardType)) 
				    $errMsg .= 'Please choose your card type. <br />';
		
				if (empty($cardName)) 
				    $errMsg .= 'Please enter your card name. <br />';

				if (empty($cardNumber)) 
				    $errMsg .= 'Please enter your card number. <br />';
		
				if (empty($expiryDate)) 
				    $errMsg .= 'Please enter card expiry date. <br />';
				

				if (!validateCreditCardNumber($cardNumber, $cardType))
    				$errMsg .= 'Invalid credit card number for the selected card type. <br/>';
		
				// Decide
				if($errMsg != "")
				{ //redirect to fix_order.php and show error
					header("location:fix_order.php?message=$errMsg");
				}
				else 
				{ //store data to databsae
					require_once("settings.php");
					if ($dbConnect) //connection is good
					{

						// SQL to create 'orders' table
						$query1 = "CREATE TABLE IF NOT EXISTS orders (
						        order_id INT AUTO_INCREMENT PRIMARY KEY,
						        full_name VARCHAR(20) NOT NULL,
						        email VARCHAR(50) NOT NULL,
						        product_name VARCHAR(200) NOT NULL,
						        payment_amount INT NOT NULL,
						        order_cost INT NOT NULL,
						        order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
						        order_status ENUM('PENDING', 'FULFILLED', 'PAID', 'ARCHIVED') NOT NULL DEFAULT 'PENDING'
						    	);";
						$result1 = mysqli_query($dbConnect, $query1);
						if ($result1)
						{
							echo "<p>Table is created successfully! </p>";
						}
						else 
						{
							echo "<p>Table creation is failed. </p>";
						}

						//Insert data into orders table

						$query2 = "INSERT INTO orders (full_name, email, product_name, payment_amount, order_cost)
									VALUES ('$fullname','$email','$product','$quantity','$totalprice');";

						$result2 = mysqli_query($dbConnect, $query2);
						if ($result2)
						{
							echo "<p>Order placed successfully! </p>";
						}
						else 
						{
							echo "<p>Order failed. </p>". mysqli_error($dbConnect);
						}

						mysqli_close($dbConnect);
					}
					else
					{
						echo "<p>Unable to connect to database! </p>";
					}

					header("location:receipt.php?fullname=$fullname&email=$email");
					exit();
				}
		
			}

			
			

			function validatePostcodeAndState($postcode, $state) {
	    	switch ($state) {
	        case "VIC":
	            return preg_match('/^3|8/', $postcode);
	        case "NSW":
	            return preg_match('/^1|2/', $postcode);
	        case "QLD":
	            return preg_match('/^4|9/', $postcode);
	        case "NT":
	            return preg_match('/^0/', $postcode);
	        case "WA":
	            return preg_match('/^6/', $postcode);
	        case "SA":
	            return preg_match('/^5/', $postcode);
	        case "TAS":
	            return preg_match('/^7/', $postcode);
	        case "ACT":
	            return preg_match('/^0/', $postcode);
	        default:
	            return false;
	    		}
			}


			

			function validateCreditCardNumber($cardNumber, $cardType) {
		    switch ($cardType) {
		        case 'visa':
		            return preg_match('/^4\d{15}$/', $cardNumber);
		        case 'masterCard':
		            return preg_match('/^5[1-5]\d{14}$/', $cardNumber);
		        case 'american-express':
		            return preg_match('/^3[47]\d{13}$/', $cardNumber);
		        default:
		            return false;
    			}
			}

 		?>
	

	</body>
</html>
