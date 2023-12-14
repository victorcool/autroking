<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Fixture;
use App\Models\Gallery;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestsController extends Controller
{
    public function index()
    {
        $title = 'The best football club in Australia';
        $latest_news = Blog::orderBy('created_at','desc')->take(5)->get();
        $galleries = Gallery::orderBy('created_at','desc')->take(6)->get();
        // $history = getSlugId('App\Models\About','history');
        $attr = 'title';
        $search = 'who we are';
        $siteSetting = SiteSettings();
        $cont  = where_search('App\Models\Content',$attr,$search);
        $content = [
            'whoweare'=>[
                'title' =>$cont->title??'',
                'body' =>$cont->body??'',
            ]
            ];
        return view('welcome',compact('title','latest_news','galleries','content','siteSetting'));
    }
    
    public function about(Request $request)
    {
        $type = $request->type; //the page to load content from example history etc.
        $current_page = $this->current_page();
        $title = $current_page;
        $contents = '';
        switch ($type) {
            case 'contact':
                return view('pages.contact',compact('title','current_page'));
                break;
            case 'gallery':
                $galleries = Gallery::orderBy('created_at','desc')->simplePaginate(10);
                return view('pages.gallery',compact('title','current_page','galleries'));
                break;
            case 'join':
                # code...
                break;
            
            default:
                if (($type == 'history') || ($type == 'about')) {
                    $contents = About::whereSlug($type)->with('aboutContent')->first();
                } else {
                    $contents = About::whereSlug($type)->with('aboutContent')->first();
                }                
                 
                return view('pages.about',compact('title','current_page','contents','type'));
                break;
        }
       
    }

    public function contact()
    {
        $current_page = $this->current_page();
        $title = $current_page;
        return view('pages.contact',compact('title','current_page'));
    }

    // Gallery page for displaying clubs activitiesimages
    public function gallery()
    {
        $title = 'Gallery';
        return view('pages.gallery',compact('title'));
    }

    public function news()
    {
        $title = 'News';
        return view('pages.news',compact('title'));
    }

    public function match()
    {
        $current_page = $this->current_page();
        $title = $current_page;
        return view('pages.match.index',compact('title','current_page'));
    }

    public function privacy_policy()
    {
        $title ="Privacy Policy";
        $current_page = $this->current_page();
        $title = $current_page;
        return view('privacy_policy',compact('title','current_page'));
    }

    // Getting the clicked club pages to display on the breadcrumb
    public static function current_page(){
        $url = explode('/',request()->getRequestUri());
        $current_page =  ucwords(end($url));
        $current_page = explode('-',$current_page);
        return $current_page = ucwords(implode(' ',$current_page));
    }


}
