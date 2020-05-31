@extends('layouts.app')

@section('content')

    <h2 class="mb-4">編集</h2>
    <div class="row">
        <div class="col-8 offset-2">
            {!! Form::model($log, ['route' => ['logs.update', $log->id], 'method' => 'put', 'class' => 'form', 'files' => true]) !!}
            
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
                    {!! Form::label('myfile', 'フォト') !!}
                    {!! Form::file('myfile', old('myfile', isset($defaultName) ? $defaultName : '')) !!}
                </div>
            
                <div class="form-group">
                {!! Form::submit('更新', ['class' => 'btn btn-light rounded-pill btn-rem-7 positive']) !!}
                </div>
            {!! Form::close() !!}    
                
        </div>
    </div>

@endsection