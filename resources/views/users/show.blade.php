@extends('layouts.app')

@section('content')
            @include('users.card', ['user' => $user])
        <div class="row">
        <div class="col-sm-12">
            @include('users.navtabs', ['user' => $user])
            @if (count($logs) > 0) 
                @include('logs.logs', ['logs' => $logs])
            @endif
        </div>  
        </div>    
@endsection    