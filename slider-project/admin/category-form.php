<!DOCTYPE html>
<?php
require_once '../DB_Connection.php';


$dbConnectionObj = new DB_Connection();

$id = $_GET['id'] ?? 0;



if($id){
    $category = $dbConnectionObj->getById('categories',$id);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $image = '';

    if(!empty($_FILES['image']['name'])){

        $image = time() . '_' .
                 $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            '../uploads/' . $image
        );
    }


    $data = [
        'title' => trim($_POST['title']),
        'image' => $image
    ];

    if(!empty($_POST['id'])){

        $dbConnectionObj->update(
            'categories',
            $data,
            $_POST['id']
        );

    }else{

        $dbConnectionObj->insert(
            'categories',
            $data
        );
    }

    header('Location: categories.php');
    exit;
}
?>


<html>
<head>

<title>
<?= $id ? 'Edit' : 'Add'; ?> Category
</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container py-5">

<form method="post" enctype="multipart/form-data">

    <input type="hidden"
           name="id"
           value="<?= $id; ?>">

    <div class="card">

        <div class="card-header">
            Category Form
        </div>

        <div class="card-body">

            <div class="mb-3">

                <label class="form-label">
                    Category Title
                </label>

                <input type="text"
                       name="title"
                       required
                       class="form-control"
                       value="<?php if(isset($category['title'])) { echo htmlspecialchars($category['title']); } ?>">

            </div>

            <div class="mb-3">

            <label>Image</label>

            <input type="file"
                   name="image"
                   class="form-control">
                   <?php if(isset($category['image'])) { echo htmlspecialchars($category['image']); } ?>

            </div>


        </div>

        <div class="card-footer">

            <button class="btn btn-success">
                Save Category
            </button>

            <a href="categories.php"
               class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>

</form>

</div>

</body>
</html>