<?php
include 'db_connect.php';


function isSlotAvailable($date, $time, $mechanic_id) {
    global $conn;
    
    $check_query = "SELECT * FROM appointment WHERE MechanicID = $mechanic_id AND AppointmentDate = '$date' AND AppointmentTime = '$time'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
    
        return false;
    } else {
    
        return true;
    }
}

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];

     $client_query = "SELECT ClientID FROM client WHERE Username = '$username'";
    $client_result = $conn->query($client_query);

    if ($client_result->num_rows > 0) {
        $row = $client_result->fetch_assoc();
        $client_id = $row['ClientID'];

        // Query to get CarID from car table using ClientID
        $car_query = "SELECT CarID FROM car WHERE ClientID = $client_id";
        $car_result = $conn->query($car_query);

        if ($car_result->num_rows > 0) {
            $row = $car_result->fetch_assoc();
            $car_id = $row['CarID'];

             $phone = $_POST['phone'];
            $appointment_date = $_POST['appointment_date'];
            $appointment_time = $_POST['appointment_time'];
            $mechanic_username = $_POST['mechanic']; // Assuming you have mechanic usernames in your HTML
            $service_requested = $_POST['service_requested'];

             $mechanic_query = "SELECT MechanicID FROM mechanic WHERE Username = '$mechanic_username'";
            $mechanic_result = $conn->query($mechanic_query);
 
            if ($mechanic_result->num_rows > 0) {
                $row = $mechanic_result->fetch_assoc();
                $mechanic_id = $row['MechanicID'];

                // Checking if the appointment slot is available
                if (isSlotAvailable($appointment_date, $appointment_time, $mechanic_id)) {
      
                    $insert_query = "INSERT INTO appointment (ClientID, MechanicID, AppointmentDate, AppointmentTime, ServiceRequested, CarID)
                                    VALUES ($client_id, $mechanic_id, '$appointment_date', '$appointment_time', '$service_requested', $car_id)";

                    if ($conn->query($insert_query) === TRUE) {
                        echo "Appointment created successfully";
                    } else {
                        echo "Error: " . $insert_query . "<br>" . $conn->error;
                    }
                } else {
                    echo "Sorry, the selected appointment slot is not available. Please choose another slot.";
                }
            } else {
                echo "Mechanic not found";
            }
        } else {
            echo "Car not found for this client";
        }
    } else {
        echo "Client not found";
    }

 
    $conn->close();
}
?>
