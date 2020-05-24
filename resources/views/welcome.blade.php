@extends('layouts.app')

@section('content')
    @if(Auth::check())
        {{ Auth::user()->name }}のログ
        <div class="row">
            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'logs.store']) !!}
                    <div class="form-group">
                        {!! Form::label('product_name', '商品名') !!}
                        {!! Form::text('product_name', old('product_name'), ['class' => 'form-control', 'row' => '1']) !!}
                    </div>    
                    <div class="form-group">
                        {!! Form::label('title', 'タイトル') !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'row' => '1']) !!}
                    </div>    
                    <div class="form-group"> 
                        {!! Form::label('comment', 'コメント') !!}
                        {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'row' => '2']) !!}
                    </div>  
                    <div class="form-group">
                        {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>    
                    
                {!! Form::close() !!}
                @endif    
                @if (count($logs) > 0)
                    @include('logs.logs', ['logs' => $logs])
                @endif    
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>あなたの知らないおいしいを見つけよう</h1>
                {!! link_to_route('signup.get', '今すぐはじめる', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>    
    @endif    
@endsection