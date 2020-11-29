@extends('layouts.app')

@section('content')
<div class="container">

    {{-- フォロー一覧 --}}
    <div class="text-center">
        <h1>Following user:{{ $usernumber->followings_count }}</h1>
    </div>
    @if (count($followingsUsers) > 0)
        <ul class="list-unstyled d-flex">
            @foreach ($followingsUsers as $followingsUser)
                <li class="media ml-2">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="mr-2 rounded" src="{{ Gravatar::get($followingsUser->email, ['size' => 40]) }}" alt="">
                    <div class="media-body">
                        <div>
                            {{-- ユーザ詳細ページへのリンク --}}
                            <p>{!! link_to_route('users.show', $followingsUser->name, ['user' => $followingsUser->id]) !!}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    
    
</div>
@endsection