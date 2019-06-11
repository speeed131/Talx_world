<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentMessagessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_messages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_post_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();

            $table->text('message_text');
            
          



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_messagess');
    }
}
