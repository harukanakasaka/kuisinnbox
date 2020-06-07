@extends('layouts.app')

@section('content')
    
        <h2 class="mb-5">ログイン</h2>
    
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
                
                <div class="text-left mt-4">
                    {!! Form::submit('ログイン', ['class' => 'btn btn-light rounded-pill btn-rem-7 positive']) !!}
                </div>
            {!! Form::close() !!}
            
            <p class="text-right guide-space">はじめての方は{!! link_to_route('signup.get', 'こちら', [], ['class' => 'guide']) !!}</p>
        </div>
    </div>
@endsection