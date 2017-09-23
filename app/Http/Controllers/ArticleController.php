<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMsg;
use Auth;
use App\Article;
use App\Comment;
use App\User;

class ArticleController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = UserMsg::where('user_id',Auth::id())->first();
        return view('article.release',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'content' => 'required',
            ]);

        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = Auth::id();
        $article->save();

        session()->flash('success','文章发布成功！');
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UserMsg::where('user_id',Auth::id())->first();
        $content = Article::where('id',$id)->first();
         $data = UserMsg::where('user_id',$content->user_id)->first();
         $comments = Comment::where('Article_id',$id)->orderBy('created_at','desc')->paginate(10);
          
         
        return view('article.detail',compact('data','content','user','comments','users','usermsgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
