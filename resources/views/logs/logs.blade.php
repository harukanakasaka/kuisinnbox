<ul class="list-unstyled">
    @foreach ($logs as $log)
        <li class="media mb-3">
            <div class="media-body">
                <div>
                    {{ $log->user->name }} <span class="text-muted">{{ $log->created_at }}に投稿</span>
                </div>
                <div>
                    <p class="mb-0">{{ $log->product_name }}</p>
                    <p class="mb-0">{{ $log->title }}</p>
                    <p class="mb-0">{!! nl2br(e($log->comment)) !!}</p>
                </div>
                <div>
                    <div class="form-inline">   
                        @if (Auth::id() == $log->user_id)
                            {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                            {!! link_to_route('logs.edit', '編集', ['id' => $log->id], ['class' => 'btn btn-light']) !!}
                        @else
                            @include('user_follow.follow_button', ['user' => $user])
                            {!! link_to_route('users.show', 'もっとログを見る', ['id' => $log->id], ['class' => 'btn btn-light']) !!}
                        @endif
                    </div>     
                </div>
            </div>
        </li>
    @endforeach    
</ul>
{{ $logs->links('pagination::bootstrap-4') }}