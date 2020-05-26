<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color:lightcoral;">
        <a class="navbar-brand" href="/">くいしんぼっくす</a>
        <p class="subtitle"><br>あ、おいしいと思った商品を共有</p>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav form-inline">
                @if (Auth::check())
                    <li class="nav-item mr-4">{!! link_to_route('all_welcome.index', 'みんなのログ', [], ['class' => 'nav-size nav-color']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle nav-size nav-color" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', Auth::user()->name . 'のぼっくす', ['id' => Auth::id()], ['class' => 'nav-color']) !!}</li>
                            <li class="dropdown-item">{!! link_to_route('all_welcome.index', 'みんなのログ', [], ['class' => 'nav-color']) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-color']) !!}</li>
                        </ul>
                    </li>
                
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '登録', [], ['class' => 'nav-link nav-color']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link nav-color']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>