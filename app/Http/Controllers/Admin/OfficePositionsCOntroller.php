<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficePosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfficePositionsCOntroller extends Controller
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
            $title = 'Office position';
            $id = $request->id??'';
            $toEdit = OfficePosition::find($id);
            $positions = OfficePosition::orderBy('created_at','desc')->get();
            return view('admin.office_position',compact('title','toEdit','id','positions'));
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
                    'published' => '1',
                ];         
                    try {
                        OfficePosition::updateOrCreate(['id'=>$request->id??null],$load);
                        $this->response['status'] = 'success';
                        $this->response['message'] = 'Action Was successful';
                    }
                    catch (\Throwable $th) {
                        $this->response['status'] = 'error';
                        $this->response['message'] = 'Sorry, operation could not be completed.'.$th->getMessage();
                        
                    }
            }
            return redirect(route('admin.officeposition.index'))->with($this->response['status'],$this->response['message']); 
        }

        public function office_position_action(Request $request)
        {
            $action_to_perform = $request->a;
            $id = $request->id;
            switch ($action_to_perform) {
                case 'publish':
                    try {
                        OfficePosition::whereId($id)->update(['published'=>'1']);
                        return redirect()->back()->with('success','Position successfully Published');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                    break;
                case 'unpublish':
                    try {
                        OfficePosition::whereId($id)->update(['published'=>'0']);
                        return redirect()->back()->with('success','Position successfully Unpublished');
                    } catch (\Throwable $th) {
                        return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                    }
                    break;
                
                default:
                        try {
                            OfficePosition::whereId($id)->forceDelete();
                            return redirect(route('admin.officeposition.index'))->with('success','Action was successful');
                        } catch (\Throwable $th) {
                            return redirect()->back()->with('error','Something went wrong:'.$th->getMessage());
                        }
                    break;
            }
        }
}
