
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="bitnami.css">
<body>
<?php
session_start();
include("header.php");
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success text-center'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}
?>

<style>
    h2{
        text-align: center;
    }

    .button-div{
      margin-left: 250px;
    }
    /* .form-box{
        width: 50%;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        margin-bottom: 50px;
        
    } */

    .form-box{
        width: 40%;
        margin: auto;
        margin-top: 40px;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 45px;
        background-color:#3fbbc0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
</style>





<h2 style = "color:black; padding-top:23px; text-decoration: underline; font-family: cursive;">SignUp Form</h2>
<div class="form-box">
<form action="register.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label" style="font-family: cursive; font-weight: bold; font-size: 20px">UserName</label>
        <input type="text" name="Username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label"style="font-family: cursive; font-weight: bold; font-size: 20px">Email</label>
        <input type="email" name="Email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label" style="font-family: cursive; font-weight: bold; font-size: 20px">Password</label>
        <input type="password" name="Password" class="form-control" required>
    </div>
    <!-- <div class="mb-3">
        <label for="confirm_password" class="form-label" style="font-family: cursive; font-weight: bold; font-size: 20px">Confirm Password</label>
        <input type="password" name="ConfirmPassword" class="form-control" required>
    </div> -->
    




    <div class="button-div">
 
    <br>
    <input type="submit" name="submit" style=" font-family: cursive; font-size: 20px;" value="SignUp" class="btn btn-success">
    </div>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>



</body>
</html>


 <?php
include("footer.php");
?>