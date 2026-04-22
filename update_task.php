<?php
include 'mydb.php';


if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action === 'complete') {
        $sql = "UPDATE tasks SET status='complete' WHERE id=$id";
        mysqli_query($conn, $sql);
    } elseif ($action === 'pending') {
        $sql = "UPDATE tasks SET status='pending' WHERE id=$id";
        mysqli_query($conn, $sql);
    }
}



header('Location: index.php');
?>