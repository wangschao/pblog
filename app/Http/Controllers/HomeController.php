<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserMsg;
use App\Article;

class HomeController extends Controller
{
	public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    { 
    	$contents = Article::orderBy('created_at','desc')->paginate(10);
    	$data = UserMsg::where('user_id',Auth::id())->first();

    	return view('home.index',compact('data','contents'));
    }
}
