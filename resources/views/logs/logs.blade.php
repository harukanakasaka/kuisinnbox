<ul class="list-unstyled">
    @foreach ($logs as $log)
    <div class="card mb-2 pt-3 px-4 card-color">
        <li class="media mb-3">
            <div class="media-left">
                <p class="mb-1 mr-5">{{ $log->product_name }}</p>
            </div>
            <div class="media-body">
                <div>
                    {{ $log->user->name }}<span class="text-muted">{{ $log->created_at }}に投稿</span>
                </div>
                <div>
                    <p class="mb-1">{{ $log->title }}</p>
                    <p class="mb-0">{!! nl2br(e($log->comment)) !!}</p>
                </div>
                <div>
                    <div class="form-inline float-right">   
                        @if (Auth::id() == $log->user_id)
                            {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-light rounded-pill btn-rem-6 negative']) !!}
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