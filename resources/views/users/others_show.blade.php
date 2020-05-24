@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="{{ route('users.others_show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">{{ $user->name }}のログ<span class="badge badge-secondary">{{ $count_logs }}</span></a></li>
            </ul>
            @if (count($logs) > 0)
                @include('logs.logs', ['logs' => $logs])
            @endif    
        </div>
    </div>
@endsection    