<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DelphianLogic in Action</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">

    <link rel="stylesheet" href="asset/css/slider.css">
</head>
<body>
<?php
include_once('slider.php');
$sliderObj = new Slider();
// get all categories
$categories = $sliderObj->getCategories();
// get all slides
$slides = $sliderObj->getSlides();

?>
<section class="delphian-section py-5">

    <div class="container">

        <div class="text-center text-white mb-5">
            <h2>DelphianLogic in Action</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo</p>
        </div>

        <div class="row g-0 content-wrapper">

            <!-- LEFT TABS -->
            <div class="col-lg-3 tab-column">
                <?php
                $active = 'active';
                foreach($categories as $category){
                    ?>
                     <div class="tab-item <?= $active ?>" data-tab="<?= $category['id'] ?>">
                    <img src="uploads/<?= $category['image'] ?>" alt="<?= $category['title'] ?>" title="<?= $category['title'] ?>">
                    <span><?= $category['title'] ?></span>
                </div>
                    <?php
                    $active = '';
                }
                ?>
            </div>

            <!-- CENTER SLIDER -->
            <div class="col-lg-4 slider-column">

               <?php 
               $count = 0;
               $total = count($slides);
               foreach($slides as $slide){
                // check if multiple slides in same category
                $prevCategory = $slides[$count - 1]['category_id'] ?? null;
                $nextCategory = $slides[$count + 1]['category_id'] ?? null;

                if ($slide['category_id'] !== $prevCategory) {
                ?>
                <div class="slider-wrapper <?= $count === 0 ? 'active-slider' : ''; ?>" id="<?= $slide['category_id'] ?>">
                    <div class="content-slider">
                    <?php
                }
                ?>
                    
                        <div class="slide"
                             data-image="uploads/<?= $slide['image'] ?>">

                            <span class="tag">
                                <?= $slide['tag'] ?>
                            </span>

                            <h2>
                                <?= $slide['title'] ?>
                            </h2>

                            <a target="_blank" href="<?= $slide['link'] ?>">
                                Learn More →
                            </a>

                        </div>
                   
                <?php  if ($slide['category_id'] !== $nextCategory) {
                    ?>
                     </div>
                </div>        
                <?php 
                }
                $count++;
            }
            ?>
        </div>
            <!-- RIGHT IMAGE -->
            <div class="col-lg-5 image-column">
                <img id="sliderImage"
                     src=""
                     alt="">
            </div>

        </div>

    </div>

</section>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="asset/js/slider.js"></script>

</body>
</html>