<h2 class="mb-3">{{ $user->name }}</h2>

@include('user_follow.follow_button', ['user' => $user])