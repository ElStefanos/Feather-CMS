function SmoothScroll() {
    $("button").click(function() {
        $('html,body').animate({
            scrollTop: $("#1").offset().top},
            'slow');
    });
}

function Blur() {
    $(window).on('scroll', function () {
        var pixs = $(document).scrollTop()
        pixs = pixs / 100;
        $(".header").css({"-webkit-filter": "blur("+pixs+"px)","filter": "blur("+pixs+"px)" })     
    });
}

function f1() {
    ("#f1").ajaxForm({url: 'connect.php', type: 'post'});
}


Blur();


$(function () { 
    $('#f1').on('submit', function (e) {
    
      e.preventDefault();
    
      $.ajax({
        type: 'post',
        url: './connect.php',
        data: $('form').serialize(),
        success: function () {
           console.log('succes f1');
        }
      });
    
    });
    
});

$(function () { 
    $('#f2').on('submit', function (e) {
    
      e.preventDefault();
    
      $.ajax({
        type: 'post',
        url: './create_acc.php',
        data: $('form').serialize(),
        success: function () {
           console.log('succes f2');
        }
      });
    
    });
    
});
$(function () { 
    $('#f3').on('submit', function (e) {
    
      e.preventDefault();
    
      $.ajax({
        type: 'post',
        url: './install.php',
        data: $('form').serialize(),
        success: function () {
           console.log('succes f3');
        }
      });
    
    });
    
});
