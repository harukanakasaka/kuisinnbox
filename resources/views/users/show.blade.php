@extends('layouts')

@section('comment')
    <div class="row">
        <aside class="col-sm-4">
            
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">マイログ<span class="badge badge-secondary">{{ $count_logs }}</span></a></li>
            </ul>
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'logs.store']) !!}
                    <div class="form-group">
                        {!! Form::text('商品名', old('商品名'), ['class' => 'form-control', 'row' => '1']) !!}
                        {!! Form::text('タイトル', old('タイトル'), ['class' => 'form-control', 'row' => '1']) !!}
                        {!! Form::textarea('コメント', old('コメント'), ['class' => 'form-control', 'row' => '2']) !!}
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif    
        </div>
    </div>
@endsection    