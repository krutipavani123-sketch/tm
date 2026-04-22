<?php
include 'mydb.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Task Manager</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="task_list.php">Tasks</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>


    <div class="container">

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Status</th>
        </tr>

        <?php
        $sql = "SELECT * FROM tasks";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['status']}</td>
                    
                  </tr>";
        }

        ?>

    </table>

    </div>
</body>

</html>