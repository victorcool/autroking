<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    private $categModel = 'App\Models\TeamCategory';
    private $model = 'App\Models\Team';

    public function index()
    {
        // return TeamCategory::with('team')->get();
        return view('admin.team.index')
        ->with([
            'title'=>'Team List',
            'lists'=>Team::with('teamCategory')->get()
        ]);
    }

    public function create(Request $request)
    {
        $title = 'Create Team';
        $categories = TeamCategory::all();
        return view('admin.team.create', compact('title','categories'));
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $load = ['name'=>$name,'team_category_id'=>$request->category,'slug'=>generateUniqueSlug($this->categModel,$name)];
        try {
            Team::updateOrCreate(['name'=> strtolower($name)],$load);
            return redirect()->back()->with('success','Category inserted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
        } 
    }

    public function show(Request $request)
    {
       $type = $request->type??'';
       if ($type != '') {
            $slug = $type;
            $id = getSlugDetail($this->categModel,$slug)->id;
            $title = getSlugDetail($this->categModel,$slug)->name;
            $teams = Team::where('team_category_id',$id)->get();
            $content = 'list-team';
            return view('admin.team.show',compact('title','teams','content'));
       }
    }

    public function action(Request $request)
    {
        $action_to_perform = $request->a;
        $id = $request->id;
        switch ($action_to_perform) {
            case 'publish':
                try {
                    Team::whereId($id)->update(['published'=>'1']);
                    return redirect()->back()->with('success','Team successfully Published');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'unpublish':
                try {
                    Team::whereId($id)->update(['published'=>'0']);
                    return redirect()->back()->with('success','Team successfully Unpublished');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'players-list':
                $button = ['link'=>route('admin.player.create'),'name'=>'Add player','icon'=>'fa fa-plus'];
                $content = $action_to_perform;
                $title = Team::find($id)->name;
                return view('admin.team.show',compact('title','content','button'));
                break;
            
            default:
                    try {
                        Team::whereId($id)->forceDelete();
                        return redirect()->back()->with('success','Team successfully removed');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                break;
        }
    }

    public function load_team_options_for_category(Request $request){
        $output = '';
        $output .='<option hidden>Select</option>';
        $teams = Team::where('team_category_id',$request->team_category_id)->orderBy('id','desc')->get();
        foreach ($teams as $team) {
            $output .= '<option value='.$team->id.'>'.$team->name.'</option>';
        }
        echo $output;
    }
    
}
