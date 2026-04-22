
<?php
include 'mydb.php';
session_start();



if (isset($_POST['btn']) && isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $task = $_POST['description'];

    $sql = "INSERT INTO tasks(uid,description)VALUES('$uid','$task')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: index.php");
    exit();
}

?>