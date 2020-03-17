$( document ).ready(function() {
    $('.cura-img').on('click', function(){
        $('.cura-img').addClass('grayscale');
        $(".remover").remove();
        var x = $(this);
        x.removeClass('grayscale');
        if($(window).width() > 768){
            var target = x.attr('target');
            var clone = $(target).clone();
            if(x.is(':nth-child(1)') || x.is(':nth-child(3)') || x.is(':nth-child(5)')){
                var dps = $('.cura-img:nth-child(5)');

                clone.insertAfter(dps);
                clone.addClass('remover');
                clone.removeClass('d-none');
            }
            if(x.is(':nth-child(7)') || x.is(':nth-child(9)') || x.is(':nth-child(11)')){
                var dps = $('.cura-img:nth-child(11)');
                clone.insertAfter(dps);
                clone.addClass('remover');
                clone.removeClass('d-none');
            }
            if(x.is(':nth-child(13)') || x.is(':nth-child(15)') || x.is(':nth-child(17)')){
                var dps = $('.cura-img:nth-child(17)');
                clone.insertAfter(dps);
                clone.addClass('remover');
                clone.removeClass('d-none');
            }
            clone.css('opacity', '1')
            clone.css('height', '250px')
            
        }else{
          var target = x.attr('target');
          if($(target).hasClass('open')){
            $('.curador').removeClass('open');
            x.addClass('grayscale');
          }else{
            $('.curador').removeClass('open');
            $(target).addClass('open');
          }
          
        }
        
    });
    $('.slider-citacoes').slick({
        slidesToShow: 1,
        slidestoScroll: 1,
        arrows: false,
        dots: true,
        vertical: true
      });
      $('.hamb-icon, .btn-close, .mobile-menu li a').on('click', function(){
        $('.mobile-menu').toggleClass('open');
        $('body').toggleClass('open');
      });
      $('a[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
          && 
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 500, function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
            });
          }
        }
      });
      var maxHeight = -1;
$('.slick-slide').each(function() {
  if ($(this).height() > maxHeight) {
    maxHeight = $(this).height();
  }
});
$('.slick-slide').each(function() {
  if ($(this).height() < maxHeight) {
    $(this).css('margin', Math.ceil((maxHeight-$(this).height())/2) + 'px 0');
  }
});
})