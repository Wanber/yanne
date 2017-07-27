jQuery(function ($) {

    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top-30}, 800);
    });

});

function redirecionar(link) {
    location.href = link;
}