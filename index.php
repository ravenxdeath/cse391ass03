<?php include 'php/db_connect.php'; ?>

<link rel="stylesheet" href="css/style.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>MOTOR_METH</title>
</head>

<body class="space-grotesk-container">

<nav class="navbar">
    <div class="raven">
        <b class="fonta" style="margin-left: 20px;">MOTOR_METH</b>
    </div>
    <ul class="nav-list">
        <li><a href="../index.php">Home</a></li>
        <li><a href="aboutme.html">About Us</a></li>
        <li><a href="projects.html">Cars</a></li>
        <li><a href="php/car_info.php">Appointment</a></li>
        <li><a href="#contacts">Contacts</a></li>
        <li><a href="email.html">Email Us</a></li>
    </ul>
    <div class="rightNav">
        <input type="text" name="search" id="search">
        <button class="butt butt-small">Search</button>
    </div>
    <div class="burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</nav>




<main class="content-wrapper fontb">
    <section class="login-section txtshadowjutsu" style="text-align: center;  ">
        <div style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5));">

                <h2>Welcome to</h2>
                <h1>MOTOR_METH SERVICES</h1>
                <p>where speed and crystal service collide for the ultimate drive!</p>
        </div>
                <br><br>
        <div> 
        <a href="php/login.php" class="button" style="background-color: #333333; color: white; padding:  5px 10px; text-decoration: none; border-radius: 5px; font-size: 24px;">Login</a>
        <a href="php/signup.php" class="button" style="background-color: #333333; color: white; padding: 5px 10px;  text-decoration: none; border-radius: 5px; font-size: 24px;">Signup</a>
        </div>
 
    </section>
    <section>

</section>

</main>


<?php include 'php/footer.php'; ?>
