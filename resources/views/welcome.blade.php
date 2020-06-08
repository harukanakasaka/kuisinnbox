@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <h2 class="mb-5"><span class="long">{{ Auth::user()->name }}</span>のログ</h2>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'logs.store', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('product_name', '商品名') !!} <span class="badge badge-pill needed">必須</span>
                        {!! Form::text('product_name', old('product_name'), ['class' => 'form-control', 'row' => '1']) !!}
                    </div>    
                    <div class="form-group">
                        {!! Form::label('title', 'タイトル') !!} <span class="badge badge-pill needed">必須</span>
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'row' => '1']) !!}
                    </div>    
                    <div class="form-group"> 
                        {!! Form::label('comment', 'コメント') !!} <span class="badge badge-pill needed">必須</span>
                        {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'row' => '2']) !!}
                    </div>  
                    
                    <div class="form-group">
                        {!! Form::label('myfile', 'フォト') !!}<br>
                        
                        {!! Form::file('myfile', old('myfile')) !!}
                        
                    </div>
                    
                    <div class="form-group">
                        {!! Form::submit('投稿', ['class' => 'btn btn-light rounded-pill mt-3 btn-rem-6 positive']) !!}
                    </div> 
                {!! Form::close() !!}
                @endif        
            </div>
        </div>    
        
        @if (count($logs) > 0)
                    <ul class="list-unstyled">
                    @foreach ($user->logs as $log)
                    
        <div class="align-items-center">    
            
                    <div class="contents">
                    <div class="card card-color">
                        
                        <div class="my-tape"></div>
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
                            @endif
                                </div>     
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
            </div>
        </div>
    @else
        <div class="wrapper">
            <img src="https://images.unsplash.com/photo-1518912006-3761723e528a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=60" alt="サンドイッチを食べる女性" class="woman"/>
        
            <div class="text-center mt-5">    
                <div class="triangle"></div>
                <h1 class="col-sm-12">あなたの知らない<br><span class="oisii">おいしい</span>を見つけよう<br>
                {!! link_to_route('signup.get', '▶今すぐはじめる', [], ['class' => 'btn btn-lg light rounded-pill mt-2 mb-1 btn-rem-13 lead']) !!}
                </h1>
            </div>
        
            <i class="fas fa-arrow-down lead-icon text-center"></i>
        </div>
       
        <div id="wrapper">
            <div class="section">
                <section>   
                    <h2>くいしんぼっくすとは</h2>    
                        <p class="about-text">
                            あ、おいしい！ほかの人にも試してほしい<br>
                            みんなのおすすめを知りたい<br><br>
                            そんな思いを実現するシンプルなサービスです
                        </p>
                </section>
                
                <section> 
                    <h2>できること</h2>
                    <div class="usage col-sm-12">
                        
                        <div class="card explanation-card">
                            <div class="tape"></div>
                            <p class="explanation-text"><i class="far fa-comment fa-2x text-center contents-icon"></i><br>
                                ログを投稿する<br>
                                <div class="explanation">おいしかった商品について<br>コメントやフォトを残せる</div>
                            </p>
                        </div> 
                        
                        <div class="card explanation-card">
                            <div class="tape"></div>
                            <p class="explanation-text"><i class="far fa-comments fa-2x contents-icon"></i><br>
                                みんなのログを見る<br>
                                <div class="explanation">みんなのログ一覧も1人1人の<br>ログ一覧もチェックできる</div>
                            </p>
                        </div> 
                        
                        <div class="card explanation-card">
                            <div class="tape"></div>
                            <p class="explanation-text"><i class="far fa-thumbs-up fa-2x contents-icon"></i><br>
                                フォローする<br>
                                <div class="explanation">ほかのユーザをフォローして<br>気になる商品を見つけやすく</div>
                            </p>
                        </div>  
                        
                    </div>
                </section> 
                
                <div class="text-center">
                    {!! link_to_route('signup.get', '登録はこちらから', [], ['class' => 'btn btn-lg light rounded-pill btn-rem-13 lead contents-lead']) !!}
                </div>
            </div>
        </div>    
    @endif    
@endsection

