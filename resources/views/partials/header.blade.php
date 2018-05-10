<div id="header">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('product.index')}}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
              @if (Auth::user() && Auth::user()->isAdmin())
                <ul class="nav navbar-nav">
                    &nbsp;<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fas fa-users"></i> Пользователи <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('adminUsers') }}">Все пользователи</a>
                            </li>
                            <li>
                                <a href="{{ route('addUserForm') }}">Добавить пользователя</a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             Товары <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('adminProducts') }}">Все товары</a>
                            </li>
                            <li>
                                <a href="{{ route('addProductForm') }}">Добавить товар</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('adminOrders')  }}">Заказы</a>
                    </li>
                </ul>
                @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{route('product.shoppingCart')}}">
                            <i class="fas fa-shopping-cart"></i> Корзина
                            <span class="badge">{{Session::has('cart')? Session::get('cart')->totalQty:''}}</span>
                        </a>
                    </li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Вход</a></li>
                        <li><a href="{{ route('register') }}">Регистрация</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('profile') }}">Личный кабинет</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выход
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

<script src="{{ asset('js/app.js') }}"></script>
