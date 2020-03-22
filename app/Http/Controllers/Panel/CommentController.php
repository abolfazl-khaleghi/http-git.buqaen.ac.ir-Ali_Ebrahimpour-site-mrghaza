<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Restaurant;
use DemeterChain\C;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
    accept comment in panel by admin
     **/
    public function accept($id){
        $comment = Comment::where('id',$id)->first();
        $comment->update(['status' => 1]);
        return redirect()->back();

    }
    /**
    reject comment in panel by admin
     **/
    public function unAccept($id){
        $comment = Comment::where('id',$id)->first();
        $comment->update(['status' => 0]);
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(5);
//        return $comments;
        return view('panel.comments.all',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '1';
//        return view('panel.comments.create');

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
            'name' => 'required|string',
            'email' => 'required|string',
            'body' => 'required|string',
        ]);
        Comment::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return '1';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::where('id',$id)->first();
        return view('panel.comments.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Comment $comment)
    {
        $comment->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
