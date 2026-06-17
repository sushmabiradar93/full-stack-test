<!DOCTYPE html>

<html>
<head>

<title>
<?php $id ? 'Edit' : 'Add'; ?> Slide
</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php
require_once '../DB_Connection.php';



$dbConnectionObj = new DB_Connection();


$id = $_GET['id'] ?? 0;

$category = [
    'title' => ''
];

if($id){
    $slide = $dbConnectionObj->getById('slides',$id);
}

$categories = $dbConnectionObj->getAll('categories');

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

        'category_id' => $_POST['category_id'],
        'title' => $_POST['title'],
        'tag' => $_POST['tag'],
        'link' => $_POST['link'],
        'image' => $image

    ];

    if(!empty($_POST['id'])){

        if(empty($image)){
            unset($data['image']);
        }

        $dbConnectionObj->update(
            'slides',
            $data,
            $_POST['id']
        );

    }else{

        $dbConnectionObj->insert(
            'slides',
            $data
        );
    }

    header('Location: slides.php');
}

?>
<div class="container py-5">

<form method="post"
      enctype="multipart/form-data">

<div class="mb-3">

<label>Category</label>
<input type="hidden"
           name="id"
           value="<?= $id; ?>">
<select name="category_id"
        class="form-select">

<?php foreach($categories as $category): 
    $selected = '';
    if(isset($slide['category_id']) && $slide['category_id'] == $category['id']){
        $selected = 'selected';
    }
    ?>

<option value="<?= $category['id']; ?>" <?= $selected ?>>

<?= $category['title']; ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label>Tag</label>

<input type="text"
       name="tag"
       class="form-control"
       value="<?php if(isset($slide['tag'])){ echo htmlspecialchars($slide['tag']); } ?>">

</div>

<div class="mb-3">

<label>Title</label>

<input type="text"
       name="title"
       class="form-control"
       value="<?php if(isset($slide['title'])){ echo htmlspecialchars($slide['title']); } ?>">

</div>

<div class="mb-3">

<label>Learn More Link</label>

<input type="url"
       name="link"
       class="form-control"
       value="<?php if(isset($slide['link'])){ echo htmlspecialchars($slide['link']); } ?>">

</div>

<div class="mb-3">

<label>Sort Order</label>

<input type="number"
       name="sort_order"
       class="form-control" value="<?php if(isset($slide['sort_order'])){ echo htmlspecialchars($slide['sort_order']); } ?>">

</div>

<div class="mb-3">

<label>Image</label>

<input type="file"
       name="image"
       class="form-control">
       <?php if(isset($slide['image'])){ echo htmlspecialchars($slide['image']); } ?>

</div>

<button class="btn btn-success">
Save Slide
</button>

</form>




</div>

</body>
</html>