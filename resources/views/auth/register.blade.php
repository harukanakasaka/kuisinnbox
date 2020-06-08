@extends('layouts.app')

@section('content')
    
        <h2 class="mb-3">登録</h2>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ニックネーム') !!} <span class="badge badge-pill needed">必須</span>
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!} <span class="badge badge-pill needed">必須</span>
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}（6文字以上）<span class="badge badge-pill needed">必須</span>
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード') !!}（確認）<span class="badge badge-pill needed">必須</span>
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group mt-4 flex">
                    {!! Form::submit('登録', ['class' => 'btn btn-light rounded-pill btn-rem-7 positive']) !!}
                    <p class="relative">登録済みの方は{!! link_to_route('login', 'こちら', [], ['class' => 'guide']) !!}</p>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection    