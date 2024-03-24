<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_mechanic'])) {
    $mechanic_id = $_POST['mechanic_id'];

    $delete_query = "DELETE FROM Mechanic WHERE MechanicID = '$mechanic_id'";
    $delete_result = mysqli_query($conn, $delete_query);
    if (!$delete_result) {
        echo "Error removing mechanic: " . mysqli_error($conn);
    } else {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

function getRemainingAppointments($conn, $mechanic_id, $daily_car_capacity) {
    $today = date("Y-m-d");
    $query = "SELECT COUNT(*) as numAppointments FROM Appointment WHERE MechanicID = '$mechanic_id' AND DATE(AppointmentDate) = '$today'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $appointments_today = $row['numAppointments'];
    return max(0, $daily_car_capacity - $appointments_today);
}

function getMechanicAppointments($conn, $mechanic_id) {
    $today = date("Y-m-d");
    $query = "SELECT * FROM Appointment WHERE MechanicID = '$mechanic_id' AND DATE(AppointmentDate) = '$today'";
    $result = mysqli_query($conn, $query);
    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }
    return $appointments;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Information</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .mechanic-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 300px;
            float: left;
        }

        .mechanic-info {
            font-weight: bold;
        }

        .mechanic-rating {
            color: #4CAF50;
        }

        .remove-btn {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .appointment {
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="content-wrapper">
        <br><br>
        <h2>Mechanic Information</h2>
        <?php
        $query = "SELECT MechanicID, Name AS MechanicName, Specialization, DailyCarCapacity, AverageRating FROM Mechanic";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $remaining_appointments = getRemainingAppointments($conn, $row['MechanicID'], $row['DailyCarCapacity']);
                echo "<div class='mechanic-box'>";
                echo "<div class='mechanic-info'>Mechanic ID: {$row['MechanicID']}</div>";
                echo "<div class='mechanic-info'>Name: {$row['MechanicName']}</div>";
                echo "<div class='mechanic-info'>Specialization: {$row['Specialization']}</div>";
                echo "<div class='mechanic-info'>Daily Car Capacity: {$row['DailyCarCapacity']}</div>";
                echo "<div class='mechanic-rating'>Average Rating: {$row['AverageRating']}</div>";
                echo "<div class='mechanic-info'>Remaining Daily Appointments: {$remaining_appointments}</div>";
                echo "<div class='appointments-container'>";
                echo "<h3>Appointments Today:</h3>";
                $appointments = getMechanicAppointments($conn, $row['MechanicID']);
                if (!empty($appointments)) {
                    foreach ($appointments as $appointment) {
                        echo "<div class='appointment'>";
                        echo "<div>Appointment ID: {$appointment['AppointmentID']}</div>";
                        // echo "<div>Client ID: {$appointment['ClientID']}</div>";
                        echo "<div>Appointment Time: {$appointment['AppointmentTime']}</div>";
                        // echo "<div>Appointment Type: {$appointment['AppointmentType']}</div>";
                        echo "<div>Appointment Status: {$appointment['AppointmentStatus']}</div>";
                        echo "<div>Service Requested: {$appointment['ServiceRequested']}</div>";
                        // echo "<div>Parts Needed: {$appointment['PartsNeeded']}</div>";
                        // echo "<div>Notes: {$appointment['Notes']}</div>";
                        // echo "<div>Car ID: {$appointment['CarID']}</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No appointments today</p>";
                }
                echo "</div>"; // close appointments-container
                echo "<form method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>";
                echo "<input type='hidden' name='mechanic_id' value='{$row['MechanicID']}'>";
                echo "<input class='remove-btn' type='submit' name='remove_mechanic' value='Remove'>";
                echo "</form>";
                echo "</div>"; // close mechanic-box
            }
        } else {
            echo "<p>No mechanics found</p>";
        }
        ?>
    </div>
 
</body>
</html>
