<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_Message extends Model
{

    protected $table = 'comment_messages';

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'user_post_id', 'user_id', 'message_text'
    ];



    public function user()
    {
        return $this->belongsTo(\App\User::class,'user_id');
    }
}
