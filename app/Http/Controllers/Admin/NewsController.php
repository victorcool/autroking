<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileResolver;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    private $model  = 'App\Models\Blog';
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    protected $response = [
        'status' => '',
        'message' => '',
        'data' => []
    ];

    public function index()
    {
        $title = 'News';
        $lists = Blog::orderBy('created_at','desc')->get();
        foreach ($lists as  $list) {
            $list->title = stringLenght($list->title,50);
        }
        return view('admin.news.index',compact('title','lists'));
    }

    public function create(Request $request)
    {
        $id = $request->id??'';        
        $toEdit = Blog::find($id);
        $title = $id?'Update news':'Create news';
        $categories = BlogCategory::orderBy('name','desc')->get();

        return view('admin.news.create',compact('title','categories','toEdit'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title'=> 'required',               
            'category'=> 'required',              
            'body'=> 'required',               
        ];        
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) {
            return redirect()->back()->with('error','Make sure you fill the neccessary input fields');
        }          
        else 
        {     
            $load= [
                'admin_id' => userID(),
                'title' => $request['title'],
                'body' => $request['body'],
                'blog_category_id' => $request['category'],
            ];         
                try {
                    Blog::updateOrCreate(['id'=>$request->id??null],$load);
                    $this->response['status'] = 'success'; 
                    $this->response['message'] = 'News added successfuly'; 
                    
                }
                catch (\Throwable $th) {
                    $this->response['status'] = 'error'; 
                    $this->response['message'] = 'Sorry, operation could not be completed.'.$th->getMessage(); 
                }            
            return redirect()->back()->with( $this->response['status'], $this->response['message']); 
        } 
    }

    public function action(Request $request)
    {
        $action_to_perform = $request->a;
        $id = $request->id;
        switch ($action_to_perform) {
            case 'publish':
                try {
                    Blog::whereId($id)->update(['published'=>'1']);
                    return redirect()->back()->with('success','Blog successfully Published');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'unpublish':
                try {
                    Blog::whereId($id)->update(['published'=>'0']);
                    return redirect()->back()->with('success','Blog successfully Unpublished');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'players-list':
                $button = ['link'=>route('admin.player.create'),'name'=>'Add player','icon'=>'fa fa-plus'];
                $content = $action_to_perform;
                $title = Blog::find($id)->name;
                return view('admin.blog.show',compact('title','content','button'));
                break;
            
            default:
                    try {
                        $blog = Blog::whereId($id)->first();
                        $blog->forceDelete();
                        return redirect()->back()->with('success','Action was successful');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                break;
        }
    }

    public function update_image(Request $request)
    {
        $rules = [
            'images'=> 'required|max:2048',             
        ];        

        $title = $request['title'];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }  

        $img = Image::where(['imageable_id'=>$request->id,'imageable_type'=>$this->model])->first();
        $prevFile = $img->path??'';
        $images = $request->file()['images']??null;
        // return $images;
        // return get_class($this->BlogContentModel::find($request->id));
        if(!empty($images))
        {
            
            $model = $this->model::find($request->id);
            // return get_class($model);
            FileResolver::getInstance()->saveImage($img->id??'',500,515,$images, $request->id, $model,$prevFile,'blog_img'); 

            return back()->with('success','image updated successfully');
        }
    }

    public static function update_with_facebook_latest_feed(Request $request){
        // dd(facebook_latest_feed($request->pageId));
       return facebook_latest_feed($request->pageId);

    }
}
