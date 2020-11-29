<header class="mb-4">
    
    <nav class="navbar navbar-expand-sm mywvNavbar">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand headerMywvLogo" href="/">MyWV</a>
        
        {{-- トグルボタン --}}
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                
                {{--認証分岐--}}
                @if (Auth::check())
                    {{-- ドロップダウンメニュー --}}
                    <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle nav-item-Mywv" data-toggle="dropdown">
                        <span class="navUsername">{{ Auth::user()->name }}</span>
                        <img class="mr-2 rounded" src="{{ Gravatar::get(Auth::user()->email, ['size' => 40]) }}" alt="">
                    </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item nav-item-Mywv-drop">{!! link_to_route('users.show', Auth::user()->name, ['user' => Auth::id()]) !!}</li>
                            {{-- ユーザ一覧ページへのリンク --}}
                            <li class="dropdown-item nav-item-Mywv-drop">{!! link_to_route('users.index', 'Users', [], ['class' => '']) !!}</li>
                            {{-- ユーザ一設定 --}}
                            <li class="dropdown-item nav-item-Mywv-drop">{!! link_to_route('users.edit', 'Setting', ['user' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item nav-item-Mywv-drop">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item nav-item-Mywv">{!! link_to_route('signup.get','新規登録',[],['class'=>'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item nav-item-Mywv">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
        
    </nav>
</header>