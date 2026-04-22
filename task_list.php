<?php
include 'mydb.php';
include 'navbar.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Task Manager</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.css">
</head>

<body>

    <div class="container mt-4">
        <form method="post" action="add_task.php">
            <label class="form-label">Add Task:</label>
            <input type="text" name="description" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-2" name="btn">Add Task</button>
        </form>

        <div class="card-body mt-4">
            <div id="toolbar">
                <button id="remove" class="btn btn-danger" disabled>
                    <i class="bi bi-trash"></i> Delete
                </button>
            </div>
    

            <table
                id="table"
                data-toggle="table"
                data-toolbar="#toolbar"
                data-search="true"
                data-pagination="true"
                class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field="id">ID</th>
                        <th data-field="uid">UID</th>
                        <th data-field="description">Description</th>
                        <th data-field="status">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $result = mysqli_query($conn, "SELECT * FROM tasks");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td></td>
                                <td>{$row['id']}</td>
                                <td>{$row['uid']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['status']}</td>
                                <td>

                               
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Required Scripts -->
    <script src="https://jsdelivr.net"></script>
    <script src="https://jsdelivr.net"></script>
    <script src="https://jsdelivr.net"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.js"></script>
    <script src="index.js"></script>


    <script src="index.js">
    </script>
</body>

</html>