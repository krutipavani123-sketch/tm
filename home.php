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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Table CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.css" rel="stylesheet">

    <style>
        /* ડબલ હેડર દૂર કરવા અને વધારાની જગ્યા ઘટાડવા માટે આ CSS */
        .fixed-table-header {
            display: none !important;
        }

        .fixed-table-container {
            padding-bottom: 0px !important;
            border: 1px solid #dee2e6 !important;
        }

        .fixed-table-pagination {
            margin-top: 10px !important;
        }

        .table-sm td,
        .table-sm th {
            padding: 5px !important;
        }
    </style>
</head>

<body>

    <div class="container mt-4">

        <!-- Add Task Form -->
        <form method="post" action="add_task.php">
            <label class="form-label fw-bold">Add New Task:</label>
            <div class="input-group">
                <input type="text" name="description" class="form-control" placeholder="Enter task..." required>
                <button class="btn btn-primary" name="btn">Add Task</button>
            </div>
        </form>

        <!-- Counts Status -->
        <div class="alert alert-info mt-3">
            <span id="totalTasks">Total: 0</span> |
            <span id="pendingTasks" class="text-danger">Pending: 0</span> |
            <span id="completeTasks" class="text-success">Complete: 0</span>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-sm mt-2">
                <thead class="table-light">
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

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.2/dist/bootstrap-table.min.js"></script>

    <!-- Your JS File -->
    <script src="home.js"></script>

</body>

</html>