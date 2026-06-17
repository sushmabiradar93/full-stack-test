$(document).ready(function () {

    // Initialize all sliders once
    $('.content-slider').each(function () {

        if (!$(this).hasClass('slick-initialized')) {

            $(this).slick({
                dots: true,
                arrows: true,
                infinite: true,
                adaptiveHeight: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });

        }

    });

    // Set initial image
    const initialImage = $('.active-slider .slide')
        .first()
        .data('image');

    if (initialImage) {
        updateImage(initialImage);
    }

    // Tab click
    $('.tab-item').on('click', function (e) {

        e.preventDefault();

        const tabID = $(this).data('tab');

        $('.tab-item').removeClass('active');
        $(this).addClass('active');

        $('.slider-wrapper').removeClass('active-slider');

        const $activeSliderWrapper = $('#' + tabID);

        $activeSliderWrapper.addClass('active-slider');

        // Fix slick width calculation after showing hidden slider
        const $slider = $activeSliderWrapper.find('.content-slider');

        if ($slider.hasClass('slick-initialized')) {
            $slider.slick('setPosition');
        }

        // Get current active slide image
        const currentIndex = $slider.slick('slickCurrentSlide');

        const image = $slider
            .find('.slick-slide[data-slick-index="' + currentIndex + '"]')
            .data('image');



        updateImage(image);
    });

    // Change image when slide changes
    $('.content-slider').on('afterChange', function (event, slick, currentSlide) {

        const image = $(slick.$slides[currentSlide]).data('image');

        if (image) {
            updateImage(image);
        }

    });

    function updateImage(image) {

        if (!image) {
            return;
        }

        $('#sliderImage').stop(true, true).fadeOut(200, function () {

            $(this)
                .attr('src', image)
                .fadeIn(200);

        });
        
        // Mobile background images
        if ($(window).width() < 992) {
            // In mobile, show just below the active tab, work as accordien
             $(".slider-column").insertAfter($('.tab-item.active'));
            $('.active-slider .slide').each(function () {

                $(this).css(
                    'background-image',
                    'url("' + $(this).data('image') + '")'
                );

            });

        }

    }

    // Window resize fix
    $(window).on('resize', function () {

        $('.content-slider.slick-initialized').slick('setPosition');

    });

});