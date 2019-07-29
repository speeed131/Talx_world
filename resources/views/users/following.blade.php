@extends('layouts.app')

@section('content')
<div class="container index_container">
    <div class="row justify-content-center">
        <div class="col-md-10 index_users">
            <div class="card text-center search_result">
                <div class="card-header">
                    <b>Following Users </b>
                </div>
            </div>

                <table class="table  table-bordered index_table" style="width: 100%; word-break: break-word;">

                    <tbody>
                        <tr>
                                            <td>Name</td>
                                            <td>Country</td>
                                            <td>Learn</td>
                                            <td>Topic</td>
                                    </tr>
                                    @foreach($following_users as $following_user)
                                        <tr class="">
                                            <th class="" scope="row" style="width: 25%; height: 80px" class="users_table">
                                                <a href=" {{ route('users.show', $following_user) }}" class="users_name">
                                                {{ $following_user->name }}
                                                @if(!empty($following_user->user_image ) )
                                                <img src="data:image/png;base64,{{ $following_user->user_image }}" class="img-fluid rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                                                @endif
                                                </a>
                                            </th>


                                            <td style="width: 25%;">{{ $following_user->nationality  }}</td>
                                            <td style="width: 25%;">{{ $following_user->learning_language }}</td>
                                            <td style="width: 25%;">{{ $following_user->topic }}</td>
                                        </tr>


                                    </tbody>
                                    @endforeach

                            </table>
                    <h6 class="text-secondary">Numbers of Following Users : {{ $follow_users_number }}</h6>
<!-- </div> -->




        </div>
    </div>
</div>
@endsection
