/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueImported from 'vue';
import 'progressive-image.js/dist/progressive-image.js';
import 'progressive-image.js/dist/progressive-image.css';
//import ScrollSpy from 'vue2-scrollspy';
import VueSidebarMenu from 'vue-sidebar-menu';
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css';
//import checkView from 'vue-check-view';
//import BootstrapVue from 'bootstrap-vue';
//Vue.use(BootstrapVue);

window.Vue = VueImported;
Vue.use(VueSidebarMenu);
// Vue.use(checkView);
// Vue.use(ScrollSpy);

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

Vue.config.devtools = true;
Vue.config.performance = true;
const app = new Vue({
    el: '#app',
    mixins: [window.vueMix],
    data: {
        navbarMenu: window.navbarMenu,
        //screenWidth: screen.width
    },
    computed: {
        isTabletOrSmaller: function() {
            var s = screen.width;
            return s < 768;
            //return screenWidth < 768;
        }
    },
    created() {
        window.addEventListener('scroll', this.scrollFunction);
        //window.addEventListener('resize', this.resizeFunction);
    },
    destroyed() {
        window.removeEventListener('scroll', this.scrollFunction);
        //window.removeEventListener('resize', this.resizeFunction);
    },
    mounted() {
        if (this.isTabletOrSmaller)
        {
            //Initiate navbar shrink
            this.scrollFunction();
        } else
        {
            //Initiate navbar sidebar (Margin for body)
            this.navToggled();
        }
        //Add aria-* to
    },
    watch: {
        isTabletOrSmaller: function (val) {
            //Navbar switch on resize
            if (val) {
                //Remove sidebar if existed
                this.scrollFunction();
            } else {
                //Add sidebar if didn't exist
                this.navToggled();
            }
        }
    },
    methods: {
        //Mobile Nav scroll effect
        // Shrink Navbar on scroll
        // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
        scrollFunction() {
            if (!this.isTabletOrSmaller)
                return;
            //Clear margins of sidebar (if screen width was changed after load)
            if (document.documentElement.lang == 'ar')
            {
                document.getElementById("app").style.marginRight = "0";
            } else
            {
                document.getElementById("app").style.marginLeft = "0";
            }
            //Scroll Effect
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.querySelector('.navbar-brand>img').style.maxHeight = '50px';
            } else {
                document.querySelector('.navbar-brand>img').style.maxHeight = '80px';
            }
        },

        //Side Navbar effect
        navToggled(collapsed) {
            if (this.isTabletOrSmaller)
                return;
            if (document.documentElement.lang == 'ar')
            {
                document.getElementById("app").style.marginRight = this.$refs.nav.sidebarWidth;
            } else
            {
                document.getElementById("app").style.marginLeft = this.$refs.nav.sidebarWidth;
            }
        }
    },
});