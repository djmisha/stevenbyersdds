
/* Initiliaze Lazy Loading */

var bLazy = new Blazy({
    offset: 450,
});

/* Main Mobile Navigation */

var mobyMenu = new Moby({
  menu       : $('#main-nav'), // The menu that will be cloned
  mobyTrigger: $('.menu-trigger'), // Button that will trigger the Moby menu to open
  subMenuOpenIcon  : '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
  subMenuCloseIcon : '<i class="fa fa-chevron-down" aria-hidden="true"></i>',
  menuClass    : 'grow-out',
});


/* Slideshows */

var heroSlideshow = document.querySelector('.splide-hero');

if (heroSlideshow) {
  var kenburgs = new Splide( '.splide-hero', {
        type   : 'fade',
        rewind: true,
        autoplay: true,
        arrows: false,
        speed: 500,
        interval: 4700,
        drag: false,
        pauseOnHover: false,
        pagination: false,
        lazyLoad: 'sequential'
    } ).mount();

  
  kenburgs.on( 'visible', function(event) {
    event.slide.classList.add('start-effect');
  } );

  kenburgs.on( 'hidden', function(event) {
    setTimeout( function() { 
      event.slide.classList.remove('start-effect');
    }, 500);
  } );
}


/* Testimonials Slideshow */

var homepageSlideShows = document.querySelector('.testi-splide');

if (homepageSlideShows) {
    new Splide( '.testi-splide', {
        type   : 'loop',
        perPage: 1,
    } ).mount();
}


/* Mobile Slideshow */

var homepageSlideShowsMobile = document.querySelector('.mobile-splide');

if (homepageSlideShowsMobile) {
    new Splide( '.mobile-splide', {
        type   : 'loop',
        perPage: 1,
        arrows: false,
        pagination: false,
        focus  : 'center',
        padding: {
            right: '40px',
            left : '40px',
          },
    } ).mount();
}



/*jQuery*/

$(function () {

    /* Homepage Tabs */

    $('.tab-top:first-of-type').addClass('active');
    $('.tab-pane:first-of-type').addClass('active');

    function switchBetweenTabs() {
      var tabElement = document.querySelectorAll('.tab-top');

      tabElement.forEach( function (tab) {
          tab.addEventListener('click', onTabClick, false);
      });

      function onTabClick(event) {
        event.preventDefault();
        // find all active tabs
        var activeTabs = document.querySelectorAll('.active');
        // remove active from currently active tabs
        for (var i = 0; i < activeTabs.length; i++) {
            activeTabs[i].className = activeTabs[i].className.replace(' active', '');
        }
        // console.log(event);
        // adds active class to new tab
        event.target.className += ' active';
        event.target.parentElement.className += ' active';

        // adds active class to new tab content
        document.getElementById(event.target.href.split('#')[1]).className += ' active';
      }
    }

    switchBetweenTabs();

    /* Sticky stickyMenuTrigger  */

    var stickyMenuTrigger = document.querySelector(
        ".sticky-trigger"
    );

    if (stickyMenuTrigger) {
        (function () {
            function makeSticky(item) {
                item.classList.add("sticky-navigation");
            }

            function removeSticky(item) {
                item.classList.remove("sticky-navigation");
            }

            function stickyFooter() {
                if (window.pageYOffset > 200) {
                    makeSticky(stickyMenuTrigger);
                } else {
                    removeSticky(stickyMenuTrigger);
                }
            }

            stickyFooter();
            window.addEventListener("scroll", stickyFooter);
        })();
    }


    // Parallax

    $(window).on("load resize", function (e) {
        $(".will-parallax").addClass("parallax");
        $(".will-parallax").addClass("is-parallaxing");

        if ($(".parallax").hasClass("parallax")) {
            $(".will-parallax").waypoint(function () {
                $(".parallax-home-about").parallax("center", 0.3, true);
                $(".parallax-home-wrapper").parallax("center", 0.3, true);
                $(".parallax-home-footer").parallax("center", -0.3, true);
            });
        }
    });

}); // end of jQuery doc ready 


/* Parallax Effects -> https://github.com/dixonandmoe/rellax */

// var isHome = document.querySelector('.home');

// if (isHome) {

//   var welcomeFlower = new Rellax('.icon-welcome-flower', {
//     speed: 1,
//     center: false,
//     wrapper: null,
//     round: true,
//     vertical: true,
//     horizontal: false
//   });

//   var welcomeFlowerTwo = new Rellax('.icon-welcome-flower-2', {
//     speed: 2,
//     center: false,
//     wrapper: null,
//     round: true,
//     vertical: true,
//     horizontal: false
//   });


//   var doctorFlower = new Rellax('.icon-doctor-flower', {
//     speed: 2,
//     center: false,
//     wrapper: null,
//     round: true,
//     vertical: true,
//     horizontal: false
//   });

// }



/* Contact Page Hack*/

var contactPageMap = document.querySelector('.location-map'); 
if (contactPageMap) {
  var footer = document.querySelector('footer');
  var lowerfooter = document.querySelector('.lower-footer');
  footer.appendChild(contactPageMap);
  footer.appendChild(lowerfooter);
}


var herosection = document.querySelector(".block-hero");
if(herosection) {
  var inside =  document.querySelector(".inside");
  var iconButtons = document.querySelectorAll(".inside-hero-buttons a");

  if (inside.classList.contains('botox')) {
    iconButtons[0].classList.add('active')
  } 

  if (inside.classList.contains('breast')) {
    iconButtons[1].classList.add('active')
  } 

  if (inside.classList.contains('body')) {
    iconButtons[2].classList.add('active')
  } 

  if (inside.classList.contains('face')) {
    iconButtons[3].classList.add('active')
  } 
}