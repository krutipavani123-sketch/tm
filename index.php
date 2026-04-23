<?php
include 'mydb.php';

if (isset($_POST['register'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(email, password) VALUES('$email','$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registered Successfully";
    } else {
        echo "Error";
    }
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <div class="container-fluid">
            <label>Email</label> <br>
            <input type="text" name="email" required><br>

            <label>Password</label><br>
            <input type="password" name="password" required><br>

            <button type="submit" name="register">Register</button>
        </div>
    </form>

</body>

</html>