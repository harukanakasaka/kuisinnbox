@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8 offset-2">
            @include('users.navtabs', ['user' => $user])
            @if (count($logs) > 0) 
                @include('logs.logs', ['logs' => $logs])
            @endif
        </div>
    </div>
@endsection    