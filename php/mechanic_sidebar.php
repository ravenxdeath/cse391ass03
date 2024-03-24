
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
        <li><a href="car_info.php" style="
            color: #fff;
            text-decoration: none;
            display: block;  
            padding: 10px 0;  
        ">Take Appointment </a></li>

        <li><a href="show_mechanic_info.php" style="
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        ">Mechanic Info </a></li>

        <li><a href="show_mechanic_slots.php" style="
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        ">Mechanic Slots</a></li>

        <li><a href="show_appointment_info.php" style="
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        ">Appointment Table </a></li>

        
        <li><a href="change_appointment_status.php" style="
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        ">Appointment Status </a></li>
 
    </ul>
</div>
