import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
import Multiselect from 'vue-multiselect';
import 'vue-multiselect/dist/vue-multiselect.min.css';

window.vuePlugins = Array(2);
window.vuePlugins[0] = ['DateTimePicker', VueCtkDateTimePicker];
window.vuePlugins[1] = ['multiselect', Multiselect];

window.vueMix = {
    data: {
        error: false,
        changeLang: false,
        date: null,
        dateFormatted: null,
        start_time: null,
        end_time: null,
        isRange: true,
        isBooked: true,
        HelpType: null,
        fees: 50,
        place: null,
        mobile_no: null,
        name: null,
        students: null,
        address: null,
        content: null,
        chapters: [],

        AllChapters: window.AllChapters,
        chapterNames: window.locale
    },
    computed: {
        startTime() {
            let time = new Date(this.$refs.start_time.dateTime);
            return time;
        },
        endTime() {
            let time = new Date(this.$refs.end_time.dateTime);
            return time;
        },
    },
    watch: {
        isRange: function (val) {
            this.date = val ? null : this.date != null ? this.date.end : this.date;
        },
        date: function (val) {
            this.$nextTick(function () {
                this.dateFormatted = this.$refs.date.dateFormatted;
            });
        },
        start_time: function (val) {
            if (val != null && this.endTime != undefined) {
                this.$nextTick(function () {
                    if (this.startTime.getHours() < 9)
                    {
                        this.start_time = "9:00 AM";
                    }
                    else if (this.startTime.getHours() > 19)
                    {
                        this.start_time = "7:00 PM";
                    }
                    if (this.endTime.getTime() <= this.startTime.getTime()) {
                        this.end_time = null;
                    }
                });
            }
        },
        end_time: function (val) {
            if (val != null && this.startTime != undefined) {
                this.$nextTick(function () {
                    if (this.endTime.getHours() < 12)
                    {
                        this.end_time = "12:00 PM";
                    }
                    else if (this.endTime.getHours() > 22)
                    {
                        this.end_time = "10:00 PM";
                    }
                    if (this.endTime.getTime() <= this.startTime.getTime()) {
                        this.end_time = null;
                    }
                });
            }
        }
    },
    methods: {
        validate(e) {
            var NotValid =
                /** Main Data */
                (!this.isRange && this.date == null) || (this.isRange && (this.date.start == null || this.date.end == null)) ||
                this.start_time == null || this.end_time == null ||
                /** Data if Booked */
                (this.isBooked && this.chapters.length == 0);

            this.error = NotValid;
            if (NotValid) {
                e.preventDefault();
            } else {
                //Valid
                const action = e.target.getAttribute('action');
                console.log(e.target.getAttribute('action'));

                let data = {
                    date: this.date,
                    start_time: this.startTime,
                    end_time: this.endTime,
                    isRange: this.isRange,
                    isBooked: this.isBooked,
                };
                if (this.isRange)
                {
                    data.date = undefined;
                    data.start_date = this.date.start;
                    data.end_date = this.date.end;
                }
                if (this.isBooked)
                {
                    let chaptersID = [];
                    this.chapters.forEach(ch => {
                        chaptersID.push(ch.key);
                    });
                    data.chapters = chaptersID;
                    data.HelpType = this.HelpType;
                    data.fees = this.fees;
                    data.place = this.place;
                    data.mobile_no = this.mobile_no;
                    data.name = this.mobile_no;
                    //data.students = this.students;
                    //data.address = this.address;
                    data.content = this.content;
                }

                axios.post(action, data).then(response => {
                    console.log(response);
                }).catch(reason => {
                    console.log(reason);
                });
            }
        }
    },
};
