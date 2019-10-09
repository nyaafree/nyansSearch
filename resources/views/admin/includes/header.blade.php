<header id="adminheader">
   <nav class="p-nav">
       <div class="p-nav__container1">
           <a href="{{ url('/') }}" class="p-nav__title">Nyans Search</a>
           <form method="GET" action="/posts/area/">
            @csrf
            <select name="area" onchange="submit(this.form)" class="select-box sp-none">
                <option disabled selected>選択してください</option>
                @foreach ($areas as $area )
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
           </form>

       </div>

            <ul class="p-nav__menus u-right">
            @if(Auth::check())
            <li class="p-nav__li"><a href="{{ url('/logout') }}">Logout</a></li>
            <li class="p-nav__li"><a href="{{ url('/admin') }}">Dashboard</a></li>
            @else
            <li class="p-nav__li"><a href="{{ url('/register') }} ">Register</a></li>
            <li class="p-nav__li"><a href="{{ url('/login') }}">Login</a></li>

            @endif
           </ul>
   </nav>
   <div class="u-menu-trigger js-toggle-sp-menu">
    <span></span>
    <span></span>
    <span></span>
    </div>
</header>
