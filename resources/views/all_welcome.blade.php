@extends('layouts.app')

@section('content')
    @if(Auth::check())
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