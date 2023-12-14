<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }    

    private $model = 'App\Models\Page';

    protected $response = [
        'status' => '',
        'message' => '',
        'data' => []
    ];

    public function index(Request $request)
    {
        $title = 'Pages';
        $pages = Page::all();
        $contents = Content::orderBy('created_at','desc')->skip(0)->take(100)->get();
        $toEdit = Page::find($request->id);
        $contentToEdit = Content::find($request->content_Id);
        return view('admin.pages.index',compact('title','pages','toEdit','contents','contentToEdit'));
    }

    public function store(Request $request)
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
        }          
        else 
        {     
            $load= [
                'admin_id' => userID(),
                'name' => $name,
                'slug' => generateUniqueSlug($this->model,$name),
                'published' => '1',
            ];         
                try {
                    Page::updateOrCreate(['id'=>$request->id??null],$load);
                    $this->response['status'] = 'success';
                    $this->response['message'] = MessagesController::SUCCESS_MSG;
                }
                catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = 'Sorry, operation could not be completed.'.$th->getMessage();
                    
                }
                return redirect()->back()->with($this->response['status'],$this->response['message']); 
        }
        if($request->id??null)
        {
            return redirect(route('admin.ballposition.index'))->with($this->response['status'],$this->response['message']); 
        }else{
            return redirect()->back()->with($this->response['status'],$this->response['message']); 
        }
        
       
    }
    public function content_store(Request $request)
    {
        $rules = [                           
            'title'=> 'unique:contents|required',               
        ];               

        $title = $request['title'];
       
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) 
        {
            $this->response['status'] = 'error';
            $this->response['message'] = $validator->getMessageBag();
        }          
        else 
        {     
            $page_id =  Content::find($request->contentToEditId)->contentable_id??$request->page_id;
            $pageObj = Page::find($page_id);
            $load=[
                'admin_id' => userID(),
                'title' => $title,
                'slug' => generateUniqueSlug($pageObj,$title),
                'body' => $request->body,
                'contentable_id' => $page_id,
                'contentable_type' => get_class($pageObj),
                'published' => '1',
            ];    
                try {
                    Content::updateOrCreate(['id'=>$request->contentToEditId??null],$load);
                    $this->response['status'] = 'success';
                    $this->response['message'] = MessagesController::SUCCESS_MSG;
                }
                catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = 'Sorry, operation could not be completed.'.$th->getMessage();
                    
                }
                return redirect()->back()->with($this->response['status'],$this->response['message']); 
        }
        if($request->id??null)
        {
            return redirect(route('admin.ballposition.index'))->with($this->response['status'],$this->response['message']); 
        }else{
            return redirect()->back()->with($this->response['status'],$this->response['message']); 
        }
        
       
    }


    public function action(Request $request)
    {
        $action_to_perform = $request->a;
        $id = $request->id;
        switch ($action_to_perform) {
            case 'publish':
                try {
                    Page::whereId($id)->update(['published'=>'1']);
                    $this->response['status'] = 'success';
                    $this->response['message'] = MessagesController::SUCCESS_MSG;
                } catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = MessagesController::ERROR_MSG.$th->getMessage();
                }
                break;
            case 'cont_publish':
                try {
                    Content::whereId($id)->update(['published'=>'1']);
                    $this->response['status'] = 'success';
                    $this->response['message'] = MessagesController::SUCCESS_MSG;
                } catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = MessagesController::ERROR_MSG.$th->getMessage();
                }
                break;
            case 'unpublish':
                try {
                    Page::whereId($id)->update(['published'=>'0']);
                    $this->response['status'] = 'success';
                    $this->response['message'] = MessagesController::SUCCESS_MSG;
                } catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = MessagesController::ERROR_MSG.$th->getMessage();
                }
                break;
            case 'cont_unpublish':
                try {
                    Content::whereId($id)->update(['published'=>'0']);
                    $this->response['status'] = 'success';
                    $this->response['message'] = MessagesController::SUCCESS_MSG;
                } catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = MessagesController::ERROR_MSG.$th->getMessage();
                }
                break;
            case 'cont_remove':
                try {
                    Content::whereId($id)->forceDelete();
                    $this->response['status'] = 'success';
                    $this->response['message'] = MessagesController::SUCCESS_MSG;
                    
                } catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = MessagesController::ERROR_MSG.$th->getMessage();
                }
                break;
            
            default:
                    try {
                        Page::whereId($id)->forceDelete();
                        $this->response['status'] = 'success';
                        $this->response['message'] = MessagesController::SUCCESS_MSG;
                    } catch (\Throwable $th) {
                        $this->response['status'] = 'error';
                        $this->response['message'] = MessagesController::ERROR_MSG.$th->getMessage();
                    }
                break; 
        }
        return redirect(route('admin.content'))->with($this->response['status'],$this->response['message']);
    }
}
