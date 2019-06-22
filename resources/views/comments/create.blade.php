@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

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
                        <div class="card">
                            <h5 class="card-header">{{ $message->user->name }}</h5>
                            <div class="card-body">
                                <p class="card-text">{{ $message->message_text }}</p>
                            </div>
                        </div>
                    @endforeach


                    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">コメント</label>
                            <textarea class="form-control" rows="10" name="message_text" id="message_text" ></textarea>
                        </div>


                        <input type="hidden" name="user_id" value='{{ Auth::id() }}'>
                        <input type="hidden" name="user_post_id" value='{{ $user_post_id }}'>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
