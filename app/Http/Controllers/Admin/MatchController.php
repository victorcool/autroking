<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Fixture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $type = $request->type;
        $id = $request->id??'';
        $toEdit = '';
        $title  = 'Match';
        $teams = Club::orderBy('name')->get();
        $fixtures = Fixture::all();
        switch ($type) {
            case 'fixtures':
                if ($id != '') {
                    $toEdit = Fixture::find($id);
                }                
                return view('admin.match.fixtures',compact('title','type','teams','fixtures','toEdit'));
                break;
            case 'results':
                return view('admin.match.results',compact('title','type','teams'));
                break;
            
            default:
                return view('admin.match.table',compact('title','type'));
                break;
        }
        
    }

    public function store(Request $request)
    {
             
           
            $payload= [
                'admin_id' => userID(),
                'home_team' => $request['home_team']??null,
                'away_team' => $request['away_team']??null,
                'home_score' => $request['home_score']??null,
                'away_score' => $request['away_score']??null,
                'match_date' => $request['match_date']??null,
            ];         
                try {
                    Fixture::updateOrCreate(['id'=>$request->id??null],$payload); 
                    return redirect()->back()->with('success','Image added successfuly');
                }
                catch (\Throwable $th) {
                    return redirect()->back()->with('error','Sorry, operation could not be completed.'.$th->getMessage());
                }            
            // return back()->with( $this->response['status'], $this->response['message']); 
        
    }
}
