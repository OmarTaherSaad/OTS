<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\ContactForAdminMail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use stdClass;

class MainController extends Controller
{
    public function index()
    {
        $services = [
            [
                'title' => 'Software Engineering',
                'icon' => 'fas fa-cogs',
                'desc' => 'I can code in C, C++, C# and Python. I used many technologies like .NET Core, MVC Design
                            Pattern, LINQ, relational DBs in SQLite and MySQL. I studied data structures and
                            algorithms, also I studied logic circuits and computer organization.',
            ],
            [
                'title' => 'Web Development',
                'icon' => 'fas fa-laptop-code',
                'desc' => 'I can build websites from scratch to fullfil your requirements, wether it is a portfolio website, E-commerce with online payment and notifications, or anything you ever need. I use PHP Laravel, Sass, Vue.js, and sometimes I use WordPress and WooCommerce.',
            ],
            [
                'title' => 'Payment Gateway Integrations',
                'icon' => 'fas fa-money-check-alt',
                'desc' => 'I can integrate any payment gateway to your existing website, I dealt with PayPal, Stripe,
                            Fawry, Paymob, Fawaterak, and much more!',
            ],
            [
                'title' => 'WordPress Custom Plugins',
                'icon' => 'fab fa-wordpress',
                'desc' => 'I can develop custom WordPress plugins for almost anything! I can make custom payment
                            gateways integrations, custom stylings and more.',
            ],

        ];
        $projects = [
            [
                "img" => Storage::url('assets/images/projects/web-windowspvc.jpg'),
                "img_progressive" => Storage::url('assets/images/projects/Progressive-web-windowspvc.jpg'),
                "title" => "Egyptian Saudian Company for UPVC",
                "category" => "Web Development",
                "link" => "https://windowspvc.com",
            ],
            [
                "img" => Storage::url('assets/images/projects/web-agecs.jpg'),
                "img_progressive" => Storage::url('assets/images/projects/Progressive-web-agecs.jpg'),
                "title" => "AGECS - Software Company",
                "category" => "Web Development",
                "link" => "https://solutions.agecs-eg.com",
            ],
            [
                "img" => Storage::url('assets/images/projects/csharp-sectionLibrary.jpg'),
                "img_progressive" => Storage::url('assets/images/projects/Progressive-csharp-sectionLibrary.jpg'),
                "title" => "Steel Sections Selector for Civil Engineers",
                "category" => "Software Engineering",
            ],
            [
                "img" => Storage::url('assets/images/projects/csharp-memoryAllocator.jpg'),
                "img_progressive" => Storage::url('assets/images/projects/Progressive-csharp-memoryAllocator.jpg'),
                "title" => "Memory Allocator",
                "category" => "Software Engineering",
                "link" => "https://github.com/OmarTaherSaad/MemoryAllocator",
            ],
            // [
            //     "img" => ,
            //     "img_progressive" => ,
            //     "title" => "",
            //     "category" => "",
            //     "link" => "",
            // ],
            [
                "img" => Storage::url('assets/images/projects/web-thanawyahelwa.jpg'),
                "img_progressive" => Storage::url('assets/images/projects/Progressive-web-thanawyahelwa.jpg'),
                "title" => "Thanawya Helwa Team",
                "category" => "Web Development",
                "link" => "https://thanawyahelwa.org",
            ],
        ];
        return view('home', [
            'services' => $services,
            'projects' => $projects,
        ]);
    }

    public function about()
    {
        return view('about');
    }
    public function contactForm()
    {
        return view('');
    }
    public function youtube()
    {
        //Until a custom page is developed
        redirect()->to("https://www.youtube.com/OmarTaherSaadChannel");
        return view('');
    }
    public function projects()
    {
        return view('');
    }

    public function langChange(String $locale)
    {
        session()->put('applocale', $locale);
        session()->forget('chaptersLocale');
        return redirect()->back();
    }

    public function contact()
    {
        return view('contact');
    }

