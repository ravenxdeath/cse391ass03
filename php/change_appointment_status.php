<?php
include 'db_connect.php';

// Startingsd the session
session_start();

// Checking if user is logged in and is a mechanic
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'mechanic') {
    
    header("Location: login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $appointment_id = $_POST['appointment_id'];
    $new_status = $_POST['new_status'];

    // Update appointment status in the database
    $update_query = "UPDATE Appointment SET AppointmentStatus = '$new_status' WHERE AppointmentID = '$appointment_id'";
    $result = mysqli_query($conn, $update_query);
    if ($result) {
        echo "Appointment status updated successfully!";
    } else {
        echo "Error updating appointment status: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Appointment Status</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="content-wrapper">
        <h2>Change Appointment Status</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="appointment_id">Appointment ID:</label>
                <input type="text" id="appointment_id" name="appointment_id" required>
            </div>
            <div class="form-group">
                <label for="new_status">New Status:</label>
                <select name="new_status" id="new_status" required>
                    <option value="Scheduled">Scheduled</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <button type="submit">Update Status</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
