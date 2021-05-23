
/* Initiliaze Lazy Loading */

var bLazy = new Blazy({
  offset: 450,
});

/* Main Mobile Navigation */

var mobyMenu = new Moby({
  menu: $('#main-nav'), // The menu that will be cloned
  mobyTrigger: $('.menu-trigger'), // Button that will trigger the Moby menu to open
  subMenuOpenIcon: '<i class="fa fa-plus"></i>',
  subMenuCloseIcon: '<i class="fa fa-minus"></i>',
  menuClass: 'left-side',
  template: '<div class="moby-wrap"><div class="moby-close"><span class="moby-close-icon"></span></div><div class="moby-menu"></div></div>'
});


/* Slideshows */

var homepageSlideShows = document.querySelector('.testi-splide');

if (homepageSlideShows) {
  new Splide('.testi-splide', {
    type: 'loop',
    perPage: 1,
  }).mount();
}


/* Doctors Slideshow */

var doctorSlideShows = document.querySelector('.doctors-splide');

if (doctorSlideShows) {
  new Splide('.doctors-splide', {
    type: 'loop',
    perPage: 1,
  }).mount();
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


