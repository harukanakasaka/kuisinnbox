@extends('layouts.app')

@section('content')
    <div class="align-items-center">
        <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-10 offset-1">
            @include('users.navtabs', ['user' => $user])
        </div>    
        </div>
            @include('users.users', ['users' => $users])
    </div>
@endsection    