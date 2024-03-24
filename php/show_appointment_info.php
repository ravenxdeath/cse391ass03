<link rel="stylesheet" href="../css/style.css">

<?php
include 'db_connect.php';  
include 'header.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_appointment'])) {
    // Retrieve the appointment ID and the new appointment date, time, and status from the form
    $appointment_id = $_POST['appointment_id'];
    $new_appointment_date = $_POST['new_appointment_date'];
    $new_appointment_time = $_POST['new_appointment_time'];
    $new_appointment_status = $_POST['new_appointment_status'];
    
    // Update the appointment date, time, and status in the database
    $update_query = "UPDATE Appointment 
                     SET AppointmentDate = '$new_appointment_date',
                         AppointmentTime = '$new_appointment_time',
                         AppointmentStatus = '$new_appointment_status'
                     WHERE AppointmentID = '$appointment_id'";
    $update_result = mysqli_query($conn, $update_query);
    
    // Check if the update was successful
    if ($update_result) {
        echo "<script>alert('Appointment details updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating appointment details: " . mysqli_error($conn) . "');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Appointments</title>
    <style>
        .transparent-table {
            border-collapse: collapse;
            width: 100%;
        }

        .transparent-table th,
        .transparent-table td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .transparent-table th {
            background-color: #f2f2f2;
        }

        /* Style for input fields */
        .date-input {
            width: 120px;
        }

        .time-input {
            width: 100px;
        }

        .status-select {
            width: 120px;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <table class="transparent-table">
            <thead>
                <tr>
                    <th>AppointmentID</th>
                    <th>Client Name</th>
                    <th>Client Phone</th>
                    <th>Car Registration Number</th>
                    <th>Appointment Date (Update)</th>
                    <th>Appointment Time (Update)</th>
                    <th>Appointment Status (Update)</th>
                    <th>Mechanic Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if connection is established
                if ($conn) {
                    // Query database
                    $query = "SELECT 
                                Appointment.AppointmentID, 
                                Client.Name AS ClientName, 
                                Client.Phone AS ClientPhone, 
                                Car.CarLicenseNumber AS CarLicenseNumber, 
                                Appointment.AppointmentDate, 
                                Appointment.AppointmentTime, 
                                Appointment.AppointmentStatus, 
                                Mechanic.Name AS MechanicName 
                                FROM Appointment 
                                INNER JOIN Client ON Appointment.ClientID = Client.ClientID 
                                INNER JOIN Car ON Appointment.CarID = Car.CarID 
                                INNER JOIN Mechanic ON Appointment.MechanicID = Mechanic.MechanicID";
                    $result = mysqli_query($conn, $query);

                    // Check if query was successful
                    if ($result) {
                        // Fetch data and display in table
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['AppointmentID']}</td>";
                                echo "<td>{$row['ClientName']}</td>";
                                echo "<td>{$row['ClientPhone']}</td>";
                                echo "<td>{$row['CarLicenseNumber']}</td>";
                                // Display input fields for appointment date, time, and status
                                echo "<td>
                                    <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                                        <input type='hidden' name='appointment_id' value='{$row['AppointmentID']}'>
                                        <input type='date' class='date-input' name='new_appointment_date' value='{$row['AppointmentDate']}'>
                                    </td>";
                                echo "<td>
                                        <input type='time' class='time-input' name='new_appointment_time' value='{$row['AppointmentTime']}'>
                                    </td>";
                                echo "<td>
                                        <select class='status-select' name='new_appointment_status'>
                                            <option value='Scheduled' ".($row['AppointmentStatus'] == 'Scheduled' ? 'selected' : '').">Scheduled</option>
                                            <option value='Rescheduled' ".($row['AppointmentStatus'] == 'Rescheduled' ? 'selected' : '').">Rescheduled</option>
                                            <option value='Cancelled' ".($row['AppointmentStatus'] == 'Cancelled' ? 'selected' : '').">Cancelled</option>
                                            <option value='Completed' ".($row['AppointmentStatus'] == 'Completed' ? 'selected' : '').">Completed</option>
                                        </select>
                                        <input type='submit' name='update_appointment' value='Update'>
                                    </form>
                                    </td>";
                                echo "<td>{$row['MechanicName']}</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No appointments found</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Error executing query: " . mysqli_error($conn) . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Database connection failed</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
