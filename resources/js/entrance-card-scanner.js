import Vue from "vue";
import VueQrcodeReader from "vue-qrcode-reader";
Vue.use(VueQrcodeReader);
window.app = new Vue({
    el: "#app",
    data: {
        response: "",
        canEnter: false,
        url: "",
        enterURL: ""
    },
    methods: {
        cardScanned(url) {
            this.url = url;
            axios.post(url).then(({ data }) => {
                if (data.success == true) {
                    this.canEnter = true;
                    this.enterURL = data.enterURL;
                    this.response = data.data;
                } else {
                    this.response = data.message;
                }
                this.$refs["qrScanner"].camera = "off";
                this.$refs["qrScanner"].camera = "auto";
            });
        },
        enter() {
            if (this.url == "" || this.enterURL == "" || !this.canEnter) return;
            axios.post(this.enterURL).then(({ data }) => {
                if (data.success == true) {
                    this.canEnter = false;
                    this.url = "";
                    this.enterURL = "";
                    this.response = data.message;
                } else {
                    this.response = data.message;
                }
            });
        }
    }
});
