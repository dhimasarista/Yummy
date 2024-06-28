<?php
include "config/koneksi.php";

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];
    $message = $_POST['message'];

    $sql = "INSERT INTO booking_table (name, email, phone, date, time, people, message) VALUES ('$name', '$email', '$phone', '$date', '$time', '$people', '$message')";

    if ($mysqli->query($sql) === TRUE) {
        $feedback = "Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!";
    } else {
        $feedback = "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

$mysqli->close();

// Redirect back to the form with feedback
header("Location: index.php?feedback=" . urlencode($feedback));
exit();
