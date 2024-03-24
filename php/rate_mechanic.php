<?php
ob_start();  

include 'db_connect.php';

// Start the session
session_start();

// Check if user is logged in and is a client
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'client') {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $mechanic_id = $_POST['mechanic_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $client_id = $_SESSION['user_id']; // Assuming the client ID is stored in the session

    // Insert rating into the database
    $insert_query = "INSERT INTO Rating (MechanicID, ClientID, Rating, Review, Date) VALUES ('$mechanic_id', '$client_id', '$rating', '$review', NOW())";
    $result = mysqli_query($conn, $insert_query);
    if ($result) {
        echo "Thank you for sumitting a rating!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
ob_end_flush();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Mechanic</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="content-wrapper">
        <h2>Rate Mechanic</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="mechanic_id">Select Mechanic:</label>
                <select name="mechanic_id" id="mechanic_id" required>
                    <?php
                    // Retrieve mechanics from the database
                    $mechanic_query = "SELECT * FROM Mechanic";
                    $mechanic_result = mysqli_query($conn, $mechanic_query);
                    while ($row = mysqli_fetch_assoc($mechanic_result)) {
                        echo "<option value='" . $row['MechanicID'] . "'>" . $row['Name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="rating">Rating (Out of 5):</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
            </div>
            <div class="form-group">
                <label for="review">Review:</label>
                <textarea id="review" name="review" rows="4" required></textarea>
            </div>
            <button type="submit">Submit Rating</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
