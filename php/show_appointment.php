<?php
// include 'header.php';
include 'db_connect.php';  
// include 'client_sidebar.php';  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>3
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
    </style>
</head>

<body>
    <div class="content-wrapper">
        <table class="transparent-table">
            <thead>
                <tr>
                    <th>AppointmentID</th>
                    <th>ClientID</th>
                    <th>MechanicID</th>
                    <th>AdminID</th>
                    <th>AppointmentDate</th>
                    <th>AppointmentTime</th>
                    <th>AppointmentType</th>
                    <th>AppointmentStatus</th>
                    <th>ServiceRequested</th>
                    <th>PartsNeeded</th>
                    <th>Notes</th>
                    <th>CarID</th>
                </tr>
            </thead>
            <tbody>
                <?php
             
                if ($conn) {
                 
                    $query = "SELECT * FROM Appointment";
                    $result = mysqli_query($conn, $query);

 
                    if ($result) {
                      
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['AppointmentID']}</td>";
                                echo "<td>{$row['ClientID']}</td>";
                                echo "<td>{$row['MechanicID']}</td>";
                                echo "<td>{$row['AdminID']}</td>";
                                echo "<td>{$row['AppointmentDate']}</td>";
                                echo "<td>{$row['AppointmentTime']}</td>";
                                echo "<td>{$row['AppointmentType']}</td>";
                                echo "<td>{$row['AppointmentStatus']}</td>";
                                echo "<td>{$row['ServiceRequested']}</td>";
                                echo "<td>{$row['PartsNeeded']}</td>";
                                echo "<td>{$row['Notes']}</td>";
                                echo "<td>{$row['CarID']}</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No appointments found</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>Error executing query: " . mysqli_error($conn) . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>Database connection failed</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
