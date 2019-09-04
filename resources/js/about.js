//Import Fontawesome
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faMapMarkedAlt, faGraduationCap, faClock, faBrain, faRedo } from '@fortawesome/free-solid-svg-icons';
import { faYoutube } from '@fortawesome/free-brands-svg-icons';
library.add(
    faMapMarkedAlt, faGraduationCap, faClock, faBrain, faRedo,
    faYoutube);
dom.watch();

import ScrollSpy from 'vue2-scrollspy';
import checkView from 'vue-check-view';
window.vuePlugins = Array(2);
window.vuePlugins[0] = checkView;
window.vuePlugins[1] = ScrollSpy;

window.vueMix = {
    data: {
        titleOnSide: false,
        skills: {
            web: [
                {
                    title: "Laravel",
                    img: "/storage/assets/images/logos/laravel.png"
                },
                {
                    title: "Vue.js",
                    img: "/storage/assets/images/logos/vuejs.png"
                },
                {
                    title: "Bootstrap",
                    img: "/storage/assets/images/logos/Bootstrap.png"
                },
            ],
            csharp: [
                {
                    title: ".NET Core",
                    img: "/storage/assets/images/logos/csharp-netcore.png"
                },
                {
                    title: "<abbr title='Model-View-Controller'>MVC Design Pattern</abbr>",
                    img: "/storage/assets/images/logos/csharp-mvc.png"
                },
                {
                    title: "<abbr title='Language Integrated Query'>LINQ</abbr>",
                    img: "/storage/assets/images/logos/csharp-linq.png"
                },
                {
                    title: "Windows Applications",
                    img: "/storage/assets/images/logos/csharp-windowsApps.png"
                },
                {
                    title: "SQLite Databases",
                    img: "/storage/assets/images/logos/csharp-sqlite.png"
                },
            ],
            videoEditing: [
                {
                    titleEN: "Color Correction",
                    titleAR: "تصحيح الألوان",
                    descEN: "First, I do some pre-editing touches for color editing & filtration, to ensure that the footage is ready for montage.",
                    descAR: "في البداية، بعمل تصحيح للألوان وتنقية بحيث تبقى الفيديوهات المُصورة جاهزة يتعملها مونتاج",
                    img: "/storage/assets/images/skills/videoedit-colors.png"
                },
                {
                    titleEN: "Audio Editing",
                    titleAR: "تحرير الصوت",
                    descEN: "I apply noise cancellation & purify the sound of each video, of the recorded voice over.",
                    descAR: "بعمل تنقية للأصوات وإزالة لأي أصوات جانبية في الفيديوهات، أو للتعليق الصوتي اللي هيتم تركيبه على الفيديو.",
                    img: "/storage/assets/images/skills/videoedit-sound.png"
                },
                {
                    titleEN: "Montage",
                    titleAR: "مونتاج",
                    descEN: "I start montaging the videos & make it ready for publishing.",
                    descAR: "بعمل مونتاج للفيديوهات وبخلصه بحيث تبقى جاهزة للإنتاج والناس تقدر تشوفها..",
                    img: "/storage/assets/images/skills/videoedit-montage.png"
                },
                {
                    titleEN: "Graphics",
                    titleAR: "الرسومات (جرافيكس)",
                    descEN: "If you want, I add slight graphics & animations in the video to look more interacting.",
                    descAR: "لو طلبت ده، فأقدر أضيف بعض التأثيرات الخفيفة والحركة على الفيديوهات عشان يبقى شكلها أكثر تفاعلًا.",
                    img: "/storage/assets/images/skills/videoedit-vfx.png"
                },
            ],
            cse: [
                {
                    title: "C++ Programming Language",
                    img: "/storage/assets/images/skills/cse-cplusplus.png"
                },
                {
                    title: "Data Structures & Algorithms",
                    img: "/storage/assets/images/skills/cse-ds.png"
                },
                {
                    title: "C Programming Language",
                    img: "/storage/assets/images/skills/cse-c.png"
                },
                {
                    title: "Logic Circuits",
                    img: "/storage/assets/images/skills/cse-logic.png"
                },
                {
                    title: "Computer Organization",
                    img: "/storage/assets/images/skills/cse-co.png"
                },

            ]
        },
        work: {
            web: [
                {
                    titleEN: "Egyptian Saudian Company for UPVC",
                    titleAR: "الشركة المصرية السعودية لزجاج وأبواب الـUPVC",
                    href: "https://windowspvc.com",
                    img: "/storage/assets/images/projects/web-windowspvc.jpg"
                },
                {
                    titleEN: "Thanawya Helwa Team",
                    titleAR: "فريق ثانوية حلوة",
                    href: "https://thanawyahelwa.org",
                    img: "/storage/assets/images/projects/web-thanawyahelwa.jpg"
                },
                {
                    titleEN: "Al Madinah Al Munawarah Development Authority",
                    titleAR: "الهيئة العامة لتطوير المدينة المنورة",
                    href: "https://madinah.agecs-eg.com",
                    img: "/storage/assets/images/projects/web-madinah.jpg"
                }
            ],
            csharp: [
                {
                    title: "Memory Allocator",
                    img: "/storage/assets/images/projects/csharp-memoryAllocator.jpg",
                },
                {
                    title: "CPU Scheduler",
                    img: "/storage/assets/images/projects/csharp-cpuScheduler.jpg",
                },
                {
                    title: "Steel Sections Selector",
                    img: "/storage/assets/images/projects/csharp-sectionLibrary.jpg",
                }
            ]
        }
    },
    watch: {
        isTabletOrSmaller(val) {
            if (val) {
                this.titleOnSide = false;
            } else {
                this.titleOnSide = true;
            }
        }
    },
    methods: {
        titlesShown(e) {
            if (e.percentInView < 0.1 && e.percentTop < 0.2)
            {
                //Titles out of view .. Create & show the sidebar if we are not on a tablet or smaller
                if (!this.isTabletOrSmaller)
                {
                    this.titleOnSide = true;
                }
            } else
            {
                //Titles in view .. return to the normal list style
                this.titleOnSide = false;
            }
        },
        openLink(link) {
            window.open(link, '_blank');
        }
    },
};