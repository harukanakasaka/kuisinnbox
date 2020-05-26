@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h2>登録</h2>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}<span class="badge badge-pill needed">必須</span>
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}<span class="badge badge-pill needed">必須</span>
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}<span class="badge badge-pill needed">必須</span>
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}<span class="badge badge-pill needed">必須</span>
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                <div class="text-center">
                    {!! Form::submit('登録', ['class' => 'btn btn-light rounded-pill btn-rem-7 positive']) !!}
                </div>
            {!! Form::close() !!}
            
            <p class="mt-2">登録済みの方は{!! link_to_route('login', 'こちら', [], ['class' => 'nav-color']) !!}</p>
        </div>
    </div>
@endsection    