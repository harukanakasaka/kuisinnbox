<ul class="list-unstyled">
    @foreach ($logs as $log)
    
    <div class="contents">
    <div class="card card-color">
        @if (Auth::user() == $log->user)
        <div class="my-tape"></div>
        @else
        <div class="others-tape-2"></div>                
        @endif
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
                    <p class="post">{{ $log->user->name }}<br class="break2"><span class="text-muted">{{ $log->created_at }}に投稿</span></p>
                    <div class="form-inline card-button">   
                        @if (Auth::id() == $log->user_id)
                            {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-light rounded-pill btn-rem-6 mr-2 negative']) !!}
                            {!! Form::close() !!}
                            {!! link_to_route('logs.edit', '編集', ['id' => $log->id], ['class' => 'btn btn-light rounded-pill btn-rem-6 positive']) !!}
                        @endif
                    </div>     
                </div>
            </div>
        </div>
    </div>  
    </div>
    @endforeach    
</ul>
{{ $logs->links('pagination::bootstrap-4') }}