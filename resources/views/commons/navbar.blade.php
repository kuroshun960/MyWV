<style>
    .headerMywvLogo{
        color: #464646;
        font-weight: bold; 
    }
    
    .nav-item-Mywv{
        color: #464646;
        font-weight: bold; 
    }
    
    .mywvNavbar{
        border-bottom: 1px solid #464646;
    }
    
</style>

<header class="mb-4">
    <nav class="navbar navbar-expand-sm mywvNavbar">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand headerMywvLogo" href="/">MyWV</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{-- ユーザ登録ページへのリンク --}}
                <li class="nav-item nav-item-Mywv">{!! link_to_route('signup.get','新規登録',[],['class'=>'nav-link']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li class="nav-item nav-item-Mywv"><a href="#" class="nav-link">ログイン</a></li>
            </ul>
        </div>
    </nav>
</header>