document.addEventListener('DOMContentLoaded', function() {

    $(document).ready(function () {

        let count = document.getElementById('count').value;
        if(!widthLowerThan(610)) {
            count = 1;
        }

        if(count >= 3){
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

        }else if(count == 2){
            $("#destaques-content").slick({
                dots: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: false,
                arrows: false,
                clone: false,
                swipe :false,
            });
        }else if(count == 1) {
            $("#destaques-content").slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                arrows: false,
                clone: false,
            });
        }

    });

});


function checkRes() {
    console.log('altura: '+window.screen.availHeight)
    console.log('largura: '+window.screen.availWidth)
}

function widthLowerThan(largura) {
    if (window.screen.availWidth > largura) { return true }
    else return false
}
