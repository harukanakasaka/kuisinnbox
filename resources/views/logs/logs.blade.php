<ul class="list-unstyled">
    @foreach ($logs as $log)
    <div class="card my-5 pt-3 pb-1 px-4 card-color">
        @if (Auth::user() == $log->user)
        <div class="my-tape"></div>
        @else
        <div class="others-tape-2"></div>                
        @endif
        <li class="media mb-3">
            <div class="media-left">
                <p class="title-space mt-3 mb-1">{{ $log->product_name }}</p>
                @if ($log->myfile)
                            <img src="{{ $log->myfile }}" width="190rem" height="200rem">
                            @endif
            </div>
            <div class="media-body  ml-5">
                <div>
                    <p class="title mb-2">{{ $log->title }}</p>
                </div>
                <div>
                    <p class="comment-space mb-0">{!! nl2br(e($log->comment)) !!}</p>
                </div>
                
                <div>
                    <p class="post">{{ $log->user->name }}<span class="text-muted ml-3">{{ $log->created_at }}に投稿</span></p>
                    <div class="form-inline float-right card-button">   
                        @if (Auth::id() == $log->user_id)
                            {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-light rounded-pill btn-rem-6 mr-2 negative']) !!}
                            {!! Form::close() !!}
                            {!! link_to_route('logs.edit', '編集', ['id' => $log->id], ['class' => 'btn btn-light rounded-pill btn-rem-6 positive']) !!}
                        @endif
                    </div>     
                </div>
            </div>
        </li>
    </div>    
    @endforeach    
</ul>
{{ $logs->links('pagination::bootstrap-4') }}