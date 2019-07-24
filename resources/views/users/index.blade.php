@extends('layouts.app')

@section('content')
<div class="container index_container">
    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8 mb-3 index_user_search">
                            <form action="{{ route('users.search') }}" method="POST" class="">
                            @method('get')
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control  form-control-borderless" type="search" placeholder="Search topics or keywords" name='search'>
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
        <div class="col-md-10 index_users">
            <div class="card text-center search_result">
                <div class="card-header">
                    <b>Users</b>
                </div>
                    @isset($request->search)
                        <p>{{ $search_result }}</p>
                    @endisset
                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> -->
            </div>
            

<!--
                    @foreach($users as $user)
                    <div class="d-flex flex-row htxs-flex-container">
                        <a href=" {{ route('users.show', $user->id) }}">

                                <div class="p-2">
                                             @if(!empty($user->user_image) )
                                                <img src="/storage/{{ $user->user_image }}" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                            @endif
                                </div>
                                <div class="p-2">{{ $user->name }}</div>
                                <div class="p-2">{{ $user->user_nationality }}</div>
                                <div class="p-2">{{ $user->user_topic }}</div>

                        </a>
                    </div>
                    @endforeach -->
                        <table class="table  table-bordered index_table" style="width: 100%; word-break: break-word;">

                        <tbody>
                        <tr>
                                <td>Name</td>
                                <td>Country</td>
                                <td>Learn</td>
                                <td>Topic</td>
                        </tr>
                        @foreach($users as $user)
                            <tr class="">
                                <th class="" scope="row" style="width: 25%; height: 80px" class="users_table">
                                    <a href=" {{ route('users.show', $user) }}" class="users_name">
                                    {{ $user->name }}
                                    @if(!empty($user->user_image) )
                                    <img src="/storage/{{ $user->user_image }}" class="img-fluid rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                                    @endif
                                    </a>
                                </th>


                                <td style="width: 25%;">{{ $user->user_nationality }}</td>
                                <td style="width: 25%;">{{ $user->user_learning_language }}</td>
                                <td style="width: 25%;">{{ $user->user_topic }}</td>
                            </tr>


                        </tbody>
                        @endforeach

                    </table>

                <!-- </div> -->

                {{ $users->appends(request()->input())->links() }}

        </div>
    </div>
</div>
@endsection