    public function media()
    {
        $Items = new Collection();
        $ItemsTV = [
            //Poster image is named after the index here (0,1,2...etc)
            'https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FThanawya.Helwa%2Fvideos%2F2436876689719750%2F&show_text=0&mute=0' => ['MBC Masr 2 | برنامج صباحك مصري', 'MBC Masr 2 | "Your morning is Egyptian" program'],
            'https://www.youtube-nocookie.com/embed/fIGlQIav_g0' => ['القناة التعليمية الأولى | برنامج السفير الصغير', 'Egyptian TV - Educational Channel | "The Little Ambassador" program'],
            'https://www.youtube-nocookie.com/embed/4S1Uvj-WAt8' => ['القناة الثانية (الفضائية) | برنامج مصر الجميلة', 'Egyptian TV - Channel 2 | "Beautiful Egypt" program'],
            'https://www.youtube-nocookie.com/embed/4tQxvWrDrXY' => ['شفاف (فيديو)', 'Shaffaf (Video)'],
            'https://www.youtube-nocookie.com/embed/cQiQf4cI_3U' => ['الدستور (فيديو)', 'Dostoor (Video)'],
            'https://www.youtube-nocookie.com/embed/-t7pP5qMb84' => ['راديو DRN 93.7FM | برنامج مصر من البلكونة', 'DRN 93.7FM | "Egypt from Balcony" program'],
        ];
        foreach ($ItemsTV as $link => $names) {
            $item = new stdClass();
            $item->nameAR = $names[0];
            $item->nameEN = $names[1];
            $item->link = $link;
            //$item->type = __("TV & Videos");
            $item->typeCode = 'tv';
            $Items->push($item);
        }
        $ItemsNews = [
            //Name => Link
            'https://www.elbalad.news/3329554' => ['صدى البلد', 'Sada El Balad'],
            'http://masralarabia.com/%D8%A7%D9%84%D8%AD%D9%8A%D8%A7%D8%A9-%D8%A7%D9%84%D8%B3%D9%8A%D8%A7%D8%B3%D9%8A%D8%A9/1478055-%D8%AF-%D8%B1%D9%88%D8%B3-%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%88%D9%8A%D8%A9--%D8%A8%D9%80--%D8%A7%D9%84%D9%85%D8%AC%D8%A7%D9%86----%D9%88%D9%84%D8%A7-%D8%B9%D8%B2%D8%A7%D8%A1-%D9%84%D9%84%D9%80--%D9%85%D8%B3%D8%AA%D8%BA%D9%84%D9%8A%D9%86' => ['مصر العربية', 'Misr ElArabia'],
            'http://shafaff.com/article/76148' => ['شفاف', 'Shaffaf'],
            'https://elwatannews.com/news/details/3412243' => ['الوطن', 'El Watan'],
            'https://dostor.org/2200772' => ['الدستور', 'Al Dostor'],
            'https://arabicpost.net/variety/2018/06/04/%D8%AB%D8%A7%D9%86%D9%88%D9%8A%D8%A9-%D8%AD%D9%84%D9%88%D8%A9-%D9%88%D8%AF%D8%A7%D8%B9%D8%A7%D9%8B-%D9%84%D9%85%D8%B5%D8%A7%D8%B1%D9%8A%D9%81-%D8%A7%D9%84%D8%AF%D8%B1%D9%88%D8%B3-%D8%A7%D9%84/' => ['عربي بوست', 'Arabic Post'],
            'https://masrawy.com/howa_w_hya/relationship/details/2018/6/4/1369848/بعد-وصول-ثمنها-لـ400-جنيه-ا-شاب-مصري-يعطي-مراجعات-مجانية-لطلاب-الثانوية' => ['مصراوي', 'Masrawy'],
            'https://shbabbek.com/show/125076' => ['شبابيك', 'Shababeek'],
            'https://www.masrawy.com/news/news_various/details/2019/6/18/1586588/' => ['مصراوي (خبر آخر)', 'Masrawy (Another news release)']
        ];
        foreach ($ItemsNews as $link => $names) {
            $item = new stdClass();
            $item->nameAR = $names[0];
            $item->nameEN = $names[1];
            $item->link = $link;
            //$item->type = __("Paper & Digital Newspapers");
            $item->typeCode = 'written';
            $Items->push($item);
        }
        return view('media')->with(compact('Items'));
    }

    public function SubmitContact(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|recaptcha:login,0.7',
            "name" => "required|string|between:2,100",
            "phone" => "required|numeric",
            "email" => "required|email",
            "subject" => "required|min:5",
            "message" => "required|min:10,1000"
        ]);

        //Send Mail to Admin
        Mail::to("ots.for.work@gmail.com")->queue(new ContactForAdminMail($request->input('name'), $request->input('email'), $request->input('phone'), $request->input('subject'), $request->input('message')));
        //Send Mail to the user himself/herself
        Mail::to($request->input('email'))->queue(new ContactMail($request->input('name'), $request->input('message')));
        //Flash a message to user
        $request->session()->flash('success', __("Your words is being delivered now to OTS! Thank you .. we will keep in touch"));
        return back();
    }

    public function physicsTutorialForm()
    {
        return view();
    }

    public function course_registration()
    {
        return view("programming-course-registration");
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }
}
