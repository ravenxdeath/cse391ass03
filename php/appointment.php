<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Up an Appointment</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="content-wrapper fontb">
        <section class="signup-section">
            <br> <br>
            <h2>Set Up an Appointment with your Mechanic</h2>
            <form action="appointment_process.php" method="post" style="width: 300px; margin: 20px auto;">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="date" id="appointment_date" name="appointment_date" required>
                </div>
                <div class="form-group">
                    <label for="appointment_time">Appointment Time:</label>
                    <input type="time" id="appointment_time" name="appointment_time" required min="09:00" max="23:00">
                </div>
                <div class="form-group">
                    <label for="mechanic">Desired Mechanic:</label>
                    <select id="mechanic" name="mechanic" required>
                        <!-- Options for mechanics -->
                        <option value="heisenberg">heisenberg</option>
                        <option value="pinkman">pinkman</option>
                        <option value="gusfring">gusfring</option>
                        <option value="hector">hector</option>
                        <option value="lalo">lalo</option>
                        <option value="vuente">vuente</option>
                        <option value="tuco">tuco</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="service_requested">Request Service:</label>
                    <textarea id="service_requested" name="service_requested" rows="4" cols="50" spellcheck="false" style="width: 269px; height: 136px;"></textarea>
                </div>
                <button type="submit" class="login" style="width: 100%;">SUBMIT</button>
            </form>
            <p style="color: black;">If you are already registered, <a href="login.php">click here</a> to login.</p>
            <br> <br>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
