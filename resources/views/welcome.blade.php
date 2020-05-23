@extends('layouts.app')

@section('comment')
    @if(Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                
            </aside>
            <div class="col-sm-8">
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
                @if (count($logs) > 0)
                    @include('logs.logs', ['logs' => $logs])
                @endif    
            </div>
        </div>
    @endif    
@endsection