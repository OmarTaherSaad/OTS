/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

import "progressive-image.js/dist/progressive-image.js";
import "progressive-image.js/dist/progressive-image.css";

//Resize to fill screen
window.onresize = function(event) {
    var height = window.innerHeight - document.getElementById("navbar").clientHeight - document.getElementById("footer").clientHeight;
    document.getElementById("app").style.height = height + "px";
}
// Preloader
$(window).on("load", function () {
    if ($("#splash-screen").length) {
        $("#splash-screen")
            .delay(100)
            .fadeOut("slow", function () {
                $(this).remove();
            });
    }
    $(window).trigger('resize');
});
//Navbar change style
$(".navbar-toggler").on("click", function () {
    if (!$("#navbar").hasClass("navbar-reduce")) {
        $("#navbar").addClass("navbar-reduce");
    }
});

// Back to top button
$(window).on('scroll', function () {
    if ($(this).scrollTop() > 100) {
        $(".back-to-top").fadeIn("slow");
    } else {
        $(".back-to-top").fadeOut("slow");
    }
});
var nav = $("nav");
var navHeight = nav.outerHeight();

$(".back-to-top").on('click', function () {
    $("html, body").animate(
        {
            scrollTop: 0
        },
        1500,
        "easeInOutExpo"
    );
    return false;
});

/*--/ Star ScrollTop /--*/
$(".scrolltop-mf").on("click", function () {
    $("html, body").animate(
        {
            scrollTop: 0
        },
        1000
    );
});
/*--/ Star Scrolling nav /--*/
$('a.js-scroll[href*="#"]:not([href="#"])').on("click", function () {
    if (
        location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
    ) {
        var target = $(this.hash);
        target = target.length
            ? target
            : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
            $("html, body").animate(
                {
                    scrollTop: target.offset().top - navHeight + 5
                },
                1000,
                "easeInOutExpo"
            );
            return false;
        }
    }
});

// Closes responsive menu when a scroll trigger link is clicked
$(".js-scroll").on("click", function () {
    $(".navbar-collapse").collapse("hide");
});

// Activate scrollspy to add active class to navbar items on scroll
$("body").scrollspy({
    target: "#navbar",
    offset: navHeight
});
/*--/ End Scrolling nav /--*/

/*--/ Navbar Menu Reduce /--*/
$(window).trigger("scroll");
$(window).on("scroll", function () {
    var pixels = 50;
    var top = 1200;
    if ($(window).scrollTop() > pixels) {
        $(".navbar-expand-md").addClass("navbar-reduce");
        $(".navbar-expand-md").removeClass("navbar-trans");
    } else {
        $(".navbar-expand-md").addClass("navbar-trans");
        $(".navbar-expand-md").removeClass("navbar-reduce");
    }
    if ($(window).scrollTop() > top) {
        $(".scrolltop-mf").fadeIn(1000, "easeInOutExpo");
    } else {
        $(".scrolltop-mf").fadeOut(1000, "easeInOutExpo");
    }
});

import intlTelInput from 'intl-tel-input';

const inputs = document.querySelectorAll("input[type='tel']");
inputs.forEach(function (input) {
    var iti = intlTelInput(input, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js",
        initialCountry: "auto",
        preferredCountries: ["EG", "US", "DE", "GB"],
        geoIpLookup: function (success, failure) {
            $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
                var countryCode = (resp && resp.country) ? resp.country : "EG";
                success(countryCode);
            });
        },
    });
    input.onchange = input.onsubmit = function (e) {
        if (iti.isValidNumber()) {
            input.value = iti.getNumber();
            input.setCustomValidity("");
        } else {
            input.setCustomValidity("Invalid mobile number.");
        }
    }
})
