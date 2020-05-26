@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <h2>{{ Auth::user()->name }}のログ</h2>
        <div class="row">
            <div class="col-sm-8 offset-2">
                @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'logs.store']) !!}
                    <div class="form-group">
                        {!! Form::label('product_name', '商品名') !!}<span class="badge badge-pill needed">必須</span>
                        {!! Form::text('product_name', old('product_name'), ['class' => 'form-control', 'row' => '1']) !!}
                    </div>    
                    <div class="form-group">
                        {!! Form::label('title', 'タイトル') !!}<span class="badge badge-pill needed">必須</span>
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'row' => '1']) !!}
                    </div>    
                    <div class="form-group"> 
                        {!! Form::label('comment', 'コメント') !!}<span class="badge badge-pill needed">必須</span>
                        {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'row' => '2']) !!}
                    </div>  
                    <div class="form-group">
                        {!! Form::submit('投稿', ['class' => 'btn btn-light rounded-pill btn-rem-6 positive']) !!}
                    </div>    
                    
                {!! Form::close() !!}
                @endif    
                @if (count($logs) > 0)
                    <ul class="list-unstyled">
                    @foreach ($user->logs as $log)
                    <div class="card mb-2 pt-3 px-4 card-color">
                        <li class="media mb-3">
                        <div class="media-left">
                            <p class="mb-1 mr-5">{{ $log->product_name }}</p>
                        </div>
                        <div class="media-body">
                            <div>
                                {{ $log->user->name }} <span class="text-muted">{{ $log->created_at }}に投稿</span>
                            </div>
                            <div>
                                <p class="mb-1">{{ $log->title }}</p>
                                <p class="mb-0">{!! nl2br(e($log->comment)) !!}</p>
                            </div>
                            <div>
                                <div class="form-inline float-right">   
                                @if (Auth::id() == $log->user_id)
                                {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除', ['class' => 'btn btn-light rounded-pill btn-rem-6 negative']) !!}
                                {!! Form::close() !!}
                                {!! link_to_route('logs.edit', '編集', ['id' => $log->id], ['class' => 'btn btn-light rounded-pill btn-rem-6 positive']) !!}
                            @endif
                                </div>     
                            </div>
                        </div>
                        </li>
                    </div>    
                    @endforeach    
                    </ul>
                    {{ $logs->links('pagination::bootstrap-4') }}
                @endif    
            </div>
        </div>
    @else
            <div class="text-center pt-5">
                <h1>あなたの知らないおいしいを見つけよう</h1>
                {!! link_to_route('signup.get', '▶今すぐはじめる', [], ['class' => 'btn btn-lg light rounded-pill btn-rem-13 positive']) !!}
            </div>
    @endif    
@endsection