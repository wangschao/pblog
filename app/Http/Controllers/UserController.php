<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserMsg;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = 'active';
        $data = UserMsg::where('user_id',Auth::id())->first();
        return view('user.index',compact('module','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = UserMsg::where('user_id',Auth::id())->first();
        return view('user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'string|max:255',
            'image' => 'required|image',
            'content' => 'required',
            ]);
        $image = $request->file('image');
        $image_name = str_random(40).'.jpeg';
        if(Storage::files('public/avatar/'.Auth::id()))
        {
            Storage::deleteDirectory('public/avatar/'.Auth::id());
        }
        $path = Storage::putFileAS('public/avatar/'.Auth::id(),$image,$image_name);
        $url = asset('storage/avatar/'.Auth::id().'/'.$image_name);
        if(UserMsg::where('user_id',Auth::id())->first()){
            $user_msg = UserMsg::where('user_id',Auth::id())->first();
            $user_msg->name = $request->name;
            $user_msg->content = $request->content;
            $user_msg->user_id = Auth::id();
            $user_msg->image = $url;
            $user_msg->save(); 
        }
        else{
            $user_msg = new UserMsg;
            $user_msg->name = $request->name;
            $user_msg->content = $request->content;
            $user_msg->user_id = Auth::id();
            $user_msg->image = $url;
            $user_msg->save(); 
        }
        
        session()->flash('success','信息修改成功！');
        return redirect()->route('user.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
