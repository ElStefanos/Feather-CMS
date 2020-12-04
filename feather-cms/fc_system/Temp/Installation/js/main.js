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
      var data = '';
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: './connect.php',
        data: $('form').serialize(),
        success: function (data) {
           var message = data[0];
           var status = data[1];
           console.log(status);
           alert(message);
           if (status === '1') {
             $('#f1f').attr('disabled', true);
             $('#f2f').attr('disabled', false);
           }
        }
      });
    
    });
    
});

$(function () { 
    $('#f2').on('submit', function (e) {
    
      e.preventDefault();
    
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: './create_acc.php',
        data: $('form').serialize(),
        success: function (data) {
           console.log('succes f2');
           var message = data[0];
           var status = data[1];
           console.log(status);
           
           if (status == 1) {
             $('#f2f').attr('disabled', true);
             $('#f3f').attr('disabled', false);
           } else {
              alert(message);
           }
        }
      });
    
    });
    
});
$(function () { 
    $('#f3').on('submit', function (e) {
      
      e.preventDefault();
    
      $.ajax({
        dataType: 'json',
        type: 'post',
        url: './install.php',
        data: $('form').serialize(),
        success: function (data) {
          console.log('succes f2');
          var message = data[0];
          var status = data[1];
          console.log(status);
          
          if (status == 1) {
            $(document).ready(function(){
   
              alert('Now you can proceed. You are all set');
              window.history.back();
           
           });
          } else {
             alert(message);
          }
        }
      });
    
    });
    
});
