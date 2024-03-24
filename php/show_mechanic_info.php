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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic Information</title>
    <link rel="stylesheet" href="../css/style.css">
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
            background-color: #BED1CF;
            opacity: 0.7;
        }

        .transparent-table tbody tr:nth-child(even) {
            background-color: #FEECE2;
            opacity: 0.82;
        }

        .transparent-table tbody tr:nth-child(odd) {
            background-color: #FFE4C9;
            opacity: 0.81;
        }

        .subs[type="submit"] {
            width: 10%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .subs[type="submit"]:hover {
            background-color: #555;
        }

        #mechanic_id,
        #daily_car_capacity,
        #mechanic_name,
        #specialization {
            padding: 8px 20px;
            margin: 7px 3px;
            border: 2px solid whitesmoke;
            border-radius: 8px;
            font-size: 16px;
            color: darkblue;
            background: white;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="content-wrapper">
        <br><br>
        <h2>Update Daily Car Capacity</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="mechanic_id">Mechanic ID:</label>
            <input type="text" name="mechanic_id" id="mechanic_id">
            <label for="daily_car_capacity">New Daily Car Capacity:</label>
            <input type="text" name="daily_car_capacity" id="daily_car_capacity"><br><br>
            <input class="subs" type="submit" name="update_capacity" value="Update Capacity">
        </form>
        <br>
        <h2>Add New Mechanic</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="mechanic_name">Mechanic Name:</label>
            <input type="text" name="mechanic_name" id="mechanic_name">
            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization" id="specialization">
            <label for="daily_car_capacity">Daily Car Capacity:</label>
            <input type="text" name="daily_car_capacity" id="daily_car_capacity"><br><br>
            <input class="subs" type="submit" name="add_mechanic" value="Add Mechanic">
        </form>
        <br>
        <table class="transparent-table">
            <thead>
                <tr>
                    <th>MechanicID</th>
                    <th>Mechanic Name</th>
                    <th>Specialization</th>
                    <th>Daily Car Capacity</th>
                    <th>Average Rating</th>
                    <th>REMOVE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connect.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_capacity'])) {
                    $mechanic_id = $_POST['mechanic_id'];
                    $daily_car_capacity = $_POST['daily_car_capacity'];

                    $update_query = "UPDATE Mechanic SET DailyCarCapacity = '$daily_car_capacity' WHERE MechanicID = '$mechanic_id'";
                    $update_result = mysqli_query($conn, $update_query);
                    if (!$update_result) {
                        echo "Error updating daily car capacity: " . mysqli_error($conn);
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_mechanic'])) {
                    $mechanic_name = $_POST['mechanic_name'];
                    $specialization = $_POST['specialization'];
                    $daily_car_capacity = $_POST['daily_car_capacity'];

                    $insert_query = "INSERT INTO Mechanic (Name, Specialization, DailyCarCapacity) VALUES ('$mechanic_name', '$specialization', '$daily_car_capacity')";
                    $insert_result = mysqli_query($conn, $insert_query);
                    if (!$insert_result) {
                        echo "Error adding new mechanic: " . mysqli_error($conn);
                    }
                }

                $query = "SELECT MechanicID, Name AS MechanicName, Specialization, DailyCarCapacity, AverageRating FROM Mechanic";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['MechanicID']}</td>";
                        echo "<td>{$row['MechanicName']}</td>";
                        echo "<td>{$row['Specialization']}</td>";
                        echo "<td>{$row['DailyCarCapacity']}</td>";
                        echo "<td>{$row['AverageRating']}</td>";
                        echo "<td>
                                <form method='post' action='".htmlspecialchars($_SERVER["PHP_SELF"])."'>
                                    <input type='hidden' name='mechanic_id' value='{$row['MechanicID']}'>
                                    <input class='subs' type='submit' name='remove_mechanic' value='x'>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No mechanics found</td></tr>";
                }
                ?>
            </tbody>
        </table><br><br>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
