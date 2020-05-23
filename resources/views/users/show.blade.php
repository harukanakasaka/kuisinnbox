@extends('layouts')

@section('comment')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <h3 class="card-title">{{ $user->name }}</h3>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">マイログ<span class="badge badge-secondary">{{ $count_logs }}</span></a></li>
            </ul>
            
        </div>
    </div>
@endsection    