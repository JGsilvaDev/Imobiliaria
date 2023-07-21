document.addEventListener('DOMContentLoaded', function() {

    window.onload = function() {
        $('.slider-for').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: true,
          asNavFor: '.slider-nav'
        });

        $('.slider-nav').slick({
          infinite: true,
          slidesToScroll: 1,
          slidesToShow: 5,
          asNavFor: '.slider-for',
          dots: true,
          centerMode: true,
          focusOnSelect: true
        });
      };

});
