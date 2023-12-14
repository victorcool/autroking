<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\PositionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
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

    public function index(Request $request)
    {
        $title = 'Ball position';
        $id = $request->id??'';
        $pid = $request->pid??'0';
        $toEdit = PositionCategory::find($id);
        $ptoEdit = Position::find($pid);
        $categories = PositionCategory::orderBy('created_at','desc')->get();
        $positions = Position::orderBy('created_at','desc')->get();
        return view('admin.ball_position',compact('title','categories','toEdit','ptoEdit','id','pid','positions'));
    }

    public function store_position_category(Request $request)
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
                'published' => '1',
            ];         
                try {
                    PositionCategory::updateOrCreate(['id'=>$request->id??null],$load);
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
                'position_category_id' => $request['category'],
                'published' => '1',
            ];         
                try {
                    Position::updateOrCreate(['id'=>$request->id??null],$load);
                    $this->response['status'] = 'success';
                    $this->response['message'] = 'Action Was successful';
                }
                catch (\Throwable $th) {
                    $this->response['status'] = 'error';
                    $this->response['message'] = 'Sorry, operation could not be completed.'.$th->getMessage();
                    
                }
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
                    Position::whereId($id)->update(['published'=>'1']);
                    return redirect()->back()->with('success','PositionCategory successfully Published');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'unpublish':
                try {
                    Position::whereId($id)->update(['published'=>'0']);
                    return redirect()->back()->with('success','PositionCategory successfully Unpublished');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            
            default:
                    try {
                        Position::whereId($id)->forceDelete();
                        return redirect(route('admin.ballposition.index'))->with('success','Action was successful');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                break;
        }
    }

    public function position_category_action(Request $request)
    {
        $action_to_perform = $request->a;
        $id = $request->id;
        switch ($action_to_perform) {
            case 'publish':
                try {
                    PositionCategory::whereId($id)->update(['published'=>'1']);
                    return redirect()->back()->with('success','PositionCategory successfully Published');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            case 'unpublish':
                try {
                    PositionCategory::whereId($id)->update(['published'=>'0']);
                    return redirect()->back()->with('success','PositionCategory successfully Unpublished');
                } catch (\Throwable $th) {
                    return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                }
                break;
            
            default:
                    try {
                        PositionCategory::whereId($id)->forceDelete();
                        return redirect(route('admin.ballposition.index'))->with('success','Action was successful');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                break;
        }
    }

    public function load_position_options_for_category(Request $request){
        $output = '';
        $output .='<option hidden>Select</option>';
        $positions = Position::where('position_category_id',$request->position_category_id)->orderBy('id','desc')->get();
        foreach ($positions as $position) {
            $output .= '<option value='.$position->id.'>'.$position->name.'</option>';
        }
        echo $output;
    }
}
