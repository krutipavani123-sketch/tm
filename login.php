<?php
include 'mydb.php';
session_start();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $_SESSION['uid'] = $row['uid'];

        header("Location: home.php");
        exit();

    } else {
        echo "Invalid User";
    }
}
?>

<form method="post">
 <div class="container-fluid">
            <label>Email</label> <br>
            <input type="text" name="email" required><br>

            <label>Password</label><br>
            <input type="password" name="password" required><br>

    <button name="login">Login</button>
</form>