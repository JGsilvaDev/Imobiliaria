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

      if(widthLowerThan(600)){
        $('#produto-carrossel').slick({
          dots: true,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear',
          nextArrow: $('#proxima-imagem'),
          prevArrow: $('#anterior-imagem')
        });

      }else{
        $("#produto-carrossel").slick({
          dots: true,
          infinite: false,
          speed: 500,
          fade: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          clone: false,
          cssEase: 'linear',
          nextArrow: $('#proxima-imagem'),
          prevArrow: $('#anterior-imagem')
        });

      }
      
    };

});

function widthLowerThan(largura) {
  if (window.screen.availWidth < largura) { return true }
  else return false
} 

$(window).on('resize orientationchange', function() {
  $('.carousel').slick('resize');
});