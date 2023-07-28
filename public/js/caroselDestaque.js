document.addEventListener('DOMContentLoaded', function() {

    $(document).ready(function () {

        let count = document.getElementById('count').value;

        if(count > 3){
            $("#destaques-content").slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                clone: false,
            });

        }else{
            $("#destaques-content").slick({
                dots: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: false,
                arrows: false,
                clone: false,
                swipe :false,
            });
        }

    });

});
