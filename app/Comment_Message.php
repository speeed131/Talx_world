<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_Message extends Model
{
    protected $fillable = [
        'user_post_id', 'user_id', 'message_text'
    ];
}
