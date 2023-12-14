<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $title  = 'Dashboard';
        $lists = Blog::orderBy('created_at','desc')->get();
        return view('admin.index',compact('title','lists'));
    }
}
