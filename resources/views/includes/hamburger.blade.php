<nav class="c-hamburger js-toggle-sp-menu-target">
        @include('includes.searchPosts')
    <ul class="c-hamburger__menu">
      <li class="c-hamburger__list js-nav-close"><a class="menu-link" href="/">TOP</a></li>
      @if (Auth::check())
          <li class="c-hamburger__list js-nav-close"><a class="c-hamburger__link" href="{{ url('/admin') }}">Dashboard</a></li>
          <li class="c-hamburger__list js-nav-close"><a class="c-hamburger__link" href="{{ url('/logout') }}">Logout</a></li>
      @else
          <li class="c-hamburger__list js-nav-close"><a class="c-hamburger__link" href="{{ url('/register') }}">Register</a></li>
          <li class="c-hamburger__list js-nav-close"><a class="c-hamburger__link" href="{{ url('/login') }}">Login</a></li>
      @endif
      @include('includes.selectArea')
      <li class="c-hamburger__list js-nav-close"><a class="c-hamburger__link" href="{{ url('/#main') }}">最新クチコミ</a></li>
      <li class="c-hamburger__list js-nav-close"><a class="c-hamburger__link" href="{{ url('/#sprank') }}">アクセスランキング</a></li>
    </ul>
  </nav>
