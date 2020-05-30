<ul class="list-unstyled">
    @foreach ($logs as $log)
    <div class="card my-5 pt-3 pb-1 px-4 card-color">
        @if (Auth::user() == $log->user)
        <div class="my-tape"></div>
        @else
        <div class="others-tape"></div>                
        @endif
        <li class="media mb-3">
            <div class="media-left">
                <p class="title-space mb-0">{{ $log->product_name }}</p>
                @if ($log->myfile)
                            <img src="{{ $log->myfile }}" width="180rem" height="180rem">
                            @endif
            </div>
            <div class="media-body  ml-4">
                <div>
                    <p class="mb-3">{{ $log->title }}</p>
                </div>
                <div>
                    <p class="comment-space mb-0">{!! nl2br(e($log->comment)) !!}</p>
                </div>
                
                <div>
                    {{ $log->user->name }}<span class="text-muted ml-3">{{ $log->created_at }}に投稿</span>
                    <div class="form-inline float-right">   
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