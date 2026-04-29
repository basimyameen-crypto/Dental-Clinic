<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Appointment</title>
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
<h2>Book Appointment</h2>

<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="text" name="phone" placeholder="Phone" required>
<input type="date" name="date" required>
<input type="time" name="time" required>
<button type="submit" name="book">Book Appointment</button>
</form>

<?php
if(isset($_POST['book'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Insert patient
    $conn->query("INSERT INTO patients (name,email,phone)
                  VALUES ('$name','$email','$phone')");

    $patient_id = $conn->insert_id;

    // Insert appointment
    $conn->query("INSERT INTO appointments (patient_id,date,time)
                  VALUES ('$patient_id','$date','$time')");

    echo "<p>✅ Appointment booked successfully!</p>";
}
?>

</div>
</body>
</html>