<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment_Message;
use App\Http\Requests\CommentRequest;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function returncreate(User $user){
        $q = \Request::query();
        $count = \App\User::max('id');
        if($q['user_post_id'] > $count){
            abort(403);
        }
        return view('comments.create',[
            'user_post_id' => $q['user_post_id'],
        ]);
    }

    public function create(User $user)
    {

        $q = \Request::query();
        $messages = Comment_Message::whereIn('user_post_id', [$q['user_post_id']])
        ->get();
        $count = \App\User::max('id');
        if($q['user_post_id'] > $count){
            abort(403);
        }

        return view('comments.create', [
            'user_post_id' => $q['user_post_id'],
            'messages' => $messages,

        ]);

        
    }

    /**
     * Store a newly created resource i'n storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        if($request->message_text == ""){
            return view('comments.create',[
                'user_post_id' => $requset->user_post_id,
                'messages' => $messages,
            ])->with('user_post_id', $request->user_post_id);
        }

        $comment = New Comment_Message;
        $input = $request->only($comment->getFillable());

        $comment = $comment->create($input);
        $messages = Comment_Message::whereIn('user_post_id', [$request->user_post_id])->get();


        // $request->session()->regenerateToken();

        return redirect()->route('comments.create', 
        [
        'user_post_id' => $request->user_post_id,
        'messages' => $messages,

        ]);
       
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
