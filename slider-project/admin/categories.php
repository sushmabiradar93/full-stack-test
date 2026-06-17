<!DOCTYPE html>
<?php

require_once '../DB_Connection.php';


$dbConnectionObj = new DB_Connection();

$categories = $dbConnectionObj->getAll('categories');
?>


<html>
<head>
    <title>Categories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">
        <h2>Categories</h2>

        <a href="category-form.php"
           class="btn btn-primary">
            Add Category
        </a>
    </div>

    <table class="table table-bordered">

        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th width="200">Actions</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach($categories as $category): ?>

            <tr>

                <td><?= $category['id']; ?></td>
                <td>
                <img src="../uploads/<?= $category['image']; ?>"
                     width="80" alt="<?= $category['title'] ?>" title="<?= $category['title'] ?>">
                </td>
                <td><?= htmlspecialchars($category['title']); ?></td>

                <td>

                    <a href="category-form.php?id=<?= $category['id']; ?>"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="#" data-id="<?= $category['id']; ?>"
                       class="btn btn-danger btn-sm category-delete">
                        Delete
                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="asset/js/admin-slider.js"></script>
</body>
</html>