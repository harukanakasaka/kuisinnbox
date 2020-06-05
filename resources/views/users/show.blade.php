@extends('layouts.app')

@section('content')
    
        <div class="row block">
            @include('users.card', ['user' => $user])
        
        <div class="col-sm-10 offset-1">
            @include('users.navtabs', ['user' => $user])
        </div>  
        </div>
            @if (count($logs) > 0) 
                @include('logs.logs', ['logs' => $logs])
            @endif
@endsection    