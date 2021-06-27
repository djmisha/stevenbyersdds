
/* Initiliaze Lazy Loading */

var bLazy = new Blazy({
  offset: 450,
});

/* Main Mobile Navigation */

var mobyMenu = new Moby({
  breakpoint: 1024,
  menu: $('#main-nav'), // The menu that will be cloned
  mobyTrigger: $('.menu-trigger'), // Button that will trigger the Moby menu to open
  subMenuOpenIcon: '<i class="fa fa-plus"></i>',
  subMenuCloseIcon: '<i class="fa fa-minus"></i>',
  menuClass: 'right-side',
  template: '<div class="moby-wrap"><div class="moby-close"><span class="moby-close-icon"></span></div><div class="moby-menu"></div></div>'
});


/* Slideshows */

/* Testi Slideshow */

var homepageSlideShows = document.querySelector('.testi-splide');

if (homepageSlideShows) {
  new Splide('.testi-splide', {
    type: 'loop',
    perPage: 1,
    autoplay: true,

  }).mount();
}


/* Footer Slideshow */

var footerSlideShow = document.querySelector('.footer-splide');

if (footerSlideShow) {
  new Splide('.footer-splide', {
    type: 'loop',
    perPage: 1,
    lazyLoad: 'nearby',
    autoplay: true,
  }).mount();
}




/*jQuery*/

// $(function () {

//   $(window).on("load resize", function (e) {
//     $(".will-parallax").addClass("parallax");
//     $(".will-parallax").addClass("is-parallaxing");

//     if ($(".parallax").hasClass("parallax")) {
//       $(".will-parallax").waypoint(function () {
//         $(".parallax-home-about").parallax("center", 0.3, true);
//         $(".parallax-home-wrapper").parallax("center", 0.3, true);
//         $(".parallax-home-footer").parallax("center", -0.3, true);
//       });
//     }
//   });

// }); 

// end of jQuery doc ready 




