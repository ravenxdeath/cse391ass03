
<?php
include 'db_connect.php';  
?>
<link rel="stylesheet" href="../css/style.css">

<div class="sidebar" style="
    position: fixed;
    top: 50%;  
    transform: translateY(-50%);  
    left: 0;  
    width: 150px;  
    height: 50%;
    background-color: #333;
    color: #fff;
    z-index: 999;  
    overflow-y: auto;  
">
    <ul class="sidebar-menu" style="
        list-style-type: none;
        padding: 0;
        margin-top: 50px;  
        text-align: center;  
    ">
        <li><a href="show_client_appointment.php" style="
            color: #fff;
            text-decoration: none;
            display: block;  
            padding: 10px 0;  
        ">Appointments</a></li>

        <li><a href="car_info.php" style="
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        ">Take an Appointment</a></li>

        <li><a href="rate_mechanic.php" style="
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        ">Rate a Mechanic</a></li>
        <li><a href="#" style="
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        ">Settings?</a></li>
        <!-- Add more menu items as needed -->
    </ul>
</div>
