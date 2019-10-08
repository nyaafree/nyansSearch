<section id="sidebar">
    <nav class="p-sidemenu">
        <ul class="p-sidelists">
            <li class="p-sidelists__head">Menu</li>
            <li class="p-sidelists__li"><a href="{{ url('/admin') }}"><i class="fa fa-fw fa-rocket"></i>管理メニュー</a></li>
            <li class="p-sidelists__li js-hover-menu"><a href=""><i class="fas fa-fw fa-file"></i>レビュー</a>
              <ul class="p-submenu js-hover-show">
                   <li class="p-submenu__list"><a class="p-submenu__link" href="{{ url('/admin/posts') }}">レビュー投稿一覧</a></li>
                   <li class="p-submenu__list"><a class="p-submenu__link" href="{{ url('/admin/posts/create') }}">レビューを投稿</a></li>
              </ul>
            </li>
            @if (Auth::user()->isAdmin())
                <li class="p-sidelists__li"><a href="{{ url('admin/categories') }}"><i class="fas fa-fw fa-table"></i>カテゴリ編集</a></li>
                <li class="p-sidelists__li"><a href="{{ url('admin/areas') }}"><i class="far fa-map"></i>エリア編集</a></li>
                <li class="p-sidelists__li js-hover-menu"><a href=""><i class="fa fa-fw fa-user-circle"></i>ユーザー</a>
                <ul class="p-submenu js-hover-show">
                    <li class="p-submenu__list"><a class="p-submenu__link" href="{{ url('/admin/users') }}">ユーザー一覧</a></li>
                    <li class="p-submenu__list"><a class="p-submenu__link" href="{{ url('/admin/users/create') }}">新規ユーザー登録</a></li>
               </ul>
               </li>
            @endif


        </ul>

    </nav>
</section>
