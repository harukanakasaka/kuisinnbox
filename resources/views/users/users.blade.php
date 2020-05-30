@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div class="form-inline mt-2 mb-3 text-inline follow">
                        @include('user_follow.follow_button', ['user' => $user])
                        {!! link_to_route('users.show', 'もっとログを見る', ['id' => $user->id], ['class' => 'btn btn-light rounded-pill btn-rem-10 positive']) !!}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif