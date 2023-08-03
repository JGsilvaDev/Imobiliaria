document.addEventListener('DOMContentLoaded', function() {

  window.onload = function() {
      // $('.slider-for').slick({
      //   slidesToShow: 1,
      //   slidesToScroll: 1,
      //   arrows: true,
      //   fade: true,
      //   asNavFor: '.slider-nav'
      // });

      // $('.slider-nav').slick({
      //   infinite: true,
      //   slidesToShow: 4,
      //   slidesToScroll: 1,
      //   asNavFor: '.slider-for',
      //   dots: true,
      //   centerMode: true,
      //   focusOnSelect: true,
      //   arrows: false,
      // });
      $('.fade').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        nextArrow: $('#proxima-imagem'),
        prevArrow: $('#anterior-imagem')
      });
    };

});