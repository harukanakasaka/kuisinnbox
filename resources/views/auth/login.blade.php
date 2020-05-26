@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h2>ログイン</h2>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="text-center">
                    {!! Form::submit('ログイン', ['class' => 'btn btn-light rounded-pill btn-rem-7 positive']) !!}
                </div>
            {!! Form::close() !!}
            
            <p class="mt-2">はじめての方は{!! link_to_route('signup.get', 'こちら', [], ['class' => 'nav-color']) !!}</p>
        </div>
    </div>
@endsection