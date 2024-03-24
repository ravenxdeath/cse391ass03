<link rel="stylesheet" href="../css/style.css">

<?php
include 'header.php';
include 'db_connect.php';  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <script src="../js/script.js"></script>

    <main class="content-wrapper fontb">
        <section class="signup-section" style="z-index: 100;">
            <br> <br>
            <h2>Sign Up</h2>
            <form action="signup_process.php" method="post" style="width: 300px; margin: 20px auto;">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="uname" name="name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>


                <div class="form-group">
                    <label for="usertype">User Type:</label>
                    <select id="usertype" name="usertype" required onchange="showMechanicType()">
                        <option value="client">Client</option>
                        <option value="mechanic">Mechanic</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group" id="mechanicType" style="display:none;">
                    <label for="mechanic_type">Mechanic Type:</label>
                    <select id="mechanic_type" name="mechanic_type">
                        <option value="junior">Junior Mechanic</option>
                        <option value="senior">Senior Mechanic</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="re_password">Re-enter Password:</label>
                    <input type="password" id="re_password" name="re_password" required>
                </div>
                <button type="submit" class="login" style="width: 100%;">Sign Up</button>
            </form>
            <p style="color: black;">If you are already registered, <a href="login.php">click here</a> to login.</p>
            <br> <br>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
