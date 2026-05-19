/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";

// Using lightweight CSS icons instead of JavaScript icon libraries

import "progressive-image.js/dist/progressive-image.js";
import "progressive-image.js/dist/progressive-image.css";
import { createApp } from 'vue'
import EstimateForm from './components/EstimateForm.vue'

//Resize to fill screen
window.onresize = window.onload = function (event) {
    if (document.getElementById("app").scrollHeight < window.innerHeight) {
        var height =
            window.innerHeight -
            document.getElementById("footer").scrollHeight -
            document.getElementById("navbar").scrollHeight;
        document.getElementById("app").style.height = height + "px";
    }
};
$("#navbar, #footer").on("resize", function () {
    $(window).trigger("resize");
});
// Preloader
$(window).on("load", function () {
    if ($("#splash-screen").length) {
        $("#splash-screen")
            .delay(100)
            .fadeOut("slow", function () {
                $(this).remove();
            });
    }
    $(window).trigger("resize");
});
//Navbar change style
$(".navbar-toggler").on("click", function () {
    if (!$("#navbar").hasClass("navbar-reduce")) {
        $("#navbar").addClass("navbar-reduce");
    }
});

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

import intlTelInput from "intl-tel-input";

const inputs = document.querySelectorAll("input[type='tel']");
inputs.forEach(function (input) {
    var iti = intlTelInput(input, {
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js",
        initialCountry: "auto",
        preferredCountries: ["EG", "US", "DE", "GB"],
        geoIpLookup: function (success, failure) {
            $.get("https://ipinfo.io", function () {}, "jsonp").always(
                function (resp) {
                    var countryCode =
                        resp && resp.country ? resp.country : "EG";
                    success(countryCode);
                }
            );
        },
    });
    input.onchange = input.onsubmit = function (e) {
        if (iti.isValidNumber()) {
            input.value = iti.getNumber();
            input.setCustomValidity("");
        } else {
            input.setCustomValidity("Invalid mobile number.");
        }
    };
    input.dispatchEvent(new Event("change"));
});

document.addEventListener("DOMContentLoaded", function () {
    // Back to top button
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    var nav = $("nav");
    var navHeight = nav.outerHeight();

    $(".back-to-top").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: 0,
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
                scrollTop: 0,
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
                        scrollTop: target.offset().top - navHeight + 5,
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

    // Bootstrap 5 scrollspy implementation
    // Initialize scrollspy
    const scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: "#navbar",
        offset: navHeight + 20,
    });

    // Manual scrollspy implementation as fallback
    function updateActiveNavItem() {
        const sections = document.querySelectorAll("section[id], div[id]");
        const navLinks = document.querySelectorAll(
            '#navbar .nav-link[href^="#"], #navbar .nav-link[href*="index"]'
        );

        let current = "";
        const scrollPosition = window.scrollY + navHeight + 50;

        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;

            if (
                scrollPosition >= sectionTop &&
                scrollPosition < sectionTop + sectionHeight
            ) {
                current = section.getAttribute("id");
            }
        });

        navLinks.forEach((link) => {
            link.classList.remove("active");
            const href = link.getAttribute("href");

            // Handle Home link (either #home or route to index)
            if (href === "#home" && current === "home") {
                link.classList.add("active");
            }
            // Handle other section links
            else if (href === "#" + current) {
                link.classList.add("active");
            }
            // Handle Home link when at top of page
            else if (
                (href.includes("index") || href === "#home") &&
                scrollPosition < 100
            ) {
                link.classList.add("active");
            }
        });
    }

    // Listen for scroll events
    window.addEventListener("scroll", updateActiveNavItem);
    // Initial call
    updateActiveNavItem();
    /*--/ End Scrolling nav /--*/

    // Dark mode toggle
    const toggle = document.getElementById("theme-toggle");
    const storedTheme = localStorage.getItem("theme");
    if (storedTheme === "dark") {
        document.body.classList.add("dark-mode");
    }
    if (toggle) {
        // update initial text
        toggle.textContent = document.body.classList.contains("dark-mode")
            ? "Light Mode"
            : "Dark Mode";
        toggle.addEventListener("click", function (e) {
            e.preventDefault();
            document.body.classList.toggle("dark-mode");
            const isDark = document.body.classList.contains("dark-mode");
            toggle.textContent = isDark ? "Light Mode" : "Dark Mode";
            localStorage.setItem("theme", isDark ? "dark" : "light");
        });
    }
    // Mount pricing estimator if target exists
    const mountEl = document.getElementById('pricing-estimator-root')
    if (mountEl) {
        const app = createApp(EstimateForm)
        app.mount(mountEl)
    }
});
