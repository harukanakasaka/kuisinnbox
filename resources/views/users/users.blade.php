@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div class="form-inline mt-2 mb-3 text-inline follow">
                        @if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
        {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('×フォロー', ['class' => "btn btn-light rounded-pill mr-2 btn-rem-6 negative"]) !!}
        {!! Form::close() !!} 
    @else
        {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::submit('フォロー', ['class' => "btn btn-light rounded-pill mr-2 btn-rem-6 negative"]) !!}
        {!! Form::close() !!}
    @endif
@endif
                        {!! link_to_route('users.show', 'もっとログを見る', ['id' => $user->id], ['class' => 'btn btn-light rounded-pill btn-rem-10 positive']) !!}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif