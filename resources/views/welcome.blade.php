@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <h2 class="mb-4">{{ Auth::user()->name }}のログ</h2>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'logs.store', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
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
                        {!! Form::label('myfile', 'フォト') !!}<br>
                        
                        {!! Form::file('myfile', old('myfile')) !!}
                        
                    </div>
                    
                    <div class="form-group">
                        {!! Form::submit('投稿', ['class' => 'btn btn-light rounded-pill mt-3 btn-rem-6 positive']) !!}
                    </div>    
            </div>
            <div class="col-sm-10 offset-1">
                {!! Form::close() !!}
                @endif    
                @if (count($logs) > 0)
                    <ul class="list-unstyled">
                    @foreach ($user->logs as $log)
                    <div class="card my-5 pt-3 pb-1 px-4 card-color">
                        <div class="my-tape"></div>
                        <li class="media mb-3">
                        <div class="media-left">
                            <p class="title-space mt-3 mb-1">{{ $log->product_name }}</p>
                            @if ($log->myfile)
                            <img src="{{ $log->myfile }}" width="190rem" height="200rem">
                            @endif
                        </div>
                        <div class="media-body ml-5">
                            <div>
                                <p class="title mb-2">{{ $log->title }}</p>
                            </div>
                            <div>
                                <p class="comment-space mb-0">{!! nl2br(e($log->comment)) !!}</p>
                            </div>
                            
                            <div>
                                <p class="post">{{ $log->user->name }} <span class="text-muted ml-3">{{ $log->created_at }}に投稿</span></p>
                                <div class="form-inline float-right card-button">   
                                @if (Auth::id() == $log->user_id)
                                {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除', ['class' => 'btn btn-light rounded-pill btn-rem-6 mr-2 negative']) !!}
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
            <div>
                <img src="https://images.unsplash.com/photo-1518912006-3761723e528a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60" alt="サンドイッチを食べる女性" class="woman"/>
            </div>
            <div class="text-center mt-5">    
                <h1 class="box col-sm-12">あなたの知らない<br class="break"><span class="oisii">おいしい</span>を見つけよう<br>
                {!! link_to_route('signup.get', '▶今すぐはじめる', [], ['class' => 'btn btn-lg light rounded-pill mt-2 mb-1 btn-rem-13 lead']) !!}
                </h1>
            </div>
    @endif    
@endsection

