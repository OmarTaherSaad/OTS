/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

axios.interceptors.request.use(function (config) {
    //Before request start: show loading
    document.body.classList.add('loading');
    return config;
}, function (error) {
    alert("Something went wrong :/ Please, Try again later.");
    document.body.classList.remove('loading');
    return Promise.reject(error);
});
axios.interceptors.response.use(function (response) {
    //After request is done: hide loading
    document.body.classList.remove('loading');
    return response;
}, function (error) {
    alert("Something went wrong :/ Please, Try again later.");
    document.body.classList.remove('loading');
    return Promise.reject(error);
});


import VueImported from 'vue';
import 'progressive-image.js/dist/progressive-image.js';
import 'progressive-image.js/dist/progressive-image.css';

//Import Fontawesome
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faUserCircle, faVideo, faEnvelope, faGlobeAfrica } from '@fortawesome/free-solid-svg-icons';
library.add(faUserCircle, faVideo, faEnvelope, faGlobeAfrica);
dom.watch();

window.Vue = VueImported;

//Component for Progressive-image.js
Vue.component('ProgImg', {
    props: ['src', 'alt', 'vclass'],
    data: function () {
        var pr = this.src.substr(0, this.src.lastIndexOf('/') + 1) + 'Progressive-' + this.src.substr(this.src.lastIndexOf('/') + 1);
        return {
            preview: pr,
            classList: 'progressive replace ' + this.vclass
        }
    },
    template: "<figure :data-href='src' v-bind:class='classList'><img :src='preview' :alt='alt' class='preview' /></figure>"
    });

if (window.vueMix === undefined)
{
    window.vueMix = {
        data: {
        },
    };
}
if (window.vuePlugins !== undefined)
{
    window.vuePlugins.forEach(plugin => {
        if (Array.isArray(plugin))
        {
            Vue.component(plugin[0], plugin[1]);
        } else
        {
            Vue.use(plugin);
        }
    });
}

Vue.config.devtools = !process.env.VUE_APP_PRODUCTION;
Vue.config.debug = !process.env.VUE_APP_PRODUCTION;
Vue.config.silent = process.env.VUE_APP_PRODUCTION;
window.app = new Vue({
    el: '#app',
    mixins: [window.vueMix],
    data: {
        isTabletOrSmaller: screen.width < 768
    },
    mounted() {
        //Detect resize & Update Vue data
        window.addEventListener('resize', this.resizeFn);
    },
    destroyed() {
        window.removeEventListener('resize', this.resizeFn);
    },
    methods: {
        resizeFn() {
            this.isTabletOrSmaller = screen.width < 768;
        }
    },
});