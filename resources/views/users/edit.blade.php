@extends('layouts.app')

@section('content')

    <h1>編集</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($log, ['route' => ['logs.update', $log->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::label('product_name', '商品名') !!}
                    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('title', 'タイトル') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('comment', 'コメント') !!}
                    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                </div>
                
            {!! Form::close() !!}    
        </div>
    </div>

@endsection