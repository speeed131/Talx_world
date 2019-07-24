<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index(){
        return \App\Comment_Message::orderBy('id', 'desc')->get();

        return view('/chat');
    }

    public function create(Request $request){ //メッセージを登録

        \App\Comment_Message::create([
            'message_text' => $request->message_text
        ]);

        

    }
}
