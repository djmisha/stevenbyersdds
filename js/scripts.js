
/* Initiliaze Lazy Loading */

var bLazy = new Blazy({
    offset: 450,
});

/* Main Mobile Navigation */

var mobyMenu = new Moby({
  menu       : $('#main-nav'), // The menu that will be cloned
  mobyTrigger: $('.menu-trigger'), // Button that will trigger the Moby menu to open
  subMenuOpenIcon  : '<i class="fa fa-plus"></i>',
  subMenuCloseIcon : '<i class="fa fa-minus"></i>',
  menuClass    : 'left-side',
  template         : '<div class="moby-wrap"><div class="moby-close"><span class="moby-close-icon"></span></div><div class="moby-menu"></div></div>'
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


/* Doctors Slideshow */

var doctorSlideShows = document.querySelector('.doctors-splide');

if (doctorSlideShows) {
    new Splide( '.doctors-splide', {
        type   : 'loop',
        perPage: 1,
    } ).mount();
}




/* Mobile Slideshow */

// var homepageSlideShowsMobile = document.querySelector('.mobile-splide');

// if (homepageSlideShowsMobile) {
//     new Splide( '.mobile-splide', {
//         type   : 'loop',
//         perPage: 1,
//         arrows: false,
//         pagination: false,
//         focus  : 'center',
//         padding: {
//             right: '40px',
//             left : '40px',
//           },
//     } ).mount();
// }



/*jQuery*/

$(function () {

    /* Homepage Tabs */

    // $('.tab-top:first-of-type').addClass('active');
    // $('.tab-pane:first-of-type').addClass('active');

    // function switchBetweenTabs() {
    //   var tabElement = document.querySelectorAll('.tab-top');

    //   tabElement.forEach( function (tab) {
    //       tab.addEventListener('click', onTabClick, false);
    //   });

    //   function onTabClick(event) {
    //     event.preventDefault();
    //     // find all active tabs
    //     var activeTabs = document.querySelectorAll('.active');
    //     // remove active from currently active tabs
    //     for (var i = 0; i < activeTabs.length; i++) {
    //         activeTabs[i].className = activeTabs[i].className.replace(' active', '');
    //     }
    //     // console.log(event);
    //     // adds active class to new tab
    //     event.target.className += ' active';
    //     event.target.parentElement.className += ' active';

    //     // adds active class to new tab content
    //     document.getElementById(event.target.href.split('#')[1]).className += ' active';
    //   }
    // }

    // switchBetweenTabs();


    /* Duplicate Masthead and Sticky Navigation */
    let header = document.querySelector('.site-header');
    let masthead = document.querySelector('.masthead');
    let cloneMast = masthead;
    // let cloneMast = {...masthead};
    

    cloneMast.classList.add('sticky-navigtaion');
    header.appendChild(cloneMast)
    console.log(cloneMast);

    if (cloneMast) {
        (function () {
            function makeSticky(item) {
                item.classList.add("stuck");
            }

            function removeSticky(item) {
                item.classList.remove("stuck");
            }

            function stickyNav() {
                if (window.pageYOffset > 200) {
                    makeSticky(cloneMast);
                } else {
                    removeSticky(cloneMast);
                }
            }

            stickyNav();
            window.addEventListener("scroll", stickyNav);
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


/* Video Hack  */

var videoBlock = document.querySelector(".block-video-with-bg");
if(videoBlock) {
  var videoDivBg =  document.createElement('div');
  videoDivBg.classList.add('videoDivBg');
  videoBlock.appendChild(videoDivBg);
}