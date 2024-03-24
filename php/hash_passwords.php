
<!-- this was a menual hash for resetting the database . will not add to the main website.  -->

<!-- <?php
 
include 'db_connect.php';

 
$sql = "SELECT ClientID, PasswordHash FROM Client WHERE PasswordHash IS NULL OR PasswordHash = ''";  

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
       
        $clientId = $row['ClientID'];
        $unhashedPassword = $row['PasswordHash'];
        $hashedPassword = password_hash($unhashedPassword, PASSWORD_DEFAULT);

        // Updating the row in the database with the hashed password
        $updateSql = "UPDATE Client SET PasswordHash = '$hashedPassword' WHERE ClientID = $clientId";
        $conn->query($updateSql);
    }
    echo "Passwords hashed successfully!";
} else {
    echo "No unhashed passwords found.";
}

 
$conn->close();
?> -->
