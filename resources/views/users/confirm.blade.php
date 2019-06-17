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
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->user_nationality }}</h5>
                                <h5 class="card-title">{{ $user->user_learning_language }}</h5>
                                <h5 class="card-title">{{ $user->user_topic }}</h5>
                                <h5 class="card-title">{{ $user->user_introduce }}</h5>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                                @if( Auth::id() == $user->id)
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-danger" >プロフィール編集</a>
                                @else
                                <a href="#" class="btn btn-danger ">Chat</a>
                                @endif
                            </div>
                        </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
