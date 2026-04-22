<?php

include 'mydb.php';

$taskid = $_GET['id'];
$sql = "DELETE FROM tasks WHERE id=$taskid";
mysqli_query($conn, $sql);

header("Location: index.php");
