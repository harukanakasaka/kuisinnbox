@extends('layouts.app')

@section('content')
            @include('users.card', ['user' => $user])
        <div class="row">
        <div class="col-sm-12 mb-5">
            @include('users.navtabs', ['user' => $user])
        </div>
        <div class="col-sm-12 show-log">
            @if (count($logs) > 0) 
                @include('logs.logs', ['logs' => $logs])
            @endif
        </div>  
        </div>    
@endsection    