
var num = 700; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('#menu').addClass('stick');
    } else {
        $('#menu').removeClass('stick');
    }
});

function MenuExpand() {
    $('.hamburger').click(function(){
        $('#menu').toggleClass('active-mobile');

    });
}
