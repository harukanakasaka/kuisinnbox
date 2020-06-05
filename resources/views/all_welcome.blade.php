@extends('layouts.app')

@section('content')
    @if(Auth::check())
        @if (count($logs) > 0)
                <h2 class="mb-4">みんなのログ</h2>
                    <ul class="list-unstyled">
    @foreach ($logs as $log)
    <div class="align-items-center">
        
    <div class="contents">
    <div class="card card-color">
        @if (Auth::user() == $log->user)
        <div class="my-tape"></div>
        @else
        <div class="others-tape"></div>                
        @endif
        <div class="flexbox">
                <div class="box1">
                <p class="product-space">{{ $log->product_name }}</p>
                @if ($log->myfile)
                    <img src="{{ $log->myfile }}" class="card-img">
                @else
                    <div class="no-img">フォトはありません</div>        
                @endif
                </div>            
                <div class="box2">
                <div>
                    <p class="title">{{ $log->title }}</p>
                </div>
                <div>
                    <p class="comment-space">{!! nl2br(e($log->comment)) !!}</p>
                </div>
                    
                <div>
                    <div class="name">{{ $log->user->name }}</div><br><span class="text-muted post">{{ $log->created_at }}に投稿</span>
                    <div class="form-inline card-button">   
                        @if (Auth::id() == $log->user_id)
                            {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-light rounded-pill btn-rem-6 mr-2 card-negative']) !!}
                            {!! Form::close() !!}
                            {!! link_to_route('logs.edit', '編集', ['id' => $log->id], ['class' => 'btn btn-light rounded-pill btn-rem-6 card-positive']) !!}
                        @else
                            @include('user_follow.follow_button', ['user' => $log->user])
                            {!! link_to_route('users.show', 'もっとログを見る', ['id' => $log->user->id], ['class' => 'btn btn-light rounded-pill btn-rem-10 card-positive']) !!}
                        @endif
                    </div>     
                </div>
                </div>
            
        
    </div>
    </div>
    </div>
    @endforeach    
</ul>
{{ $logs->links('pagination::bootstrap-4') }}
                @endif    
                
    @else
        <div class="text-center">
            <h1>あなたの知らないおいしいを見つけよう</h1>
            {!! link_to_route('signup.get', '今すぐはじめる', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    @endif    
@endsection