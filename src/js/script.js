jQuery(document).ready(function($) {

  // lightbox.option({
  //   'wrapAround': true,
  //   'albumLabel': 'Bild %1 von %2',
  // });
  
  //Smooth Scroll
  $('a[href^="#"]').bind("click", function(scroller) {
    scroller.preventDefault();
    var ziel = $(this).attr("href");
    $('html,body').animate({
      scrollTop:$(ziel).offset().top - 100
    }, 800);
  });

  //Prefix
  function getPrefixed(prop){
    var i, s = document.createElement('p').style, v = ['ms','O','Moz','Webkit'];
    if( s[prop] == '' ) return prop;
    prop = prop.charAt(0).toUpperCase() + prop.slice(1);
    for( i = v.length; i--; )
    if( s[v[i] + prop] == '' )
    return (v[i] + prop);
  }

  function slideshowFade(slideshowID) {

    //Slideshow
    var config = {
      'animationTime': 15000,
      'fadeSpeed': 1000,
      'count': 0,
      '_interval': null
    };

    var wrapper = $("#" + slideshowID + " .slides"),
    wrapperPoints = $("#" + slideshowID + " .dots"),
    active = 1,
    preActive;

    //Count Slides
    config.count = wrapper.find('.slide').length;
    
    // set wrapper height
    wrapper.css('height', wrapper.outerHeight());

    function changeSlide(direction) {

      preActive = active;

      if (direction == "next") {

        active++;
        if (active > config.count) {
          active = 1;
        }

      } else if (direction == "previous") {

        active--;
        if (active == 0) {
          active = config.count;
        }

      } else {
        active = direction;
      }

      var newHeight = wrapper.find('.slide:nth-child('+ active  +')').outerHeight();
      
      wrapper.find('.slide:nth-child('+ preActive  +')').fadeOut(500, function() {
        wrapper.animate({
          height: newHeight
        }, 500, function() {
          wrapper.find('.slide:nth-child('+ active  +')').fadeIn(500);
          // recheck hight
          newHeight = wrapper.find('.slide:nth-child('+ active  +')').outerHeight();
          wrapper.animate({
            height: newHeight
          });
        });
      }); 

      if (wrapperPoints.length != 0) {
        wrapperPoints.find('.dot:nth-child('+ preActive  +')').removeClass("active");
        wrapperPoints.find('.dot:nth-child('+ active  +')').addClass("active");
      }
    }

    //Set interval to loop the animation
    function autoPlay() {
      if ($('#'+slideshowID).hasClass('autoplay')) {
        config._interval = window.setInterval(function() {
          changeSlide("next");
        }, config.animationTime);
      }
    }
    autoPlay();

    $('#' + slideshowID + ' .rightArrow').bind('click', function() {
      clearInterval(config._interval);

      changeSlide("next");

      autoPlay();
    });


    $('#' + slideshowID + ' .leftArrow').bind('click', function() {
      clearInterval(config._interval);

      changeSlide("previous");

      autoPlay();
    });

    $('#' + slideshowID + ' .dots .dot').bind('click', function() {
      clearInterval(config._interval);

      var id = $(this).index() + 1;

      changeSlide(id);

      autoPlay();

    });
    
    $(window).resize(function(){
      var newHeight = wrapper.find('.slide:nth-child('+ active  +')').outerHeight();
      wrapper.css('height', newHeight);
    });

  }

  $( '.kundenstimmen' ).each(function( index ) {
    if ($( '.kundenstimmen' ).find('.slide').length > 1) {
      var sID = $(this).attr('id');
      slideshowFade(sID);
    }
  });



  /* SCROLLING EVENTS
  ––––––––––––––––––– */

  var lastScrollPos,
  scrollPos,
  menuTriggerHeight = 70;

  function scrolling() {
    
    if ($(window).width() <= 700) {
      menuTriggerHeight = 110;
    } else {
      menuTriggerHeight = 70;
    }

    lastScrollPos = scrollPos;
    scrollPos = document.body.scrollTop;
    if (scrollPos == 0) {
      scrollPos = document.documentElement.scrollTop;
    }

    if (( scrollPos < menuTriggerHeight)) {
      $(".headerWrapper").removeClass("scrolled");
    } else {
      $(".headerWrapper").addClass("scrolled");
    }

  }
  // check on pageLoad
  scrolling();

  document.addEventListener("scroll", scrolling, false);


  // MENU
  $('.header .menu .menu-item-has-children').on('mouseover touchenter', function() {
    $('.bigSubOverlay').fadeIn();
  });
  $('.header .menu .menu-item-has-children').on('mouseleave touchleave', function() {
    $('.bigSubOverlay').fadeOut();
  });
  $('.header .menu .menu-item-has-children > a').on('touchstart', function() {
    $(this).on('click', function(e) {
      $(this).toggleClass('touched');
      if ($(this).hasClass('touched')) {
        e.preventDefault();
      } else {
        window.location.href = $(this).href();
      }
    });
  });


  /* MOBILE MENU
  ––––––––––––––––––– */
  var mobileBreakpoint = 1024;

  $(window).resize(function(){
    if ($(window).width() > mobileBreakpoint) {
      $('.headerWrapper, .mobileMenu, .menu-icon').removeClass('active');
    }
  });
  
  // Mobile Menu
  $('.menu-icon').on('click', function() {
    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
      $('.mobileMenu').removeClass('active').delay(300).queue(function() {
        $('.headerWrapper').removeClass('active').dequeue();
      });
    } else {
      $(this).addClass('active');
      $(this).find('div').removeClass('no-animation');
      $('.headerWrapper').addClass('active').delay(300).queue(function() {
        $('.mobileMenu').addClass('active').dequeue();
      });
    }
  });
  $('.mobileMenu .menu-item-has-children').on('click', function(e) {
    $(this).toggleClass('touched');
    if ($(this).hasClass('touched')) {
      e.preventDefault();
      $(this).find('ul').first().slideDown();
    }
  });
});
