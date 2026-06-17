<!DOCTYPE html>
<?php
require_once '../DB_Connection.php';


$dbConnectionObj = new DB_Connection();
$sql = "
SELECT
s.*,
c.title AS category_name

FROM slides s

LEFT JOIN categories c
ON c.id = s.category_id

ORDER BY s.id DESC
";

$slides = $dbConnectionObj->querySQL($sql);

?>

<html>
<head>
    <title>Slides</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">
        <h2>Slides</h2>

        <a href="slide-form.php"
           class="btn btn-primary">
            Add Slide
        </a>
    </div>
<table class="table">

<thead>
<tr>
<th>Image</th>
<th>Category</th>
<th>Title</th>
<th>Actions</th>
</tr>
</thead>

<tbody>

<?php foreach($slides as $slide): ?>

<tr>

<td>
<img src="../uploads/<?= $slide['image']; ?>"
     width="80" alt="<?= $slide['title'] ?>" title="<?= $slide['title'] ?>">
</td>

<td><?= $slide['category_name']; ?></td>

<td><?= $slide['title']; ?></td>

<td>

<a href="slide-form.php?id=<?= $slide['id']; ?>"
   class="btn btn-warning btn-sm">
Edit
</a>

<a href="#" data-id="<?= $slide['id']; ?>"
   class="btn btn-danger btn-sm delete-slide">
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