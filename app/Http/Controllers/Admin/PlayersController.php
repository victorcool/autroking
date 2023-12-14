<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Player;
use App\Models\PositionCategory;
use App\Models\TeamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayersController extends Controller
{
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
        $title = 'Players';
        $players = Player::with(['team','teamCategory'])->orderBy('created_at','desc')->get();
        return view('admin.players.index',compact('title','players'));
    }
    public function create(Request $request)
    {
        $id = $request->id??'';  
        $categories = TeamCategory::all();
        $position_categories = PositionCategory::all();
        $toEdit = Player::find($id);
        $title = $id?'Update player':'Create player';
        return view('admin.players.create',compact('title','categories','position_categories','toEdit'));
    }
    
    public function store(Request $request)
    {
        $rules = [
            'name'=> 'required',               
            'dob'=> 'required',               
            'pob'=> 'required',               
            'citizen'=> 'required',               
        ];        

        $name = $request['name'];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()) {
            return redirect()->back()->with('error','Make sure you fill the neccessary input fields');
        }  
                
        else 
        {     
            $payload= [
                'admin_id' => userID(),
                'name' => $name,
                'citizen' => $request['citizen'],
                'team_id' => $request['team'],
                'position_id' => $request['position'],
                'height' => $request['height']??null,
                'weight' => $request['weight']??null,
                'citizenship' => $request['citizen']??null,
                'discipline' => $request['discipline']??null,
                'matches' => $request['matches']??null,
                'goals' => $request['goals']??null,
                'sport_kick' => $request['sport_kick']??null,
                'club_debut' => $request['club_debut']??null,
                'previous_club' => $request['previous_club']??null,
                'present_club' => $request['current_club']??null,
                'position_number' => $request['position_number']??null,
                'description' => $request['description']??null,
                'team_category_id' => $request['category']??null,
                'dob' => $request['dob']??null,
                'pob' => $request['pob']??null,
            ];         
                try {
                    Player::updateOrCreate(['id'=>$request->id??null],$payload); 
                    return redirect()->back()->with('success','Player added successfuly');
                }
                catch (\Throwable $th) {
                    return redirect()->back()->with('error','Sorry, operation could not be completed.'.$th->getMessage());
                }            
            // return back()->with( $this->response['status'], $this->response['message']); 
        } 
    }

    public function update()
    {

    }
    
    public function action(Request $request)
    {
        $action_to_perform = $request->a;
        $id = $request->id;
        switch ($action_to_perform) {
            case 'publish':
                try {
                    Player::whereId($id)->update(['published'=>'1']);
                    $this->response['status'] = 'success';
                    $this->response['message']= 'Team successfully Published';
                    return redirect()->back()->with('success','Player successfully Published');
                } catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = 'Something went wrong:'.$th->getMessage();
                }
                break;
            case 'unpublish':
                try {
                    Player::whereId($id)->update(['published'=>'0']);
                    $this->response['status'] = 'success';
                    $this->response['message'] = 'Player successfully Unpublished';
                } catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = 'Something went wrong:'.$th->getMessage();
                }
                break;
            
            default:
                    try {
                        $player = Player::find($id);
                        $player->forceDelete();
                        $this->response['status'] = 'success';
                        $this->response['message'] = 'Player successfully removed';
                    } catch (\Throwable $th) {
                        $this->response['status']='error';
                        $this->response['message']='Something went wrong:'.$th->getMessage();
                    }
                break;
        }
        return redirect()->back()->with($this->response['status'],$this->response['message']);
    }

}
