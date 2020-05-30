@if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
        {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('×フォロー', ['class' => "btn btn-light rounded-pill mr-2 btn-rem-6 negative"]) !!}
        {!! Form::close() !!} 
    @else
        {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::submit('フォロー', ['class' => "btn btn-light rounded-pill mr-2 btn-rem-6 positive"]) !!}
        {!! Form::close() !!}
    @endif
@endif