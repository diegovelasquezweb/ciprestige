(function($) {
  FastClick.attach(document.body);

  // @fadeOut
  $(document).ready(function() {
    $("body").removeClass("fade-out");

      new WOW().init();

  });
  $('.brands__slider').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 5,
    dots: true,
    autoplay: true,
    autoplaySpeed: 4000,
    dotsClass: 'brands--pagination',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
 
  });

  $(document).on('click touch', ".open-contact", function (e) {
    $('header .contact').addClass('active');
    $('header .overlay-contact').addClass('active');

  });


  $(document).on('click touch', ".open-menuMobile", function (e) {
    $('header .menu-mobile').addClass('active');
  
  });

  $(document).on('click touch', ".close-menuMobile", function (e) {
    $('header .menu-mobile').removeClass('active');
  
  });

  $(document).on('click touch', ".overlay-contact, .close-contact", function (e) {
    $('header .contact').removeClass('active');
    $('header .overlay-contact').removeClass('active');

  });

  $("#menu--trigger, #open-submenu").on({
    mouseenter: function(e) {
      $(".submenu").addClass("active");
    },
    mouseleave: function(e) {
      $(".submenu").removeClass("active");
    }
  });

  // $(document).on("click", ".open-submenu", function(event) {
  //   event.preventDefault();
  //   var id = $(this).attr("data-id");
  //   $("#" + id).addClass("active");
  // });

  $(document).ready(function() {
    $('#hero-slider').on('init', function(e, slick) {
        var $firstAnimatingElements = $('div.hero-slide:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);    
    });
    $('#hero-slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
              var $animatingElements = $('div.hero-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
              doAnimations($animatingElements);    
    });
    $('#hero-slider').slick({
       autoplay: true,
       autoplaySpeed: 4000,
       dots: true,
       fade: true,
       swipeToSlide: true,
       dotsClass: 'banner--pagination'
    });
 
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function() {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function() {
                $this.removeClass($animationType);
            });
        });
    }
});

}(jQuery));

(function ($) {
  $.fn.clickToggle = function (func1, func2) {
    var funcs = [func1, func2];
    this.data('toggleclicked', 0);
    this.click(function () {
      var data = $(this).data();
      var tc = data.toggleclicked;
      $.proxy(funcs[tc], this)();
      data.toggleclicked = (tc + 1) % 2;
    });
    return this;
  };
}(jQuery));








