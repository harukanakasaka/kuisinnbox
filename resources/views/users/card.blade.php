<div class="card">
    <h3 class="card-title">{{ $user->name }}</h3>
</div>
@include('user_follow.follow_button', ['user' => $user])