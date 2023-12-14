<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    private static $classInstance;

    private $model = 'App\Models\BlogCategory';
    protected $response = [
        'status' => '',
        'message' => '',
        'data' => []
    ];

    public static function getInstance()
    {    
        if (self::$classInstance == null) 
        {
            self::$classInstance = new self();
        }
        return self::$classInstance;
    }

    public function create(Request $request)
    {
        $title = 'Blog Category';
        $categories = BlogCategory::orderBy('created_at','desc')->get();
        return view('admin.news.category.create', compact('title','categories'));
    }


    public function store(Request $request)
    {             
        try 
        {
            $name = $request->name;
            $load = ['name'=>$name,'slug'=>generateUniqueSlug($this->model,$name),'published'=>1];
            BlogCategory::updateOrCreate(['name'=> strtolower($name)],$load);   
            $this->response['status'] = 'success';
            $this->response['message'] = 'Action was successful';
            
        }
        catch (\Throwable $th) {
            $this->response['status'] = 'error';
            $this->response['message'] = 'Sorry, operation could not be completed.'.$th->getMessage();
        }
        return  redirect()->back()->with($this->response['status'], $this->response['message']);
    }
}
