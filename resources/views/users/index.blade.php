@extends('layouts.app')

@section('content')
    @include('users.users', ['users' => $users])
@endsection

//フォローしている人一覧に使う