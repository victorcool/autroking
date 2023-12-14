<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $title = 'Gallery';
        // $galleries = DB::table('galleries')->simplePaginate(20);
        $galleries = Gallery::orderBy('created_at','desc')->paginate(200);
        return view('admin.gallery.index',compact('title','galleries'));
    }

    public function create()
    {
        $title = 'Create gallery';
        return view('admin.gallery.create',compact('title'));
    }

    public function store(Request $request)
    {
        $rules = [              
            'images'=> 'required',               
        ];        
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) {
            return redirect()->back()->with('error','Make sure you fill the neccessary input fields');
        }          
        else 
        {     
            $payload= [
                'admin_id' => userID(),
                'caption' => $request['caption'],
            ];         
                try {
                    Gallery::updateOrCreate(['id'=>$request->id??null],$payload); 
                    return redirect()->back()->with('success','Image added successfuly');
                }
                catch (\Throwable $th) {
                    return redirect()->back()->with('error','Sorry, operation could not be completed.'.$th->getMessage());
                }            
            // return back()->with( $this->response['status'], $this->response['message']); 
        } 
    }

    public function action(Request $request)
    {
            $action_to_perform = $request->a;
            $id = $request->id;
            switch ($action_to_perform) {
                case 'publish':
                    try {
                        Gallery::whereId($id)->update(['published'=>'1']);
                        return redirect()->back()->with('success','Position successfully Published');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                    break;
                case 'unpublish':
                    try {
                        Gallery::whereId($id)->update(['published'=>'0']);
                        return redirect()->back()->with('success','Position successfully Unpublished');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                    break;
                
                default:
                        try {
                           $gallery = Gallery::whereId($id)->first();
                           $gallery->forceDelete();
                            return redirect(route('admin.gallery.index'))->with('success','Action was successful');
                        } catch (\Throwable $th) {
                            return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                        }
                    break;
            }
    }
}
