<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileResolver;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutContent;
use App\Models\Image;
use App\Models\OfficePosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    private static $classInstance;

    private $AboutContentModel = 'App\Models\AboutContent';

    protected $response = [
        'status' => '',
        'message' => '',
        'data' => []
    ];

    public function index()
    {
        $title = 'About SUFC';
        $abouts = AboutContent::orderBy('created_at','desc','')->get();        
        return view('admin.about.index',compact('title','abouts'));
    }

    public function create(Request $request)
    {
        $title = 'Create About';
        $id = $request->id??'';
        $contentId = $request->contentId??'';
        
        $categories = About::orderBy('created_at','asc')->get();
        $positions = OfficePosition::orderBy('created_at','asc')->get();
        $toEdit = About::find($id);
        $contentToEdit = AboutContent::find($contentId);
        // dd($contentToEdit->images);
        return view('admin.about.create',compact('title','categories','id','toEdit','positions','contentToEdit'));
    }

    public function store(Request $request)
    {
        if ($request->title == '') {
            $rules = [
                'name'=> 'required',                
            ]; 
        } else {
            $rules = [                           
                'body'=> 'required',               
            ]; 
        }               

        $name = $request['name'];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) 
        {
            $this->response['status'] = 'error';
            $this->response['message'] = 'Make sure you fill the neccessary input fields';
        }          
        else 
        {     
            
            // return generateUniqueSlug($this->model,$name);
            $load= [
                'admin_id' => userID(),
                'name' => $name,
                'title' => $request['title'],
                'body' => $request['body'],
                'published' => '1',
            ];         
                try {
                    About::updateOrCreate(['id'=>$request->id??null],$load);
                    $this->response['status'] = 'success';
                    $this->response['message'] = 'Action Was successful';
                }
                catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = 'Sorry, operation could not be completed.'.$th->getMessage();
                    
                }
        }
        return redirect(route('admin.about.create'))->with($this->response['status'],$this->response['message']); 
    }

    public function content_store(Request $request)
    {
        
            $rules = [
                'name'=> 'required',                
            ];

        $name = $request['name'];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) 
        {
            $this->response['status'] = 'error';
            $this->response['message'] = 'Make sure you fill the neccessary input fields';
            return Redirect()->back()->withErrors($validator);
        }          
        else 
        {     
            
            
            // return generateUniqueSlug($this->model,$name);
            $load= [
                'admin_id' => userID(),
                'name' => $name,
                'title' => $request['title'],
                'body' => $request['body'],
                'about_id' => $request['category'],
                'office_position_id' => $request['position'],
                'dob' => $request['dob'],
                'date_joined_club' => $request['date_joined_club'],
                'published' => '1',
            ];         
                try {
                    AboutContent::updateOrCreate(['id'=>$request->contentToEditId??null],$load);
                    $this->response['status'] = 'success';
                    $this->response['message'] = 'Action Was successful';
                }
                catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = 'Sorry, operation could not be completed.'.$th->getMessage();
                    
                }
        }
        return redirect()->back()->with($this->response['status'],$this->response['message']); 
    }

    public function action(Request $request)
    {
        $action_to_perform = $request->a;
        $id = $request->id;
        switch ($action_to_perform) {
            case 'publish':
                try {
                    About::whereId($id)->update(['published'=>'1']);
                    return redirect()->back()->with('success','About successfully Published');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'unpublish':
                try {
                    About::whereId($id)->update(['published'=>'0']);
                    return redirect()->back()->with('success','About successfully Unpublished');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'players-list':
                $button = ['link'=>route('admin.player.create'),'name'=>'Add player','icon'=>'fa fa-plus'];
                $content = $action_to_perform;
                $title = About::find($id)->name;
                return view('admin.About.show',compact('title','content','button'));
                break;
            
            default:
                    try {
                        About::whereId($id)->forceDelete();
                        return redirect(route('admin.about.create'))->with('success','Action was successful');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                break;
        }
    }

    public function content_action(Request $request)
    {
        $action_to_perform = $request->a;
        $id = $request->id;
        switch ($action_to_perform) {
            case 'publish':
                try {
                    AboutContent::whereId($id)->update(['published'=>'1']);
                    return redirect()->back()->with('success','About successfully Published');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'unpublish':
                try {
                    AboutContent::whereId($id)->update(['published'=>'0']);
                    return redirect()->back()->with('success','About successfully Unpublished');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'players-list':
                $button = ['link'=>route('admin.player.create'),'name'=>'Add player','icon'=>'fa fa-plus'];
                $content = $action_to_perform;
                $title = AboutContent::find($id)->name;
                return view('admin.About.show',compact('title','content','button'));
                break;
            
            default:
                    try {
                        
                        $content = AboutContent::whereId($id)->first();
                        $content->forceDelete();
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

        $img = Image::where(['imageable_id'=>$request->id,'imageable_type'=>$this->AboutContentModel])->first();
        $prevFile = $img->path??'';
        $images = $request->file()['images']??null;
        // return $images;
        // return get_class($this->AboutContentModel::find($request->id));
        if(!empty($images))
        {
            // $model = $this->AboutContentModel::find($request->id);
            $model = $this->AboutContentModel::find($request->id);
            // return get_class($model);
            FileResolver::getInstance()->saveImage($img->id??'',300,null,$images, $request->id, $model,$prevFile,'about'); 

            return back()->with('success','image updated successfully');
        }
    }




}
