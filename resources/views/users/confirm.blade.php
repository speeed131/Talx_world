@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <form style="display:inline" action="{{ url('/') }}" method="get">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
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
