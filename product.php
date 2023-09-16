<!DOCTYPE html>
<html lang="en" id="product">
<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa - Product</title>
    <meta name="description" content="A product description page" >
     <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
     <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body>
    <?php
            include_once("header.inc");
        ?> 
    <section class="title-container">
        <h1>Our Products - Luna Nail&Spa Services</h1>
    </section>
        <img src="styles/images/nail-polish.jpg" alt="Nail Polish" width="600">
        <section>
            <h3>Manicure</h3>
            <ul>
                <li>Cuticle care</li>
                <li>Nail shaping</li>
                <li>Hand massage</li>
            </ul>
        </section>
        <section>
            <h3>Pedicure</h3>
            <ul>
                <li>Foot soak</li>
                <li>Exfoliation</li>
                <li>Foot massage</li>
            </ul>
        </section>
        <aside>
            <h3>Special Offer!!</h3>
            <h4>Book a combination of manicure and pedicure and get 10% off.</h4>
        </aside>
        <table>
            <tr>
                <th>Service</th>
                <th>Duration</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>Manicure</td>
                <td>45 minutes</td>
                <td>$25</td>
            </tr>
            <tr>
                <td>Pedicure</td>
                <td>60 minutes</td>
                <td>$35</td>
            </tr>
        </table>
        <h2>Why you should choose us? </h2>
        <ol>
            <li>Relaxing atmosphere</li>
            <li>Experienced nail technicians</li>
            <li>Wide range of nail polish colors</li>
            <li>High-quality nail care products</li>
        </ol>
    <h2>Visit Us </h2>
    <dl>
        <dt>Location:</dt> 
            <dd>123 George St, Circular Quay, NSW</dd>
        <dt>Opening hours:</dt>
           <dd>Monday-Fiday: 9am - 6pm </dd>
           <dd>Saturday: 10am - 5pm </dd>
           <dd>Sunday: Close</dd>
       </dl>
     <?php
        include_once("footer.inc");
     ?>
</body>
</html>
