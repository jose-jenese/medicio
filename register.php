<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "medical_info");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Username'], $_POST['Email'], $_POST['Password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = password_hash(mysqli_real_escape_string($conn, $_POST['Password']), PASSWORD_DEFAULT);
  
    $check_sql = "SELECT * FROM medical WHERE Email='$email' OR Username='$username'";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = "Email or username already exists!";
        header("Location: signup.php");
        exit;
    } else {

        $insert_sql = "INSERT INTO medical (Username, Email, Password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $insert_sql)) {
            $_SESSION['message'] = "Signup successful. <a href='login.php'>Click here to login</a>";
            header("Location: signup.php");
            exit;
        } else {
            $_SESSION['message'] = "Error: " . mysqli_error($conn);
            header("Location: signup.php");
            exit;
        }
    }
}

mysqli_close($conn);
?>
