<?php
session_start();

include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['Username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $datetime = new DateTime($_POST['date']);
    $date = date("Y-m-d H:i:s", strtotime($_POST['date']));
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];
    $message = $_POST['message'];

    $statement = $conn->prepare("INSERT INTO appointments (username, name, email, phone, date, department, doctor, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $statement->bind_param("ssssssss", $username, $name, $email, $phone, $date, $department, $doctor, $message);

    $statement->execute();

    $statement->close();
    $conn->close();
}


header("Location: ../appointment.php?success=1");
exit();
?>