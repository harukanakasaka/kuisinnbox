<ul class="list-unstyled">
    @foreach ($logs as $log)
        <li class="media mb-3">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $log->user->name, ['id' => $log->user->id]) !!}<span class="text-muted">posted at {{ $log->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{{ $log->product_name }}</p>
                    <p class="mb-0">{{ $log->title }}</p>
                    <p class="mb-0">{!! nl2br(e($log->comment)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $log->user_id)
                        {!! Form::open(['route' => ['logs.destroy', $log->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                        {!! link_to_route('logs.edit', '編集', ['id' => $log->id], ['class' => 'btn btn-light']) !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach    
</ul>
{{ $logs->links('pagination::bootstrap-4') }}