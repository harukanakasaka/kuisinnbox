@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'login.post']) !!}
            {!! Form::close() !!}
            
            <p class="mt-2">はじめての方はこちら{!! link_to_route('signup.get', '今すぐはじめる') !!}</p>
        </div>
    </div>
@endsection