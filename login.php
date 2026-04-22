<?php
include 'mydb.php';
session_start();


    $sql="SELECT * FROM users WHERE uid='$uid'";
    $data=mysqli_query($conn,$sql);

    $_SESSION['uid']='$uid';


?>