<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    private $model = 'App\Models\Club';

    public function index(Request $request)
    {
        $title = 'Create category';
        $toEdit = '';
        $categories=Club::all();
        if($request->id)
            $toEdit = Club::find($request->id);
        return view('admin.club.index', compact('title','toEdit','categories'));
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $load = [
            'name'=>$name,
            'president'=>$request->president??null,
            'coach'=>$request->coach??null,
            'assistant_coach'=>$request->assistant_coach??null,
            'location'=>$request->location??null,
            'established_in'=>$request->established_in??null,
            'location'=>$request->location??null,
            'no_of_players'=>$request->no_of_players??null,
            'champions'=>$request->champions??null,
            'pitch'=>$request->pitch??null,
            'slug'=>generateUniqueSlug($this->model,$name)];
        try {
            Club::updateOrCreate(['id'=> $request->id??''],$load);
            if($request->id){
                return redirect(route('admin.club.index'))->with('success','Update was successful');
            }else{
                return redirect()->back()->with('success','Category added successful');
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
        } 
    }

    public function action(Request $request)
    {
            $action_to_perform = $request->a;
            $id = $request->id;
            switch ($action_to_perform) {
                case 'publish':
                    try {
                        Club::whereId($id)->update(['published'=>'1']);
                        return redirect()->back()->with('success','Position successfully Published');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                    break;
                case 'unpublish':
                    try {
                        Club::whereId($id)->update(['published'=>'0']);
                        return redirect()->back()->with('success','Position successfully Unpublished');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                    break;
                
                default:
                        try {
                           $club = Club::whereId($id)->first();
                           $club->forceDelete();
                            return redirect(route('admin.club.index'))->with('success','Action was successful');
                        } catch (\Throwable $th) {
                            return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                        }
                    break;
            }
    }
}
