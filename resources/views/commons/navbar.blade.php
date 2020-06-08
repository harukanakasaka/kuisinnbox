<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light navbar-space" style="background-color:white;">
        <a class="navbar-brand" href="/"><i class="fas fa-utensils mr-2"></i>くいしんぼっくす</a>
        <p class="subtitle"><br>あ、おいしいと思った商品を共有</p>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav inline-block">
                @if (Auth::check())
                    <li class="nav-item nav-size mt-2">{!! link_to_route('all_welcome.index', 'みんなのログ', [], ['class' => 'mr-4 nav-color ours']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle nav-color mt-1" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item px-3 pt-0 pb-1">{!! link_to_route('welcome.index', 'ログを書く', [], ['class' => 'dropdown-color text-left']) !!}</li>
                            <li class="dropdown-item px-3 pt-0 pb-1">{!! link_to_route('users.show', Auth::user()->name . 'の詳細', ['id' => Auth::id()], ['class' => 'dropdown-color text-left']) !!}</li>
                            <li class="dropdown-item px-3 pt-0 pb-1">{!! link_to_route('all_welcome.index', 'みんなのログ', [], ['class' => 'pb-2 dropdown-color text-left']) !!}</li>
                            <li class="dropdown-divider p-0 m-0"></li>
                            <li class="dropdown-item px-3 pt-0 pb-1">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'pt-2 dropdown-color text-left logout']) !!}</li>
                        </ul>
                    </li>
                
                @else
                    <li class="nav-item mt-1">{!! link_to_route('signup.get', '登録', [], ['class' => 'mr-4 nav-link nav-size nav-color']) !!}</li>
                    <li class="nav-item mt-1">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link nav-size nav-color']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>