@if (count($users) > 0)
    <ul class="list-unstyled d-flex">
        @foreach ($users as $user)
            <li class="media ml-2">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 40]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', $user->name, ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif