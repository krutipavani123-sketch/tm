

<?php
include 'mydb.php';
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['btn'])) {

    $uid = $_SESSION['uid'];
    $task = $_POST['description'];

    $sql = "INSERT INTO tasks(uid, description) VALUES('$uid','$task')";

    if (mysqli_query($conn, $sql)) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>