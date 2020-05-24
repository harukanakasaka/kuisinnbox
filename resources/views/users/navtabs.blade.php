<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">マイログ<span class="badge badge-secondary">{{ $count_logs }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.others_show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/others_show') ? 'active' : '' }}">フォロイー<span class="badge badge=secondary">{{ $count_followings }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.others_show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/others_show') ? 'active' : '' }}">フォロワー<span class="badge badge=secondary">{{ $count_followers }}</span></a></li>
</ul>