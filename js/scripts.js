/* Initiliaze Lazy Loading */

var bLazy = new Blazy({
  offset: 450,
});

/* Main Mobile Navigation */

jQuery(document).ready(function ($) {
  var Moby = function (a) { Moby.instances++; this.breakpoint = "undefined" == typeof a.breakpoint ? 1024 : a.breakpoint; this.enableEscape = "undefined" == typeof a.enableEscape || a.enableEscape; this.menu = "undefined" == typeof a.menu ? $("#main-nav") : a.menu; this.menuClass = "undefined" == typeof a.menuClass ? "right-side" : a.menuClass; this.mobyTrigger = "undefined" == typeof a.mobyTrigger ? $("#moby-button") : a.mobyTrigger; this.onClose = "undefined" != typeof a.onClose && a.onClose; this.onOpen = "undefined" != typeof a.onOpen && a.onOpen; this.overlay = "undefined" == typeof a.overlay || a.overlay; this.overlayClass = "undefined" == typeof a.overlayClass ? "dark" : a.overlayClass; this.subMenuOpenIcon = "undefined" == typeof a.subMenuOpenIcon ? "<span>&#x25BC;</span>" : a.subMenuOpenIcon; this.subMenuCloseIcon = "undefined" == typeof a.subMenuCloseIcon ? "<span>&#x25B2;</span>" : a.subMenuCloseIcon; this.template = "undefined" != typeof a.template && a.template; if (this.overlay === !0) { $("body").prepend('<div class="moby-overlay ' + this.overlayClass + '" id="moby-overlay' + Moby.instances + '"></div>'); this.overlaySelector = $("body").find("#moby-overlay" + Moby.instances); this.overlaySelector.on("click", this.closeMoby.bind(this)) } $("body").prepend('<div class="moby moby-hidden ' + this.menuClass + '" id="moby' + Moby.instances + '"></div>'); this.mobySelector = $("body").find("#moby" + Moby.instances); this.cloneMenu(); this.mobySelector.on("click", ".moby-close", this.closeMoby.bind(this)); this.enableEscape === !0 && $(document).on("keydown", function (a) { 27 == a.keyCode && this.closeMoby() }.bind(this)); this.mobyTrigger.on("click", this.openMoby.bind(this)); $(window).on("resize", this.breakpointResize.bind(this)); this.mobySelector.on("click", ".moby-expand", function (a) { a.preventDefault(); a.stopPropagation(); this.mobyExpandSubMenu($(a.currentTarget)) }.bind(this)); this.mobySelector.on("click", "a", this.mobyPreventDummyLinks.bind(this)) }; Moby.instances = 0; Moby.slideTransition = 200; Moby.prototype.closeMoby = function () { var a = $("body").find(".moby.moby-active"); if (a.length > 0) { this.overlay === !0 && $("body").find(".moby-overlay.moby-overlay-active").removeClass("moby-overlay-active"); a.removeClass("moby-active"); $("body").removeClass("moby-body-fixed"); this.onClose !== !1 && this.onClose() } }; Moby.prototype.cloneMenu = function () { var a = "", b = this.subMenuOpenIcon; if (this.template === !1) { a = '<div class="moby-wrap">'; a += '<div class="moby-close"><span class="moby-close-icon"></span> Close Menu</div>'; a += '<div class="moby-menu"></div>'; a += "</div>" } else a = this.template; this.mobySelector.append(a); if (this.mobySelector.find(".moby-menu").length < 1) { console.error("You must have a moby-menu class in your template!"); return !1 } this.menu.clone().appendTo(this.mobySelector.find(".moby-menu")); this.mobySelector.find(".moby-menu *[id]").removeAttr("id"); this.mobySelector.find(".moby-menu li").each(function () { $(this).find("ul").length > 0 && $(this).find("> a").append("<span class='moby-expand'>" + b + "</span>") }); this.mobySelector.removeClass("moby-hidden") }; Moby.prototype.openMoby = function () { this.mobySelector.addClass("moby-active"); $("body").addClass("moby-body-fixed"); this.overlay === !0 && this.overlaySelector.addClass("moby-overlay-active"); this.onOpen !== !1 && this.onOpen() }; Moby.prototype.breakpointResize = function () { var a = window.outerWidth; if (this.breakpoint === !1) return !1; a >= this.breakpoint && this.mobySelector.hasClass("moby-active") && this.closeMoby() }; Moby.prototype.mobyExpandSubMenu = function (a) { if (a.hasClass("moby-submenu-open")) { a.removeClass("moby-submenu-open"); a.html(this.subMenuOpenIcon); a.parents("li").first().find("> ul").slideUp(Moby.slideTransition) } else { a.addClass("moby-submenu-open"); a.html(this.subMenuCloseIcon); a.parents("li").first().find("> ul").slideDown(Moby.slideTransition) } }; Moby.prototype.mobyPreventDummyLinks = function (a) { var b = $(this).find("> .moby-expand"); if ("#" == $(this).attr("href")) { a.preventDefault(); b.length > 0 && b.trigger("click") } };

  var mobyMenu = new Moby({
    breakpoint: 1024,
    menu: $('#main-nav'), // The menu that will be cloned
    mobyTrigger: $('.menu-trigger'), // Button that will trigger the Moby menu to open
    subMenuOpenIcon: '<i class="fa fa-plus"></i>',
    subMenuCloseIcon: '<i class="fa fa-minus"></i>',
    menuClass: 'right-side',
    template: '<div class="moby-wrap"><div class="moby-close"><span class="moby-close-icon"></span></div><div class="moby-menu"></div></div>'
  });
});

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
