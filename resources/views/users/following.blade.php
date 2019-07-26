@extends('layouts.app')

@section('content')
    
<h3>フォローしているユーザー</h3>
    @foreach($following_users as $following_user)
        <p>{{ $following_user->name }}</p>
    @endforeach

<h3>フォローされているユーザー</h3>
    @foreach($be_followed_users as $be_followed_user)
        <p>{{ $be_followed_user->name }}</p>
    @endforeach

    <h1>{{ $follow_users_number }}</h1>
    <h1>{{ $be_followed_users_number }}</h1>

@endsection
