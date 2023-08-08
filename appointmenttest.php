<?php
    try {
        // Connect to the database
        include('database/connection.php');

        // Get the form data
        $date = $_POST['date'];
        $time = $_POST['time'];

        // Prepare a statement to check if there is already an appointment scheduled for the same date and time
        $stmt = $conn->prepare("SELECT * FROM slot WHERE date = :date AND time = :time");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // There is already an appointment scheduled for the same date and time
            echo "Sorry, that time and date is not available. Please choose another.";
        } else {
            // There is no existing appointment for the same date and time
            $stmt = $conn->prepare("INSERT INTO slot (date, time) VALUES (:date, :time)");
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);
            $stmt->execute();
            echo "Appointment scheduled successfully!";
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="submit.php">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>
    <br>
    <label for="time">Time:</label>
    <input type="time" id="time" name="time" required>
    <br>
    <input type="submit" value="Submit">
</form>
</body>
</html>