@if (Auth::id() == $user->id)
<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link navtab-color {{ Request::is('users/' . $user->id) ? 'active' : '' }}">マイログ<span class="badge badge-pill needed">{{ $count_logs }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link navtab-color {{ Request::is('users/*/followings') ? 'active' : '' }}">フォロイー<span class="badge badge-pill needed">{{ $count_followings }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link navtab-color {{ Request::is('users/*/followers') ? 'active' : '' }}">フォロワー<span class="badge badge-pill needed">{{ $count_followers }}</span></a></li>
</ul>  
@else
<div class="navtab-color navtab-nolog mt-5">{{ $user->name }}のログ<span class="badge badge-pill needed">{{ $count_logs }}</span></div>
@endif
