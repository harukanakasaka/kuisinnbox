@extends('layouts.app')

@section('content')

    <h2 class="mb-4">編集</h2>
    <div class="row justify-content-center">
        <div class="col-sm-8">
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
                    {!! Form::label('myfile', 'フォト') !!}<br>
                    <div class="photo-file">
                    {!! Form::file('myfile', null) !!}
                    </div>
                    @if ($log->myfile)
                        <img src="{{ $log->myfile }}" class="photo">
                        <p class="current-photo text-right">現在のフォト</p>
                    @else
                        <div class="no-img2">フォトはありません</div>    
                    @endif
                </div>
            
                <div class="form-group">
                {!! Form::submit('更新', ['class' => 'btn btn-light rounded-pill btn-rem-7 update-btn positive']) !!}
                </div>
            {!! Form::close() !!}    
                
        </div>
    </div>

@endsection