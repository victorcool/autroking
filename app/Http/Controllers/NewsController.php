<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    
    public function index()
    {
        $current_page = GuestsController::current_page();
        $title = $current_page;
        $posts = Blog::wherePublished(1)->orderBy('created_at','desc')->get();
        foreach ($posts as  $data) {
			$data->body = strip_tags(html_entity_decode($data->body));
		}
        $categories = $this->category(); 
        $archives = $this->post_archive(); 
        return view('pages.news.index',compact('title','posts','current_page','archives','categories'));
    }

    private $model = 'App\Models\Blog';

    public function show(Request $request)
    {
        $current_page = GuestsController::current_page();
        $title = $current_page;
        $post_to_read = getSlugDetail($this->model,$request->slug);
        $posts = Blog::wherePublished(1)->orderBy('created_at','desc')->get();  
        $archives = $this->post_archive(); 
        $categories = $this->category();   
        return view('pages.news.show',compact('title','posts','current_page','post_to_read','archives','categories'));
    }

    public static function post_archive()
    {
        $archive = DB::table('blogs')->groupBy([DB::raw("MONTH(created_at)"), DB::raw("YEAR(created_at)")])
        ->get();
        return $archive;
    }

    public function category(){
        return BlogCategory::orderBy('name','desc')->get();
    }
}
