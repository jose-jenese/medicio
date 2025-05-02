<?php
session_start();

if (isset($_SESSION['Username'])) {
    header("Location: home.php");
    exit();
}
$conn = mysqli_connect("localhost", "root", "", "medical_info");

$error = '';


if (isset($_POST['submit'])) {
    $username = $_POST['Username'];
    // $email = $_POST['Email'];
    $pwd = $_POST['Password'];

    
    $sql = "SELECT * FROM medical WHERE Username = '$username'";
    $query = mysqli_query($conn, $sql);

    
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        
        if (password_verify($pwd, $row['Password'])) {
            $_SESSION['Username'] = $row['Username'];
            header("Location: home_a.php");
            exit;
        } else { 
            $error = "Invalid password!";
        }
    } else {
        $error = "Invalid username or email!";
    }
}
?>

<?php
  include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

<style>
    h2{
        text-align: center;
    }

    .button-div{
      margin-left: 250px;
    }
    .form-box{
        width: 40%;
        margin: auto;
        margin-top: 50px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color:#3fbbc0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
</style>




<div class="form-box">
    <h2>Login</h2>

    
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3" style="font-weight: bold; font-size: 20px;">
            Username: <input type="text" name="Username" required style="border-radius: 5px; margin-left: 20px;">
        </div>
        <!-- <div class="mb-3" style="font-weight: bold; font-size: 20px;">
            Email: <input type="Email" name="Email" required style="margin-left: 60px; border-radius: 5px;">
        </div> -->
        <div class="mb-3" style="font-weight: bold; font-size: 20px;">
            Password: <input autocomplete = "on" type="Password" name="Password" required style="margin-left: 25px; border-radius: 5px;">
        </div>
        <input type="submit" name="submit" style="margin-left: 120px; font-weight: bold; font-size: 20px; border-radius: 5px; background-color:rgb(122, 86, 146); color: white;" value="Login Here">
    </form>
</div>

<?php include("footer.php"); ?>



    
</body>
</html>
