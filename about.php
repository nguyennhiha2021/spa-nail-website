<!DOCTYPE html>
<html lang="en" id="about">
<head>
    <meta charset="UTF-8">
    <title>Luna Nail&Spa- About</title>
    <meta name="description" content="A page about your assignment" >
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Ha Nguyen" >
    <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/enhancements.css">
</head>
<body>
    <?php
            include_once("header.inc");
        ?> 
    <section class="title-container">
        <h1>About Me</h1>
     </section>
     <section id="personal-details">
        <section id ="photo">
        <figure><img src="styles/images/photo.png" alt="Nguyen Nhi Ha" width=100></figure>
        </section>
        <dl>
                <dt><strong>Name:</strong></dt> <dd>Nguyen Nhi Ha</dd>
                <dt><strong>Student ID:</strong></dt> <dd>1047479912</dd>
                <dt><strong>Course:</strong></dt>
                <dd>1. Creating Web Application</dd>
                <dd>2. Technology Enquiry Project</dd>
                <dd>3. Data Management in Big Data Age</dd>
                <dt><strong>Email:</strong></dt><dd><a href=mailto:104749912@student.swin.edu.au>104749912@student.swin.edu.au </a></dd>
                <dt><strong>Age:</strong></dt><dd> 25</dd>
                <dt><strong>Gender:</strong></dt> <dd>Female</dd>
                <dt><strong>Location:</strong></dt> <dd>Sydney, Australia</dd>
                <dt><strong>Hometown:</strong></dt> <dd>Hanoi, Vietnam</dd>
        </dl>
        </section>
        <section id= "timetable">
            <h2 class="center">Swinburne Timetable</h2>
            <table>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
                <tr>
                    <td>9:00 AM - 12:00 AM</td>
                    <td></td>
                    <td>Technology Enquiry Project</td>
                    <td>Data Management for Big Data Age</td>
                    <td>Creating Web Application</td>
                    <td></td>
                </tr>
                <tr>
                    <td>12:00 AM - 3:00 PM</td>
                    <td></td>
                    <td></td>
                    <td>Creating Web Application</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3:00 PM - 6:00 PM</td>
                    <td></td>
                    <td>Self-study</td>
                    <td></td>
                    <td>Self-study</td>
                    <td></td>
                </tr>
            </table>
        </section>
        <?php
                include_once("footer.inc");
            ?>
</body>
</html>
