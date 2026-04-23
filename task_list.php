<?php
include 'mydb.php';
include 'navbar.php';

// Pagination
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Search
$search = isset($_GET['search']) ? $_GET['search'] : '';

$where = "";
if ($search != '') {
    $where = "WHERE description LIKE '%$search%' OR status LIKE '%$search%'";
}

// Total rows with search
$total_result = mysqli_query($conn, "SELECT COUNT(*) as total FROM tasks $where");
$total_row = mysqli_fetch_assoc($total_result);
$total = $total_row['total'];

$total_pages = ceil($total / $limit);

// Fetch data
$sql = "SELECT * FROM tasks $where LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <h2>Task List</h2>

    <!-- 🔍 SEARCH BOX -->
    <form method="GET" class="mb-3">
        <input 
            type="text" 
            name="search" 
            class="form-control" 
            placeholder="Search task..."
            value="<?= $search ?>"
        >
    </form>

    <!-- TABLE -->
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['status'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <!-- 🔢 PAGINATION -->
    <nav>
        <ul class="pagination">

            <!-- Previous -->
            <?php if ($page > 1) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page-1 ?>&search=<?= $search ?>">Previous</a>
                </li>
            <?php } ?>

            <!-- Page Numbers -->
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>&search=<?= $search ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php } ?>

            <!-- Next -->
            <?php if ($page < $total_pages) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page+1 ?>&search=<?= $search ?>">Next</a>
                </li>
            <?php } ?>

        </ul>
    </nav>

</div>

</body>
</html>