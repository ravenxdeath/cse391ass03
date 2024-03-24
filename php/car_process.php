<?php
// Include the database connection file
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $car_color = $_POST['car_color'];
    $car_license = $_POST['car_license'];
    $car_engine = $_POST['car_engine'];

    // Query to get ClientID from client table using username
    $client_query = "SELECT ClientID FROM client WHERE Username = '$username'";
    $client_result = $conn->query($client_query);
    if ($client_result->num_rows > 0) {
        $row = $client_result->fetch_assoc();
        $client_id = $row['ClientID'];

        // Insert car data into the car table
        $insert_query = "INSERT INTO car (ClientID, CarColor, CarLicenseNumber, CarEngineNumber)
                        VALUES ($client_id, '$car_color', '$car_license', '$car_engine')";

        if ($conn->query($insert_query) === TRUE) {
            echo "Car information added successfully";
            header("Location: appointment.php");
            exit();
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    } else {
        echo "Client not found";
    }

    // Close the database connection
    $conn->close();
}
?>
