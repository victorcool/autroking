<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $model = 'App\Models\Team';

    public function index(Request $request)
    {
        $slug = $request->type;
        $title = 'team | '.$slug;
        $current_page = GuestsController::current_page();
        $id = getSlugId($this->model,$slug); //get id of the team in order to use it to fetch the players
        $players = Player::where('team_id',$id)->orderBy('created_at','desc')->get();
        return view('pages.team.index',compact('title','current_page','players'));
    }

    public function show_player(Request $request){
        $title = str_implode(str_explode('-',$request->slug),' ');
        $current_page = GuestsController::current_page();
        $player = Player::whereSlug($request->slug)->first();
        return view('pages.team.show',compact('title','current_page','player'));
    }
}
