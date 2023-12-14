<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TeamCategory;
use Illuminate\Http\Request;

class TeamCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    private $model = 'App\Models\TeamCategory';

    public function index()
    {
        return view('admin.team.category.index')
        ->with([
            'title'=>'Category List',
            'categories'=>TeamCategory::all()
        ]);
    }

    public function create(Request $request)
    {
        $title = 'Create category';
        $toEdit = '';
        $categories=TeamCategory::all();
        if($request->id)
            $toEdit = TeamCategory::find($request->id);
        return view('admin.team.category.create', compact('title','toEdit','categories'));
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $load = ['name'=>$name,'slug'=>generateUniqueSlug($this->model,$name)];
        try {
            TeamCategory::updateOrCreate(['id'=> $request->id??''],$load);
            if($request->id){
                return redirect(route('admin.teamCateg.create'))->with('success','Update was successful');
            }else{
                return redirect()->back()->with('success','Category added successful');
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
        } 
    }

    public function remove($id)
    {
        try {
            TeamCategory::whereId($id)->forceDelete();
            return redirect()->back()->with('success','Category successfully removed');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
        }
       
    }
}
