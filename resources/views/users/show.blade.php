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

                        <div class="card">
                            <h5 class="card-header">{{ $user->name }}</h5>

                                <img src="/storage/{{ $user->user_image }}" class="card-img img-fluid rounded">

                            <div class="card-body">
                                <h5 class="card-title">{{ $user->user_nationality }}</h5>
                                <h5 class="card-title">{{ $user->user_learning_language }}</h5>
                                <h5 class="card-title">{{ $user->user_topic }}</h5>
                                <h5 class="card-title">{{ $user->user_introduce }}</h5>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                                @if( Auth::id() == $user->id)
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-danger" >プロフィール編集</a>
                                {!!Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'DELETE', 'class' => 'btn  pull-right'])!!}
                                    <!-- {{Form::hidden('_method', 'DELETE')}} -->
                                    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                {!!Form::close() !!}
                                @else
                                <a href="{{ route('comments.create', ['user_post_id' => $user->id] ) }}" class="btn btn-danger ">Chat</a>
                                <a href=""></a>
                                @endif
                            </div>
                        </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
