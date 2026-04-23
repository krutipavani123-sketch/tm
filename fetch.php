<?php
include 'mydb.php';


$limit  = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;


$search = $_GET['search'] ?? '';


$allowed_columns = ['id', 'uid', 'description', 'status'];

$sort  = $_GET['sort'] ?? 'id';
$order = $_GET['order'] ?? 'asc';

if (!in_array($sort, $allowed_columns)) {
    $sort = 'id';
}

$order = strtolower($order) === 'desc' ? 'desc' : 'asc';

// Search condition
$where = "";
if (!empty($search)) {
    $where = "WHERE description LIKE '%$search%' OR status LIKE '%$search%'";
}


$totalResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM tasks $where");
$total = mysqli_fetch_assoc($totalResult)['total'];

$statusResult = mysqli_query($conn, "
    SELECT 
        SUM(status='pending') as pending,
        SUM(status='complete') as complete
    FROM tasks
");
$statusData = mysqli_fetch_assoc($statusResult);

// Sorting fix
if ($sort == 'description') {
    $orderBy = "LOWER(description)";
} elseif ($sort == 'status') {
    $orderBy = "LOWER(status)";
} else {
    $orderBy = $sort;
}

// Data
$sql = "SELECT id, uid, description, status 
        FROM tasks 
        $where 
        ORDER BY $orderBy $order 
        LIMIT $offset, $limit";

$result = mysqli_query($conn, $sql);

$rows = [];

while ($row = mysqli_fetch_assoc($result)) {

    $row['action'] = "
    <button class='btn btn-success btn-sm complete' data-id='{$row['id']}' data-status='{$row['status']}'>✔</button>
    <button class='btn btn-warning btn-sm pending' data-id='{$row['id']}' data-status='{$row['status']}'>✖</button>
    <button class='btn btn-danger btn-sm delete' data-id='{$row['id']}'>🗑</button>
    ";

    $rows[] = $row;
}

// JSON
echo json_encode([
    "total" => $total,
    "rows" => $rows,
    "counts" => $statusData
]);
