@extends('layouts.app')

@section('content')

    {{-- ユーザ一覧 --}}
    <div class="text-center">
        <h1>USERS</h1>
    </div>
    @include('users.users')
@endsection