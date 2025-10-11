import _ from "lodash";
window._ = _;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

import Popper from "popper.js";
import $ from "jquery";
import "jquery.easing";
import * as bootstrap from "bootstrap";

window.Popper = Popper;
window.$ = window.jQuery = $;
window.bootstrap = bootstrap;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to your Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
axios.interceptors.request.use(
    function (config) {
        //Before request start: show loading
        document.body.classList.add("loading");
        return config;
    },
    function (error) {
        alert("Something went wrong :/ Please, Try again later.");
        document.body.classList.remove("loading");
        return Promise.reject(error);
    }
);
axios.interceptors.response.use(
    function (response) {
        //After request is done: hide loading
        document.body.classList.remove("loading");
        return response;
    },
    function (error) {
        alert("Something went wrong :/ Please, Try again later.");
        document.body.classList.remove("loading");
        return Promise.reject(error);
    }
);
