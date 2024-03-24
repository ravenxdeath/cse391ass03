<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Information</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="content-wrapper fontb">
        <section class="login-section">
            <br> <br>
            <h2>Enter Car Information</h2>
            <form action="car_process.php" method="post" style="width: 300px; margin: 20px auto;">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="car_color">Car Color:</label>
                    <input type="text" id="car_color" name="car_color" required>
                </div>
                <div class="form-group">
                    <label for="car_license">Car License Number:</label>
                    <input type="text" id="car_license" name="car_license" required>
                </div>
                <div class="form-group">
                    <label for="car_engine">Car Engine Number:</label>
                    <input type="text" id="car_engine" name="car_engine" required>
                </div>
                <button type="submit" class="login" style="width: 100%;">SUBMIT</button>
            </form>
            <br> <br>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
