<?php

include 'db_connect.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $usertype = $_POST["usertype"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashing the password

    if ($usertype == "client") {
        // Insert into Client table
        $sql = "INSERT INTO Client (Name, Username, PasswordHash, Phone, Email) VALUES ('$name', '$username', '$hashedPassword', '$phone', '$email')";

    } elseif ($usertype == "mechanic") {
 
        $mechanicType = $_POST["mechanic_type"];
 
        if ($mechanicType == "senior") {
            $dailyCarCap = 12;
        } elseif ($mechanicType == "junior") {
            $dailyCarCap = 6;
        }
      
        $sql = "INSERT INTO Mechanic (Name, Username, PasswordHash, Phone, Specialization, DailyCarCapacity) VALUES ('$name', '$username', '$hashedPassword', '$phone', '$mechanicType', $dailyCarCap)";

    } elseif ($usertype == "admin") {
        
        $sql = "INSERT INTO Admin (Name, Username, PasswordHash, Phone, Email) VALUES ('$name', '$username', '$hashedPassword', '$phone', '$email')";
    }

 
    if (mysqli_query($conn, $sql)) {
        // echo "Registration successful!";
        header("Location: login.php");

        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 
    mysqli_close($conn);
}
?>
