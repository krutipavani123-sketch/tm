<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
    "Connected";
} else {
    mysqli_connect_error();
}

$user = "CREATE TABLE IF NOT EXISTS `users` (
    `uid` INT(11) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`uid`)
)";


$task = "CREATE TABLE IF NOT EXISTS `tasks` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,   
    `uid` INT(11) NOT NULL, 
    `description` TEXT NOT NULL,
    `status` VARCHAR(20) NOT NULL DEFAULT 'pending',
    `Action` VARCHAR(20) NOT NULL DEFAULT 'pending',    
    PRIMARY KEY (`id`),
    FOREIGN KEY (`uid`) REFERENCES users(`uid`) ON DELETE CASCADE
)";

if (mysqli_query($conn, $user) && mysqli_query($conn, $task)) {
    "Table created successfully";
} else {
    "Error creating table: " . mysqli_error($conn);
}