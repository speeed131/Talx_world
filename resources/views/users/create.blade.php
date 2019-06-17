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

                    <form action="{{ route('users.store') }}" method="post">
                    {{ csrf_field() }}
                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">名前</label>
                            <input type="text" class="form-control" name="name">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div> -->
                        <!-- <div class="form-image_url">
                            <input type="file" name="image_url">
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">国籍</label>
                            <input type="text" class="form-control" name="user_nationality" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">学びたい言語</label>
                            <input type="text" class="form-control" name="user_learning_language">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">話したいトピック</label>
                            <input type="text" class="form-control" name="user_topic">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> 自己紹介</label>
                            <textarea class="form-control" rows="10" name="user_introduce"></textarea>
                        </div>

                        <input type="hidden" name="id" value='{{ Auth::id() }}'>
                        <!-- <input type="hidden" name="email" value='{{ Auth::email() }}'>
                        <input type="hidden" name="name" value='{{ Auth::name() }}'> -->
                        <!-- ログインユーザーのIDを持ってきている -->

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
