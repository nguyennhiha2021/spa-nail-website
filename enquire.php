<!DOCTYPE html>
<html lang="en" id="enquire">
<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa - Enquire</title>
    <meta name="description" content="A product enquiry page" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/enhancements.css">
    <script src="scripts/part2.js"></script>
</head>
<body id="enquire">
         <?php
            include_once("header.inc");
        ?> 
    <section class="title-container">
        <h1>Book appointment with us</h1>
    </section>
    <section>
            <?php
                if (isset($_GET['message']))
                {
                $message = $_GET['message'];
                echo "<p style = 'color:red'>$message</p>";   
                }
              
            ?>
        <form id="enquire-form" action="process_order.php" method="POST">
            <label for="firstName"><strong>First Name:</strong></label>
            <input type="text" id="firstName" name="firstName">
            <label for="lastName"><strong>Last Name:</strong></label>
            <input type="text" id="lastName" name="lastName">
            <label for="email"><strong>Email Address:</strong></label>
            <input type="email" id="email" name="email" >
            <fieldset>
                <legend>Address</legend>
                <label for="streetAddress">Street Address:</label>
                <input type="text" id="streetAddress" name="streetAddress" >
                <label for="suburb">Suburb/Town:</label>
                <input type="text" id="suburb" name="suburb" >
                <label for="state">State:</label>
                <select id="state" name="state">
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>
                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" name="postcode" >
            </fieldset>
            <label for="phone"><strong>Phone Number:</strong></label>
            <input type="text" id="phone" name="phone" placeholder="e.g., 1234567890">
            <label><strong>Preferred Contact:</strong></label>
            <label for="contactEmail"><input type="radio" id="cemail" name="contactMethod" value="email">Email</label>
            <label for="contactPost"><input type="radio" id="cpost" name="contactMethod" value="post">Post</label>
            <label for="contactPhone"><input type="radio" id="cphone" name="contactMethod" value="phone">Phone</label>
            <!-- Add other product options with price details -->
            <label for="product"><strong>Product Enquiry:</strong></label>
            <select id="product" name="product">
                <option value="">Select a Service</option>
                <option value="Manicure">Manicure - $25</option>
                <option value="Pedicure">Pedicure - $35</option>
            </select>
            <label><strong>Services:</strong></label>
            <label for="feature1"><input type="checkbox" id="feature1" name="features" value="feature1">Cuticle care</label>
            <label for="feature2"><input type="checkbox" id="feature2" name="features" value="feature2">Nail shaping</label>
            <label for="feature3"><input type="checkbox" id="feature3" name="features" value="feature3">Hand massage</label>
            <label for="feature4"><input type="checkbox" id="feature4" name="features" value="feature4">Foot soak</label>
            <label for="feature5"><input type="checkbox" id="feature5" name="features" value="feature5">Exfoliation</label>
            <label for="feature6"><input type="checkbox" id="feature6" name="features" value="feature6">Foot massage</label>

            <!-- Example quantity selection -->
            <label for="quantity">Services Quantity:</label>
            <input type="number" id="quantity" name="quantity">

            <label for="comment"><strong>Comment:</strong></label>
            <textarea id="comment" name="comment"></textarea>
            <p><span id="message"></span></p>

            <!-- Replace the submit button with a link to payment.html -->
            <button type="submit" class="button-link">Pay Now</button>
            


        </form>
    </section>
    <?php
            include_once("footer.inc");
        ?>
</body>
</html>
