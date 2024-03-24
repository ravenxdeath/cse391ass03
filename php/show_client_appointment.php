<?php
ob_start();  

include 'db_connect.php';

session_start();

function getClientAppointments($conn, $client_id) {
    $today = date("Y-m-d");
    $query = "SELECT a.*, c.Name AS ClientName, c.Phone AS ClientPhone, c.Email AS ClientEmail
              FROM appointment a
              JOIN client c ON a.ClientID = c.ClientID
              WHERE a.ClientID = '$client_id' AND DATE(a.AppointmentDate) = '$today'";
    $result = mysqli_query($conn, $query);
    $appointments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }
    return $appointments;
}

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'client') {
    header("Location: login.php");
    exit();
}

$client_id = $_SESSION['user_id'];

ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Appointments</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .appointment-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
        }

        .appointment-info {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="content-wrapper">
        <br><br>
        <h2>Your Appointments Today</h2>
        <?php
            $appointments = getClientAppointments($conn, $client_id);
            if (!empty($appointments)) {
                foreach ($appointments as $appointment) {
                    echo "<div class='appointment-box'>";
                    echo "<div class='appointment-info'>Appointment ID: {$appointment['AppointmentID']}</div>";
                    echo "<div class='appointment-info'>Client Name: {$appointment['ClientName']}</div>";
                    echo "<div class='appointment-info'>Client Phone: {$appointment['ClientPhone']}</div>";
                    echo "<div class='appointment-info'>Client Email: {$appointment['ClientEmail']}</div>";
                    echo "<div class='appointment-info'>Mechanic ID: {$appointment['MechanicID']}</div>";
                    echo "<div class='appointment-info'>Appointment Time: {$appointment['AppointmentTime']}</div>";
                    echo "<div class='appointment-info'>Appointment Type: {$appointment['AppointmentType']}</div>";
                    echo "<div class='appointment-info'>Appointment Status: {$appointment['AppointmentStatus']}</div>";
                    echo "<div class='appointment-info'>Service Requested: {$appointment['ServiceRequested']}</div>";
                    echo "<div class='appointment-info'>Parts Needed: {$appointment['PartsNeeded']}</div>";
                    echo "<div class='appointment-info'>Notes: {$appointment['Notes']}</div>";
                    echo "<div class='appointment-info'>Car ID: {$appointment['CarID']}</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No appointments today</p>";
            }
        ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
