@extends('layouts.app')

@section('content')

            @include('users.card', ['user' => $user])
<div class="row">        
        <div class="col-sm-12 mb-5">
            @include('users.navtabs', ['user' => $user])
        </div>
        <div class="col-sm-10 offset-1">
            @include('users.users', ['users' => $users])
        </div>  
</div>
@endsection    