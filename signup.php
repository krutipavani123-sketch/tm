<?php
include 'mydb.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="signup.php">
        <div class="container-fluid">
            <label>Email</label> <br>
            <input type="text" name="email" required><br>

            <label>Password</label><br>
            <input type="password" name="password" required><br>

            <button type="submit" name="btn">Login</button>
        </div>
    </form>
<?php
if (isset($_POST['btn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(email,password)VALUES('$email','$password')";
    mysqli_query($conn, $sql);
}

header("Location:index.php");
?>

</body>

</html>