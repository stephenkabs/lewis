<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Hero;
use App\Models\Article;
use App\Models\Feature;
use App\Models\Core;

use App\Models\Setting;
use App\Models\Overview;
use App\Models\Solution;
use App\Models\Menu;
use App\Models\Background;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Quick;
use App\Models\Service;
use App\Models\Testimony;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        // Fetch heroes data
        $heroes = Hero::all();
        $solution = Solution::all();
        $overview = Overview::all();
        $background = Background::all();
        $menu = Menu::all();
        $service = Service::all();
                $feature = Feature::all();
                $core = Core::all();
                $offer = \App\Models\Offer::all();

        // Fetch two different sets of settings
        $generalSettings = Setting::where('status', 'Published')->get();
        $displaySettings = Setting::where('status', 'Published')->get();
        $article = Article::all();





        return view('welcome', compact('generalSettings','heroes','solution','overview','background','menu','service','core','offer','displaySettings','feature','article'));
    }


        public function services()

    {
        // Fetch heroes data
        $heroes = Hero::all();
        $solution = Solution::all();
        $overview = Overview::all();
        $background = Background::all();
        $menu = Menu::all();
        $service = Service::all();
                $feature = Feature::all();
                $core = Core::all();
                $offer = \App\Models\Offer::all();

        // Fetch two different sets of settings
        $generalSettings = Setting::where('status', 'Published')->get();
        $displaySettings = Setting::where('status', 'Published')->get();






        return view('our_services', compact('generalSettings','heroes','solution','overview','background','menu','service','core','offer','displaySettings','feature'));
    }


            public function contact()

    {
        // Fetch heroes data
        $heroes = Hero::all();
        $solution = Solution::all();
        $overview = Overview::all();
        $background = Background::all();
        $menu = Menu::all();
        $service = Service::all();
                $feature = Feature::all();
                $core = Core::all();
                $offer = \App\Models\Offer::all();

        // Fetch two different sets of settings
        $generalSettings = Setting::where('status', 'Published')->get();
        $displaySettings = Setting::where('status', 'Published')->get();






        return view('contact-us', compact('generalSettings','heroes','solution','overview','background','menu','service','core','offer','displaySettings','feature'));
    }


    public function attendance()

    {
        return view('attendance_register');
    }


         public function publications()

    {
        // Fetch heroes data
        $heroes = Hero::all();
        $solution = Solution::all();
        $overview = Overview::all();
        $background = Background::all();
        $menu = Menu::all();
        $service = Service::all();
        $article = Article::all();
                $feature = Feature::all();
                $core = Core::all();
                $offer = \App\Models\Offer::all();

        // Fetch two different sets of settings
        $generalSettings = Setting::where('status', 'Published')->get();
        $displaySettings = Setting::where('status', 'Published')->get();






        return view('my_publications', compact('generalSettings','heroes','solution','overview','background','menu','service','core','offer','displaySettings','feature','article'));
    }

             public function book_store()

    {
        // Fetch heroes data
        $heroes = Hero::all();
        $solution = Solution::all();
        $overview = Overview::all();
        $background = Background::all();
        $menu = Menu::all();
        $service = Service::all();
        $article = Article::all();
                $feature = Feature::all();
                $core = Core::all();
                $offer = \App\Models\Offer::all();

        // Fetch two different sets of settings
        $generalSettings = Setting::where('status', 'Published')->get();
        $displaySettings = Setting::where('status', 'Published')->get();






        return view('book_store', compact('generalSettings','heroes','solution','overview','background','menu','service','core','offer','displaySettings','feature','article'));
    }




}
