/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueImported from 'vue';
import 'progressive-image.js/dist/progressive-image.js';
import 'progressive-image.js/dist/progressive-image.css';

//Import Fontawesome
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faUserCircle, faVideo, faEnvelope, faGlobeAfrica, faArrowsAltH } from '@fortawesome/free-solid-svg-icons';
library.add(faUserCircle, faVideo, faEnvelope, faGlobeAfrica, faArrowsAltH);
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
        Vue.use(plugin);
    });
}

Vue.config.devtools = false;
Vue.config.debug = false;
Vue.config.silent = true;
window.app = new Vue({
    el: '#app',
    mixins: [window.vueMix],
    data: {
        navbarMenu: window.navbarMenu,
        isTabletOrSmaller: screen.width < 768
    },
    mounted() {
        //Detect resize & Update Vue data
        window.addEventListener('resize', this.resizeFn);
        //Initialize Nav
        this.navUpdate();
    },
    destroyed() {
        window.removeEventListener('resize', this.resizeFn);
    },
    methods: {
        resizeFn() {
            this.isTabletOrSmaller = screen.width < 768;
            this.navUpdate();
        },
        //Side Navbar effect
        navUpdate() {
            if (this.isTabletOrSmaller)
            {
                document.getElementById("app").style.marginRight = "0";
                document.getElementById("app").style.marginLeft = "0";

            } else
            {
                if (document.documentElement.lang == 'ar')
                {
                    document.getElementById("app").style.marginRight = document.querySelector('.navbar').offsetWidth + "px";
                } else
                {
                    document.getElementById("app").style.marginLeft = document.querySelector('.navbar').offsetWidth + "px";
                }
            }
        }
    },
});