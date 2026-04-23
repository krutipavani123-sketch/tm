<?php

include 'mydb.php';
include 'navbar.php';


session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Table -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <!-- Add Task -->
        <form method="post" action="add_task.php">
            <label>Add Task:</label>
            <input type="text" name="description" class="form-control" required>
            <button class="btn btn-primary mt-2" name="btn">Add Task</button>
        </form>

        <!-- Counts -->
        <div class="mt-3">
            <strong id="totalTasks"></strong> |
            <strong id="pendingTasks"></strong> |
            <strong id="completeTasks"></strong>
        </div>

        <!-- Table -->
        <table
            id="table"
            class="table table-bordered mt-3"
            data-height="460"
            data-pagination="true">
            <thead>
                <tr>
                    <th data-field="id" data-sortable="true">ID</th>
                    <th data-field="uid" data-sortable="true">UID</th>
                    <th data-field="description" data-sortable="true">Description</th>
                    <th data-field="status" data-sortable="true">Status</th>
                    <th data-field="action">Action</th>
                </tr>
            </thead>
        </table>

    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.js"></script>


    <script src="home.js"></script>

</body>

</html>