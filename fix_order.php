<!DOCTYPE html>
<html lang="en" id="payment">
<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa - Fix Order</title>
    <meta name="description" content="A product fix order page" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/enhancements.css">
    <script src="scripts/part2.js"></script>
    <script src="scripts/enhancements.js" defer></script>
</head>
<body id="payment">
    <?php
            include_once("header.inc");
        ?> 
    <section class="title-container">
    <h2>Make your payment</h2>
    </section>
    <p id="timer-display" class="button-link" ></p>
    <form id="payment-form" action="process_order.php" method="post">
        <section>
        <h3>Booking Details:</h3>
        <label for="fullname"><strong>Full Name:</strong></label>
        <input type="text" id="fullname" name="fullname">
        <label for="email"><strong>Email:</strong></label>
        <input type="text" id="email" name="email">
        <label for="product"><strong>Service:</strong></label>
        <input type="text" id="product1" name="product">
        <label for="quantity"><strong>Quantity:</strong></label>
        <input type="text" id="quantity1" name="quantity">
        <label for="totalprice"><strong>Total Price:</strong> $</label>
        <input type="text" id="totalprice" name="totalprice">
    </section>
        <!--Display card payment form -->
    <section>
        <h3>Payment Details:</h3>
        <?php
                if (isset($_GET['message']))
                {
                $message = $_GET['message'];
                echo "<p style = 'color:red'>$message</p>";   
                }
              
            ?>
    
            <label for="card-type">Credit Card Type:</label>
            <select id="card-type" name="card-type" >
                <option value="">Select Credit Card Type</option>
                <option value="visa">Visa</option>
                <option value="mastercard">Mastercard</option>
                <option value="american-express">American Express</option>
        <!-- Add other credit card options if needed -->
            </select>

            <label for="card-name">Name on Credit Card:</label>
            <input type="text" id="card-name" name="card-name" >

            <label for="card-number">Credit Card Number:</label>
            <input type="text" id="card-number" name="card-number" >

            <label for="expiry-date">Expiry Date (mm-yy):</label>
            <input type="text" id="expiry-date" name="expiry-date">

            <label for="cvv">Card Verification Value (CVV):</label>
            <input type="text" id="cvv" name="cvv">

            <p><span id="message"></span></p>

            <button type="submit" class="button-link" >Check Out</button>
            <button type="button" onclick="cancelOrder()" class="button-link" >Cancel Order</button>
        </form>
        </section>
        <?php
            include_once("footer.inc");
        ?>
</body>
</html>

