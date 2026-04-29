<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Staff Reports</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
<a href="index.php">Home</a>
<a href="appointment.php">Book Appointment</a>
<a href="contact.php">Contact</a>
<a href="about.php">About Us</a>
<a href="staff.php">Staff</a>
</nav>

<div class="container">

<h1> Staff Reports</h1>


<h2>List of Patients</h2>

<?php
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: ".$row['patient_id']." | Name: ".$row['name']." | Email: ".$row['email']."<br>";
    }
} else {
    echo "No patients found.";
}
?>

<hr>

<h2>📅 Future Appointments</h2>

<?php
$sql = "SELECT * FROM appointments WHERE date >= CURDATE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Patient ID: ".$row['patient_id']." | Date: ".$row['date']." | Time: ".$row['time']."<br>";
    }
} else {
    echo "No future appointments.";
}
?>

<hr>


<h2>Past Appointments</h2>

<?php
$sql = "SELECT * FROM appointments WHERE date < CURDATE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Patient ID: ".$row['patient_id']." | Date: ".$row['date']." | Time: ".$row['time']."<br>";
    }
} else {
    echo "No past appointments.";
}
?>

</div>
</body>
</html>