@extends('layouts.app')

@section('content')
<div class="container show_container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center border-0">
            <!-- <div class=""> -->

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                            <div class="mt-3">
                                <img src="{{ $user->user_image }}" class="img-fluid  " style="width: 80%; height: auto; object-fit: cover;">
                            </div>
                            <!-- <div class="card-body"> -->


                                <!-- <h5 class="card-title">{{ $user->name }}</h5>
                                <br>

                                <h5 class="card-title">{{ $user->user_nationality }}</h5>
                                <h5 class="card-title">{{ $user->user_learning_language }}</h5>
                                <h5 class="card-title">{{ $user->user_topic }}</h5>
                                <h5 class="card-title">{{ $user->user_introduce }}</h5> -->
                            <div class="width-100">
                                <table class="table table-borderless show_table m-0 mb-4">
                                    <tbody>
                                        <tr>
                                        <th scope="col">Name</th>
                                        </tr>
                                        <tr>
                                        <th scope="row">{{ $user->name }}</th>
                                        </tr>
                                        <tr>
                                        <th scope="row">County</th>
                                        </tr>
                                        <tr>
                                        <th scope="row">{{ $user->user_nationality }}</th>
                                        </tr>
                                        <tr>
                                        <th scope="row">Learning language</th>
                                        </tr>
                                        <tr>
                                        <th scope="row">{{ $user->user_learning_language }}</th>
                                        </tr>
                                        <tr>
                                        <th scope="row">Topic</th>
                                        </tr>
                                        <th scope="row">{{ $user->user_topic }}</th>
                                        </tr>
                                        <tr>
                                        <th scope="row">Introduce</th>
                                        </tr>
                                        <tr>
                                        <th scope="row">{{ $user->user_introduce }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
    
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                                @if( Auth::id() == $user->id)
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary ml-4 edit_profile_button" >Edit profile</a>
                                    <a href="{{ route('users.confirm', $user) }}" class="btn btn_account mt-4">Account</a>
                                @else
                                    <a href="{{ route('comments.create', ['user_post_id' => $user->id] ) }}" class="btn btn_account ml-4">Chat</a>

                                        @if(!empty($followingeachother))
                                            <a href="{{ route('users.unfollow',$user) }}" class="btn btn_follow mt-4 ">UnFollow</a>
                                        @else
                                            <a href="{{ route('users.follow',$user) }}" class="btn btn_follow mt-4 ">Follow</a>
                                        @endif                                    
                                @endif
   
                            <!-- </div> -->
                <!-- </div> -->
                    
        </div>
    </div>
</div>
@endsection
