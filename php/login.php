<?php
ob_start(); // output buffering
include 'header.php';
include 'db_connect.php';  

session_start(); // session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameOrEmail = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Checking if the user is a client
    $client_sql = "SELECT * FROM client WHERE Username = '$usernameOrEmail' OR Email = '$usernameOrEmail'";
    $client_result = $conn->query($client_sql);

    if ($client_result->num_rows == 1) {
        // User found in the client table
        $row = $client_result->fetch_assoc();
        $storedPassword = $row['PasswordHash'];  

        if (password_verify($password, $storedPassword)) {
            // Start session for client
            $_SESSION['user_type'] = 'client';
            $_SESSION['user_id'] = $row['ClientID'];
            $_SESSION['username'] = $row['Username'];
            header("Location: client_dash.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        // Checking if the user is a mechanic
        $mechanic_sql = "SELECT * FROM mechanic WHERE Username = '$usernameOrEmail'";
        $mechanic_result = $conn->query($mechanic_sql);

        if ($mechanic_result->num_rows == 1) {
            // User found in the mechanic table
            $row = $mechanic_result->fetch_assoc();
            $storedPassword = $row['PasswordHash'];

            if (password_verify($password, $storedPassword)) {
                // Start session for mechanic
                $_SESSION['user_type'] = 'mechanic';
                $_SESSION['user_id'] = $row['MechanicID'];
                $_SESSION['username'] = $row['Username'];
                header("Location: mechanic_dash.php");
                exit();
            } else {
                echo "Invalid password";
            }
        } else {
            // Checking if the user is an admin
            $admin_sql = "SELECT * FROM admin WHERE Username = '$usernameOrEmail'";
            $admin_result = $conn->query($admin_sql);

            if ($admin_result->num_rows == 1) {
                // User found in the admin table
                $row = $admin_result->fetch_assoc();
                $storedPassword = $row['PasswordHash'];

                if (password_verify($password, $storedPassword)) {
                    // Start session for admin
                    $_SESSION['user_type'] = 'admin';
                    $_SESSION['user_id'] = $row['AdminID'];
                    $_SESSION['username'] = $row['Username'];
                    header("Location: admin_dash.php");
                    exit();
                } else {
                    echo "Invalid password";
                }
            } else {
                echo "User not found";
            }
        }
    }
}
?>

<main class="content-wrapper fontb">
    <section class="login-section">
        <h2>Login</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="username_or_email">Email/Username:</label>
                <input type="text" id="username_or_email" name="username_or_email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login">Login</button>
        </form>
        <p style="color: black;">If you are not registered, <a href="signup.php">click here</a> to sign up.</p>
    </section>
</main>

<?php 
ob_end_flush(); 
include 'footer.php'; 
?>
