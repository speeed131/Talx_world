@extends('layouts.app')

@section('content')
<div class="container container_edit">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body text-center">
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

                    <form action="{{ route('users.update', $user->id ) }}" method="POST" enctype="multipart/form-data" class="edit_form text-center ">
                    {{ csrf_field() }}
                    @method('PATCH')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" >
                        </div>
                        <div class="form-group">
                            <input type="file" name="user_image"  class="form-control-file" >
                            @if(!empty($user->user_image) )
                                <img src="{{ $user->user_image }}" class="img-fluid " style="width: 80%; height: auto; object-fit: cover;">
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nationality</label>
                            <input type="text" class="form-control" name="user_nationality" value="{{ $user->user_nationality }}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Learning Language</label>
                            <input type="text" class="form-control" name="user_learning_language" value="{{ $user->user_learning_language }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Topic</label>
                            <input type="text" class="form-control" name="user_topic" value="{{ $user->user_topic }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Introduce</label>
                            <textarea class="form-control" rows="10" name="user_introduce" >{{ $user->user_introduce }}</textarea>
                        </div>


                        <input type="hidden" name="id" value='{{ Auth::id() }}'>


                        <button type="submit" class="btn">Save</button>
                    </form>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
