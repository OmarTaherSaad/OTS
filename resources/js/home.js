import "owl.carousel/dist/assets/owl.carousel.css";
import "owl.carousel";
import 'venobox';
import Typed from "typed.js";
import 'animate.css';

if ($('.text-slider').length == 1) {
var typed_strings = $('.text-slider-items').text();
var typed = new Typed('.text-slider', {
    strings: typed_strings.split(','),
    typeSpeed: 80,
    loop: true,
    backDelay: 1100,
    backSpeed: 30
});
}

/*--/ Testimonials owl /--*/
$('#testimonial-mf').owlCarousel({
margin: 20,
autoplay: true,
autoplayTimeout: 4000,
autoplayHoverPause: true,
responsive: {
    0: {
    items: 1,
    }
}
});

// Initiate venobox (lightbox feature used in portofilo)
$(document).ready(function() {
    $('.venobox').venobox({
        spinner: 'wave',
        share: [],
});
});
