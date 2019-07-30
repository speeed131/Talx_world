@extends('layouts.app')

@section('content')
<div class="container show_container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <a href=" {{ route('users.show', $user) }}" class="btn btn-secondary">
                        Back
                    </a>    

                    <form style="display:inline" action="{{ route('users.destroy', $user) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger float-right" style="">
                            {{ __('Account Delete') }}
                        </button>
                        <input type="hidden" name="user" value="$user->id">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
