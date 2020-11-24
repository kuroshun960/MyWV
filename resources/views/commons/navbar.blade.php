<style>

    .headerMywvLogo{
        color: #464646;
        font-weight: bold; 
    }
    
    .nav-item-Mywv a{
        color: #464646;
        font-weight: bold; 
    }
    
    /*
    .dropdown-menu{
        background-color: #C4C4C4;
    }
    */
    
    .nav-item-Mywv-drop a{
        color: #464646;
    }
        
    .navbar-toggler{
        border-color: #000;
    }
    
    .navbar-toggler .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0,0,0,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }
    
    .mywvNavbar{
        border-bottom: 1px solid #464646;
    }
    
    
</style>

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
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item nav-item-Mywv"><a href="#" class="nav-link">User</a></li>
                    {{-- ドロップダウンメニュー --}}
                    <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle nav-item-Mywv" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item nav-item-Mywv-drop"><a href="#">詳細ページ</a></li>
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