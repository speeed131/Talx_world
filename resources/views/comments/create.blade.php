@extends('layouts.app')

@section('content')
<div class="container create_container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card chat_container">
                <!-- <div class="card-header">

                </div> -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @foreach($messages as $message)
                        @if($message->user == Auth::user())
                            <div class="card chat_message text-white text-right" style="margin-top:3px;">
                                <h5 class="card-header comment_card_header ">
                                    @if(!empty($message->user->user_image) )
                                    <img src="data:image/png;base64,{{ $message->user->user_image }}" class="img-fluid rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                                    @endif
                                    {{ $message->user->name }}
                                </h5>
                                <div class="card-body float-right">
                                    <p class="card-text">{{ $message->message_text }}</p>
                                </div>
                            </div>
                        @else
                        <div class="card chat_message text-white" style="margin-top:3px;">
                            <h5 class="card-header comment_card_header">
                                @if(!empty($message->user->user_image) )
                                <img src="{{ $message->user->user_image }}" class="img-fluid rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                                @endif
                                {{ $message->user->name }}
                            </h5>
                            <div class="card-body ">
                                <p class="card-text">{{ $message->message_text }}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach


<!-- 
                    <div id="chat">
                        <textarea rows="5" name="message_text" id="message_text" v-model="message" ></textarea>
                        <br>
                        <input type="button" value="送信">
                    </div> -->

                    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data" class="text-center">
                    {{ csrf_field() }}

                        <div class="form-group mt-3">
                            <label for="exampleFormControlTextarea1"></label>
                            <textarea class="form-control" rows="5" name="message_text" id="message_text" ></textarea>
                        </div>


                        <input type="hidden" name="user_id" value='{{ Auth::id() }}'>
                        <input type="hidden" name="user_post_id" value='{{ $user_post_id }}'>


                        <button type="submit" class="btn btn_post mt-3">Post</button>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
